<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

class ImportWordPressProjects extends Command
{
    /**
     * Nama dan signature command.
     */
    protected $signature = 'wordpress:import-projects
                            {--dry-run : Hanya menampilkan hasil pencocokan tanpa mengubah database}';

    /**
     * Deskripsi command.
     */
    protected $description = 'Import dan sinkronisasi project dari WordPress Ninja Tables';

    /**
     * ID Ninja Table WordPress yang berisi data project.
     */
    private const NINJA_TABLE_ID = 4945;

    /**
     * Jalankan command.
     */
    public function handle(): int
    {
        $this->newLine();

        $this->info('==============================================');
        $this->info('   WORDPRESS PROJECT IMPORTER');
        $this->info('==============================================');

        $this->newLine();

        /*
        |--------------------------------------------------------------------------
        | Mode
        |--------------------------------------------------------------------------
        */

        if ($this->option('dry-run')) {
            $this->warn('MODE: DRY RUN');
            $this->line('Database tidak akan diubah.');
        } else {
            $this->warn('MODE: IMPORT');
            $this->line('Data project existing akan diperbarui.');
        }

        $this->newLine();

        /*
        |--------------------------------------------------------------------------
        | Ambil data WordPress
        |--------------------------------------------------------------------------
        |
        | Untuk tahap awal kita membaca database WordPress dari koneksi
        | "wordpress".
        |
        | Koneksi ini akan kita konfigurasi setelah command dasar selesai.
        |
        */

        try {
            $items = DB::connection('wordpress')
                ->table('wp_ninja_table_items')
                ->where('table_id', self::NINJA_TABLE_ID)
                ->where('attribute', 'value')
                ->orderBy('position')
                ->orderBy('id')
                ->get([
                    'id',
                    'position',
                    'table_id',
                    'value',
                ]);
        } catch (Throwable $e) {
            $this->error('Gagal mengambil data dari database WordPress.');

            $this->newLine();

            $this->error($e->getMessage());

            $this->newLine();

            $this->line(
                'Pastikan koneksi database "wordpress" sudah dikonfigurasi.'
            );

            return self::FAILURE;
        }

        /*
        |--------------------------------------------------------------------------
        | Validasi data
        |--------------------------------------------------------------------------
        */

        if ($items->isEmpty()) {
            $this->warn(
                'Tidak ditemukan data project pada Ninja Tables #'
                . self::NINJA_TABLE_ID
                . '.'
            );

            return self::SUCCESS;
        }

        $this->info(
            'Ditemukan ' . $items->count() . ' data project WordPress.'
        );

        $this->newLine();

        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        $matched = 0;
        $notFound = 0;
        $invalidJson = 0;
        $errors = 0;

        /*
        |--------------------------------------------------------------------------
        | Header tabel
        |--------------------------------------------------------------------------
        */

        $this->table(
            [
                '#',
                'WordPress',
                'Tahun',
                'Laravel Project',
                'Status',
            ],
            []
        );

        /*
        |--------------------------------------------------------------------------
        | Proses setiap project
        |--------------------------------------------------------------------------
        */

        foreach ($items as $item) {
            try {
                /*
                |--------------------------------------------------------------------------
                | Decode JSON
                |--------------------------------------------------------------------------
                */

                $data = json_decode(
                    $item->value,
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                );

                /*
                |--------------------------------------------------------------------------
                | Ambil data utama
                |--------------------------------------------------------------------------
                */

                $kapal = trim(
                    (string) ($data['kapal'] ?? '')
                );

                $tahun = trim(
                    (string) ($data['tahun'] ?? '')
                );

                $lingkupKerja = trim(
                    (string) ($data['lingkup_kerja'] ?? '')
                );

                /*
                |--------------------------------------------------------------------------
                | Validasi minimal
                |--------------------------------------------------------------------------
                */

                if ($kapal === '') {
                    $notFound++;

                    $this->warn(
                        sprintf(
                            '[%d] Project WordPress tidak memiliki nama kapal.',
                            $item->position
                        )
                    );

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Cari project existing
                |--------------------------------------------------------------------------
                |
                | Untuk sementara pencocokan menggunakan:
                |
                |   title = kapal
                |
                | Tahun akan digunakan sebagai validasi tambahan.
                |
                */

                $projectQuery = Project::query()
                    ->where('title', $kapal);

                if (
                    $tahun !== ''
                    && preg_match('/^\d{4}$/', $tahun)
                ) {
                    $projectQuery->whereYear(
                        'project_date',
                        (int) $tahun
                    );
                }

                $projects = $projectQuery
                    ->orderBy('id')
                    ->get();

                /*
                |--------------------------------------------------------------------------
                | Tidak ditemukan
                |--------------------------------------------------------------------------
                */

                if ($projects->isEmpty()) {
                    $notFound++;

                    $this->line(
                        sprintf(
                            '[%d] %s | %s | NOT FOUND',
                            $item->position,
                            $kapal,
                            $tahun !== '' ? $tahun : '-'
                        )
                    );

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Lebih dari satu hasil
                |--------------------------------------------------------------------------
                */

                if ($projects->count() > 1) {
                    $errors++;

                    $this->warn(
                        sprintf(
                            '[%d] %s | %s | DUPLICATE MATCH (%d)',
                            $item->position,
                            $kapal,
                            $tahun !== '' ? $tahun : '-',
                            $projects->count()
                        )
                    );

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Project ditemukan
                |--------------------------------------------------------------------------
                */

                /** @var Project $project */
                $project = $projects->first();

                $matched++;

                $this->line(
                    sprintf(
                        '[%d] %s | %s | MATCHED → #%d',
                        $item->position,
                        $kapal,
                        $tahun !== '' ? $tahun : '-',
                        $project->id
                    )
                );

                /*
                |--------------------------------------------------------------------------
                | Dry Run
                |--------------------------------------------------------------------------
                */

                if ($this->option('dry-run')) {
                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Update project
                |--------------------------------------------------------------------------
                |
                | Untuk tahap ini kita baru mengisi scope_of_work.
                |
                | Media Library akan kita kerjakan setelah mekanisme
                | pencocokan project dipastikan benar.
                |
                */

                $updates = [];

                if ($lingkupKerja !== '') {
                    $updates['scope_of_work'] = $lingkupKerja;
                }

                if (!empty($updates)) {
                    $project->update($updates);
                }
            } catch (Throwable $e) {
                $errors++;

                $this->error(
                    sprintf(
                        '[%d] ERROR: %s',
                        $item->position,
                        $e->getMessage()
                    )
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Summary
        |--------------------------------------------------------------------------
        */

        $this->newLine();

        $this->info('==============================================');
        $this->info('   IMPORT SUMMARY');
        $this->info('==============================================');

        $this->newLine();

        $this->table(
            [
                'Status',
                'Jumlah',
            ],
            [
                ['WordPress', $items->count()],
                ['Matched', $matched],
                ['Not Found', $notFound],
                ['Invalid / Error', $errors + $invalidJson],
            ]
        );

        $this->newLine();

        if ($this->option('dry-run')) {
            $this->warn(
                'DRY RUN selesai. Tidak ada data yang diubah.'
            );
        } else {
            $this->info(
                'Import project selesai.'
            );
        }

        return $errors > 0
            ? self::FAILURE
            : self::SUCCESS;
    }
}   