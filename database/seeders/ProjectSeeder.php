<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [

            // ===========================
            // Tank Cleaning
            // ===========================

            [
                'title' => 'Tank Cleaning at Balikpapan Oil Terminal',
                'category' => 'Tank Cleaning',
                'client' => 'PT Pertamina Patra Niaga',
                'location' => 'Balikpapan',
                'date' => '2026-01-15',
            ],
            [
                'title' => 'Crude Oil Storage Tank Cleaning',
                'category' => 'Tank Cleaning',
                'client' => 'PT Kilang Pertamina Internasional',
                'location' => 'Cilacap',
                'date' => '2026-02-11',
            ],
            [
                'title' => 'Chemical Storage Tank Cleaning',
                'category' => 'Tank Cleaning',
                'client' => 'PT Lotte Chemical Indonesia',
                'location' => 'Cilegon',
                'date' => '2026-03-08',
            ],
            [
                'title' => 'Tank Sludge Removal Project',
                'category' => 'Tank Cleaning',
                'client' => 'Chevron Indonesia',
                'location' => 'Duri',
                'date' => '2026-04-03',
            ],
            [
                'title' => 'Tank Farm Cleaning Services',
                'category' => 'Tank Cleaning',
                'client' => 'PT Vopak Terminal Indonesia',
                'location' => 'Merak',
                'date' => '2026-05-17',
            ],
            [
                'title' => 'Tank Degassing Operation',
                'category' => 'Tank Cleaning',
                'client' => 'PT Trans Pacific Petrochemical',
                'location' => 'Tuban',
                'date' => '2026-06-10',
            ],

            // ===========================
            // Cargo Hold Cleaning
            // ===========================

            [
                'title' => 'Cargo Hold Cleaning MV Ocean Pioneer',
                'category' => 'Cargo Hold Cleaning',
                'client' => 'PT Samudera Indonesia',
                'location' => 'Surabaya',
                'date' => '2026-02-28',
            ],
            [
                'title' => 'Bulk Carrier Cargo Hold Washing',
                'category' => 'Cargo Hold Cleaning',
                'client' => 'PT Tanto Intim Line',
                'location' => 'Banjarmasin',
                'date' => '2026-04-18',
            ],
            [
                'title' => 'Cargo Hold Cleaning MV Meratus',
                'category' => 'Cargo Hold Cleaning',
                'client' => 'PT Meratus Line',
                'location' => 'Jakarta',
                'date' => '2026-06-14',
            ],
            [
                'title' => 'Cargo Hold Preparation Before Loading',
                'category' => 'Cargo Hold Cleaning',
                'client' => 'PT Salam Pacific Indonesia Lines',
                'location' => 'Makassar',
                'date' => '2026-07-02',
            ],

            // ===========================
            // Industrial Cleaning
            // ===========================

            [
                'title' => 'Industrial Tank Maintenance',
                'category' => 'Industrial Cleaning',
                'client' => 'PT Chandra Asri Petrochemical',
                'location' => 'Cilegon',
                'date' => '2026-03-20',
            ],
            [
                'title' => 'Industrial Vacuum Cleaning',
                'category' => 'Industrial Cleaning',
                'client' => 'PT Krakatau Steel',
                'location' => 'Cilegon',
                'date' => '2026-05-05',
            ],
            [
                'title' => 'Waste Oil Tank Cleaning',
                'category' => 'Industrial Cleaning',
                'client' => 'PT Pupuk Indonesia',
                'location' => 'Gresik',
                'date' => '2026-08-10',
            ],
            [
                'title' => 'Industrial Plant Cleaning',
                'category' => 'Industrial Cleaning',
                'client' => 'PT Indocement Tunggal Prakarsa',
                'location' => 'Bogor',
                'date' => '2026-10-03',
            ],

            // ===========================
            // Marine Cleaning
            // ===========================

            [
                'title' => 'Marine Engine Room Cleaning',
                'category' => 'Marine Cleaning',
                'client' => 'PT Dharma Lautan Utama',
                'location' => 'Surabaya',
                'date' => '2026-01-29',
            ],
            [
                'title' => 'Marine Deck High Pressure Cleaning',
                'category' => 'Marine Cleaning',
                'client' => 'PT Pelni',
                'location' => 'Ambon',
                'date' => '2026-04-09',
            ],
            [
                'title' => 'Ballast Tank Cleaning',
                'category' => 'Marine Cleaning',
                'client' => 'PT Buana Lintas Lautan',
                'location' => 'Batam',
                'date' => '2026-08-22',
            ],
            [
                'title' => 'Vessel Accommodation Cleaning',
                'category' => 'Marine Cleaning',
                'client' => 'PT Wintermar Offshore Marine',
                'location' => 'Batam',
                'date' => '2026-11-01',
            ],

            // ===========================
            // Offshore Support
            // ===========================

            [
                'title' => 'Offshore Equipment Mobilization',
                'category' => 'Offshore Support',
                'client' => 'PT Elnusa Tbk',
                'location' => 'Natuna',
                'date' => '2026-03-25',
            ],
            [
                'title' => 'Offshore Pipeline Cleaning',
                'category' => 'Offshore Support',
                'client' => 'PT Rekayasa Industri',
                'location' => 'Balikpapan',
                'date' => '2026-09-15',
            ],
            [
                'title' => 'Offshore Platform Cleaning',
                'category' => 'Offshore Support',
                'client' => 'Medco Energy',
                'location' => 'Sorong',
                'date' => '2026-12-08',
            ],

            // ===========================
            // Port Services
            // ===========================

            [
                'title' => 'Jetty Cleaning Project',
                'category' => 'Port Services',
                'client' => 'Pelindo',
                'location' => 'Makassar',
                'date' => '2026-03-18',
            ],
            [
                'title' => 'Port Warehouse Cleaning',
                'category' => 'Port Services',
                'client' => 'Pelindo',
                'location' => 'Belawan',
                'date' => '2026-07-15',
            ],
            [
                'title' => 'Port Facility Cleaning Services',
                'category' => 'Port Services',
                'client' => 'Pelindo',
                'location' => 'Tanjung Priok',
                'date' => '2026-11-18',
            ],

            // ===========================
            // Equipment Rental
            // ===========================

            [
                'title' => 'Marine Equipment Rental',
                'category' => 'Equipment Rental',
                'client' => 'PT Meratus Line',
                'location' => 'Jakarta',
                'date' => '2026-04-11',
            ],
            [
                'title' => 'Equipment Rental for Jetty Project',
                'category' => 'Equipment Rental',
                'client' => 'PT Wijaya Karya',
                'location' => 'Makassar',
                'date' => '2026-09-14',
            ],
            [
                'title' => 'Vacuum Truck Rental Services',
                'category' => 'Equipment Rental',
                'client' => 'PT Pupuk Indonesia',
                'location' => 'Gresik',
                'date' => '2026-10-26',
            ],

            // ===========================
            // Waste Management
            // ===========================

            [
                'title' => 'Industrial Waste Handling',
                'category' => 'Waste Management',
                'client' => 'PT Krakatau Steel',
                'location' => 'Cilegon',
                'date' => '2026-05-28',
            ],
            [
                'title' => 'Oil Sludge Transportation',
                'category' => 'Waste Management',
                'client' => 'PT Pertamina EP',
                'location' => 'Balongan',
                'date' => '2026-10-12',
            ],

            // ===========================
            // Oil & Gas
            // ===========================

            [
                'title' => 'Oil Terminal Cleaning Services',
                'category' => 'Oil & Gas',
                'client' => 'PT Pertamina Patra Niaga',
                'location' => 'Balikpapan',
                'date' => '2026-06-22',
            ],
        ];

        foreach ($projects as $index => $project) {

            $category = ProjectCategory::where(
                'name',
                $project['category']
            )->first();

            Project::updateOrCreate(
                [
                    'slug' => Str::slug($project['title']),
                ],
                [
                    'project_category_id' => $category?->id,
                    'title' => $project['title'],
                    'slug' => Str::slug($project['title']),
                    'client' => $project['client'],
                    'location' => $project['location'],
                    'project_date' => Carbon::parse($project['date']),
                    'excerpt' => fake()->sentence(18),
                    'description' => fake()->paragraphs(5, true),
                    'featured' => $index < 6,
                    'sort_order' => $index + 1,
                    'status' => 'published',
                    'published_at' => now(),
                    'meta_title' => $project['title'],
                    'meta_description' => fake()->sentence(),
                ]
            );
        }
    }
}