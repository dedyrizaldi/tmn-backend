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
        /*
        |--------------------------------------------------------------------------
        | PROJECT CATEGORY
        |--------------------------------------------------------------------------
        |
        | ID 1 = Tank Cleaning
        |
        */

        $category = ProjectCategory::findOrFail(1);

        /*
        |--------------------------------------------------------------------------
        | PROJECT DATA
        |--------------------------------------------------------------------------
        */

        $projects = [

            // =========================================================
            // 2025
            // =========================================================

            [
                'client' => 'PT Inti Kreasindo Utama',
                'title' => 'HMCS OTTAWA',
                'excerpt' => 'Tank Cleaning',
                'year' => 2025,
            ],

            [
                'client' => 'Image Card',
                'title' => 'MT. GAMKONORA',
                'excerpt' => 'Tank Cleaning and Sludge Removal',
                'year' => 2025,
            ],

            // =========================================================
            // 2024
            // =========================================================

            [
                'client' => 'Waruna',
                'title' => 'MT. Medelin Expo',
                'excerpt' => 'Tank Cleaning, Rafting, Mopping',
                'year' => 2024,
            ],

            [
                'client' => 'PT Pertamina Trans Kontinental',
                'title' => 'MT. Gas Patra',
                'excerpt' => 'Free Gas Cargo',
                'year' => 2024,
            ],

            [
                'client' => 'Arkad',
                'title' => 'Arkad',
                'excerpt' => 'Silo Tank',
                'year' => 2024,
            ],

            [
                'client' => 'PIS',
                'title' => 'MT Kurau',
                'excerpt' => 'Desloping Oily Water',
                'year' => 2024,
            ],

            [
                'client' => 'Synergy Marine',
                'title' => 'MT Gamalama',
                'excerpt' => 'Tank Cleaning & Sludge Removal',
                'year' => 2024,
            ],

            [
                'client' => 'PIS',
                'title' => 'MT Cendrawasih',
                'excerpt' => 'Pumping Minyak Cargo',
                'year' => 2024,
            ],

            // =========================================================
            // 2023
            // =========================================================

            [
                'client' => 'PT Pertamina Trans Kontinental',
                'title' => 'MT. Kuang',
                'excerpt' => 'Tank Cleaning, Rafting & Mopping and Waste Disposal',
                'year' => 2023,
            ],

            [
                'client' => '1630901561099',
                'title' => 'MT. Champion Express',
                'excerpt' => 'Pumping & Cleaning',
                'year' => 2023,
            ],

            [
                'client' => 'Synergy Marine',
                'title' => 'MT. Gamalama',
                'excerpt' => 'Tank Cleaning & Sludge Removal',
                'year' => 2023,
            ],

            // =========================================================
            // 2022
            // =========================================================

            [
                'client' => 'PIS',
                'title' => 'MT. Gebang',
                'excerpt' => 'Tank Cleaning, Rafting, Sludge Removal & Waste Handling',
                'year' => 2022,
            ],

            [
                'client' => 'BUILD WATER TANK',
                'title' => 'BUILD WATER TANK',
                'excerpt' => 'Tank Cleaning and Waste Disposal',
                'year' => 2022,
            ],

            [
                'client' => '32403 Banner',
                'title' => 'MT. Petro Garuda',
                'excerpt' => 'Tank Cleaning & Sludge Removal',
                'year' => 2022,
            ],

            // =========================================================
            // 2021
            // =========================================================

            [
                'client' => 'Waruna',
                'title' => 'MT. Medeline Master',
                'excerpt' => 'Tank Cleaning, Rafting & Sludge Disposal',
                'year' => 2021,
            ],

            [
                'client' => 'PIS',
                'title' => 'MT. Gamalama',
                'excerpt' => 'Tank Cleaning, Sludge Removal, and Waste Handling',
                'year' => 2021,
            ],

            [
                'client' => 'PIS',
                'title' => 'MT. Sanana',
                'excerpt' => 'Tank Cleaning, Sludge Removal & Waste Handling',
                'year' => 2021,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Gebang',
                'excerpt' => 'Tank Cleaning & Sludge Removal',
                'year' => 2021,
            ],

            [
                'client' => 'bul1',
                'title' => 'MT. Oceania',
                'excerpt' => 'Tank Cleaning',
                'year' => 2021,
            ],

            [
                'client' => '1688626522320',
                'title' => 'MT. Bull Kalimantan',
                'excerpt' => 'Tank Cleaning',
                'year' => 2021,
            ],

            // =========================================================
            // 2020
            // =========================================================

            [
                'client' => 'images',
                'title' => 'MT. Astipal',
                'excerpt' => 'Tank Cleaning, Rafting & Sludge Disposal',
                'year' => 2020,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Gamkonora',
                'excerpt' => 'Tank Cleaning & Disposal',
                'year' => 2020,
            ],

            [
                'client' => 'CM1',
                'title' => 'MT. Bratasena',
                'excerpt' => 'Tank Cleaning, Scraping, Mopping, & Pumping',
                'year' => 2020,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Enduro',
                'excerpt' => 'Tank Cleaning, Sludge Removal & Sludge Disposal',
                'year' => 2020,
            ],

            // =========================================================
            // 2019
            // =========================================================

            [
                'client' => 'Pertamina',
                'title' => 'MT. Kuang',
                'excerpt' => 'Tank Cleaning, Sludge Removal and Waste Handling',
                'year' => 2019,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Cendrawasih',
                'excerpt' => 'Tank Cleaning, Sludge Removal and Waste Handling',
                'year' => 2019,
            ],

            [
                'client' => 'Waruna',
                'title' => 'MT. Madeline Expo',
                'excerpt' => 'Tank Cleaning, Sludge Removal and Waste Handling',
                'year' => 2019,
            ],

            [
                'client' => 'SH1',
                'title' => 'MT. Shinta',
                'excerpt' => 'Pumping - Oil Transfer',
                'year' => 2019,
            ],

            [
                'client' => 'Waruna',
                'title' => 'MT. Martha Option',
                'excerpt' => 'Tank Cleaning & Sludge Removal',
                'year' => 2019,
            ],

            [
                'client' => 'CS1',
                'title' => 'Water Tank',
                'excerpt' => 'Tank Cleaning & Pumping',
                'year' => 2019,
            ],

            [
                'client' => 'RS1',
                'title' => 'Water Tank',
                'excerpt' => 'Tank Cleaning Services & Pumping',
                'year' => 2019,
            ],

            // =========================================================
            // 2018
            // =========================================================

            [
                'client' => 'Pertamina',
                'title' => 'MT. Galunggung',
                'excerpt' => 'Tank Cleaning & Sludge Removal',
                'year' => 2018,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. SERUI',
                'excerpt' => 'Tank Cleaning & Sludge Removal',
                'year' => 2018,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. SENIPAH',
                'excerpt' => 'Tank Cleaning & Sludge Removal',
                'year' => 2018,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Sanana',
                'excerpt' => 'Tank Cleaning & Sludge Removal',
                'year' => 2018,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Ketaling',
                'excerpt' => 'Tank Cleaning & Sludge Disposal',
                'year' => 2018,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Pegaden',
                'excerpt' => 'Tank Cleaning and Sludge Disposal',
                'year' => 2018,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Sanggau',
                'excerpt' => 'Tank Cleaning & Sludge Disposal',
                'year' => 2018,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Kakap',
                'excerpt' => 'Oily Water Disposal / Mopping / Rafting',
                'year' => 2018,
            ],

            // =========================================================
            // 2017
            // =========================================================

            [
                'client' => 'SMI',
                'title' => 'Jag Leela',
                'excerpt' => 'Tank Cleaning',
                'year' => 2017,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'FSO Abherka',
                'excerpt' => 'Pumping',
                'year' => 2017,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'FSO Abherka',
                'excerpt' => 'Tank Cleaning, Pouring, Sludge Removal, De-slopping',
                'year' => 2017,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Gunung Kemala',
                'excerpt' => 'Tank Cleaning, Sludge Removal, Oil De-slopping',
                'year' => 2017,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Sambu',
                'excerpt' => 'Tank Cleaning, Pumping, De-slopping',
                'year' => 2017,
            ],

            // =========================================================
            // 2016
            // =========================================================

            [
                'client' => 'Pertamina',
                'title' => 'MT. Sungai Gerong',
                'excerpt' => 'Tank Cleaning, Sludge Removal, Oil De-slopping',
                'year' => 2016,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Sei Pakning',
                'excerpt' => 'Tank Cleaning, Pumping, De-slopping',
                'year' => 2016,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Pegaden',
                'excerpt' => 'Tank Cleaning, Sludge Removal, Oil De-slopping',
                'year' => 2016,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'MT. Gede',
                'excerpt' => 'Tank Cleaning, Sludge Removal, Oil De-slopping',
                'year' => 2016,
            ],

            // =========================================================
            // 2015
            // =========================================================

            [
                'client' => 'Pertamina',
                'title' => 'MT. Gunung Kemala',
                'excerpt' => 'Tank Cleaning, Pumping, De-slopping',
                'year' => 2015,
            ],

            [
                'client' => 'Santosa',
                'title' => 'FPSO Seagood - 101',
                'excerpt' => 'NDT, Tank Cleaning, Sludge Removal',
                'year' => 2015,
            ],

            [
                'client' => 'Pertamina',
                'title' => 'Job Pertamina - Talisman',
                'excerpt' => 'Tank Cleaning, Sludge Oil Removal',
                'year' => 2015,
            ],

            // =========================================================
            // 2014
            // =========================================================

            [
                'client' => 'Knutsen',
                'title' => 'MT. Tove Knutsen',
                'excerpt' => 'Tank De-slopping',
                'year' => 2014,
            ],

            // =========================================================
            // 2013
            // =========================================================

            [
                'client' => 'VSIP',
                'title' => 'MT. Multi Echo',
                'excerpt' => 'Tank Cleaning, Sludge Oil Removal',
                'year' => 2013,
            ],

            // =========================================================
            // 2012
            // =========================================================

            [
                'client' => 'Pertamina',
                'title' => 'FSO. Cilacap',
                'excerpt' => 'Tank Cleaning, Sludge Removal',
                'year' => 2012,
            ],

            [
                'client' => 'TRD',
                'title' => 'MT. Concertina',
                'excerpt' => 'Tank Cleaning, Sludge Removal',
                'year' => 2012,
            ],

            [
                'client' => 'Santosa',
                'title' => 'FPSO Seagood - 101',
                'excerpt' => 'Tank Cleaning, Sludge Collection, Sludge Removal',
                'year' => 2012,
            ],

            [
                'client' => 'TRD',
                'title' => 'MT. Putri Bangsa',
                'excerpt' => 'Tank Cleaning, Installation of Leader',
                'year' => 2012,
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | INSERT PROJECTS
        |--------------------------------------------------------------------------
        */

        foreach ($projects as $index => $project) {

            $projectDate = Carbon::create(
                $project['year'],
                1,
                1
            );

            /*
            |--------------------------------------------------------------------------
            | Generate unique slug
            |--------------------------------------------------------------------------
            */

            $baseSlug = Str::slug(
                $project['title'] .
                '-' .
                $project['client'] .
                '-' .
                $project['year']
            );

            $slug = $baseSlug;

            $counter = 1;

            while (
                Project::where('slug', $slug)->exists()
            ) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            /*
            |--------------------------------------------------------------------------
            | Create Project
            |--------------------------------------------------------------------------
            */

            Project::create([
                'project_category_id' => $category->id,

                'title' => $project['title'],

                'slug' => $slug,

                'client' => $project['client'],

                'location' => null,

                'project_date' => $projectDate,

                'excerpt' => $project['excerpt'],

                'description' => $project['excerpt'],

                'meta_title' =>
                    $project['title'] .
                    ' - ' .
                    $project['client'],

                'meta_description' =>
                    $project['excerpt'],

                'featured' => false,

                'sort_order' => $index + 1,

                'status' => 'published',

                'published_at' => $projectDate,

                'created_at' => now(),

                'updated_at' => now(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Seeder Result
        |--------------------------------------------------------------------------
        */

        $this->command->info(
            'Project import berhasil: ' .
            count($projects) .
            ' project.'
        );

        $this->command->info(
            'Category: ' .
            $category->name .
            ' (ID: ' .
            $category->id .
            ')'
        );
    }
}