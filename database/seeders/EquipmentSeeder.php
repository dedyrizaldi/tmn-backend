<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipments = [

            [
                'equipment_category_id' => 1,
                'name' => 'High Pressure Water Jet Unit 1000 Bar',
                'slug' => 'high-pressure-water-jet-unit-1000-bar',
                'brand' => 'Falch',
                'model' => 'T1000',
                'excerpt' => 'High pressure water jet unit for industrial tank cleaning and surface preparation.',
                'description' => '<p>Professional high pressure water jet system designed for tank cleaning, hydro blasting, and industrial maintenance.</p>',
                'specifications' => [
                    'Pressure' => '1000 Bar',
                    'Flow Rate' => '120 L/min',
                    'Power' => 'Diesel Engine',
                ],
                'applications' => [
                    'Tank Cleaning',
                    'Industrial Cleaning',
                    'Surface Preparation',
                ],
                'meta_title' => 'High Pressure Water Jet Unit 1000 Bar',
                'meta_description' => 'Professional water jet unit for industrial cleaning applications.',
                'featured' => true,
                'sort_order' => 1,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 1,
                'name' => 'Rotary Tank Cleaning Nozzle',
                'slug' => 'rotary-tank-cleaning-nozzle',
                'brand' => 'Scanjet',
                'model' => 'SC40',
                'excerpt' => 'Automatic rotary nozzle for efficient tank cleaning.',
                'description' => '<p>Rotary nozzle providing 360° cleaning coverage inside cargo and storage tanks.</p>',
                'specifications' => [
                    'Material' => 'Stainless Steel',
                    'Pressure' => '200 Bar',
                ],
                'applications' => [
                    'Cargo Tank',
                    'Storage Tank',
                ],
                'meta_title' => 'Rotary Tank Cleaning Nozzle',
                'meta_description' => 'Automatic rotary tank cleaning nozzle.',
                'featured' => true,
                'sort_order' => 2,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 2,
                'name' => 'Automated Tank Washing Machine',
                'slug' => 'automated-tank-washing-machine',
                'brand' => 'Alfa Laval',
                'model' => 'TJ20G',
                'excerpt' => 'Automatic washing machine for marine cargo tanks.',
                'description' => '<p>Designed to provide efficient and reliable tank washing operations.</p>',
                'specifications' => [
                    'Rotation' => '360°',
                    'Pressure' => '150 Bar',
                ],
                'applications' => [
                    'Tank Washing',
                ],
                'meta_title' => 'Automated Tank Washing Machine',
                'meta_description' => 'Automatic tank washing equipment.',
                'featured' => true,
                'sort_order' => 3,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 2,
                'name' => 'Hot Water Pressure Washer',
                'slug' => 'hot-water-pressure-washer',
                'brand' => 'Karcher',
                'model' => 'HDS 13/20',
                'excerpt' => 'Industrial hot water pressure washer.',
                'description' => '<p>Ideal for removing oil, grease and heavy contaminants.</p>',
                'specifications' => [
                    'Pressure' => '200 Bar',
                    'Temperature' => '155°C',
                ],
                'applications' => [
                    'Tank Washing',
                    'Industrial Cleaning',
                ],
                'meta_title' => 'Hot Water Pressure Washer',
                'meta_description' => 'Industrial hot water cleaning system.',
                'featured' => false,
                'sort_order' => 4,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 3,
                'name' => 'Vacuum Truck 8000 Liter',
                'slug' => 'vacuum-truck-8000-liter',
                'brand' => 'Isuzu',
                'model' => 'FVZ34',
                'excerpt' => 'Heavy-duty vacuum truck for sludge removal.',
                'description' => '<p>Designed for industrial sludge and liquid waste removal.</p>',
                'specifications' => [
                    'Capacity' => '8000 Liter',
                ],
                'applications' => [
                    'Sludge Removal',
                ],
                'meta_title' => 'Vacuum Truck 8000 Liter',
                'meta_description' => 'Industrial vacuum truck.',
                'featured' => true,
                'sort_order' => 5,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 3,
                'name' => 'Heavy Duty Sludge Pump',
                'slug' => 'heavy-duty-sludge-pump',
                'brand' => 'Tsurumi',
                'model' => 'KTZ611',
                'excerpt' => 'Pump designed for heavy sludge transfer.',
                'description' => '<p>Reliable sludge pump for industrial and marine operations.</p>',
                'specifications' => [
                    'Capacity' => '900 m³/h',
                ],
                'applications' => [
                    'Sludge Removal',
                ],
                'meta_title' => 'Heavy Duty Sludge Pump',
                'meta_description' => 'Industrial sludge pump.',
                'featured' => false,
                'sort_order' => 6,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 4,
                'name' => 'Hydro Blasting Machine',
                'slug' => 'hydro-blasting-machine',
                'brand' => 'Jetstream',
                'model' => 'X-Series',
                'excerpt' => 'Hydro blasting machine for industrial cleaning.',
                'description' => '<p>High-performance hydro blasting system.</p>',
                'specifications' => [
                    'Pressure' => '1500 Bar',
                ],
                'applications' => [
                    'Industrial Cleaning',
                ],
                'meta_title' => 'Hydro Blasting Machine',
                'meta_description' => 'Industrial hydro blasting machine.',
                'featured' => true,
                'sort_order' => 7,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 4,
                'name' => 'Industrial Vacuum Cleaner',
                'slug' => 'industrial-vacuum-cleaner',
                'brand' => 'Nilfisk',
                'model' => 'CTT40',
                'excerpt' => 'Heavy-duty industrial vacuum cleaner.',
                'description' => '<p>Suitable for dust and liquid recovery.</p>',
                'specifications' => [
                    'Power' => '4 kW',
                ],
                'applications' => [
                    'Industrial Cleaning',
                ],
                'meta_title' => 'Industrial Vacuum Cleaner',
                'meta_description' => 'Industrial vacuum cleaning equipment.',
                'featured' => false,
                'sort_order' => 8,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 4,
                'name' => 'Steam Cleaning Unit',
                'slug' => 'steam-cleaning-unit',
                'brand' => 'Karcher',
                'model' => 'SGV 8/5',
                'excerpt' => 'Steam cleaner for industrial maintenance.',
                'description' => '<p>High temperature steam cleaning equipment.</p>',
                'specifications' => [
                    'Temperature' => '180°C',
                ],
                'applications' => [
                    'Industrial Cleaning',
                ],
                'meta_title' => 'Steam Cleaning Unit',
                'meta_description' => 'Industrial steam cleaning equipment.',
                'featured' => false,
                'sort_order' => 9,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 5,
                'name' => 'Hydraulic Power Pack',
                'slug' => 'hydraulic-power-pack',
                'brand' => 'MarFlex',
                'model' => 'HPU300',
                'excerpt' => 'Hydraulic power pack for pumping systems.',
                'description' => '<p>Reliable hydraulic power unit for industrial pumping operations.</p>',
                'specifications' => [
                    'Pressure' => '300 Bar',
                ],
                'applications' => [
                    'Pumping',
                ],
                'meta_title' => 'Hydraulic Power Pack',
                'meta_description' => 'Industrial hydraulic power pack.',
                'featured' => true,
                'sort_order' => 10,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 5,
                'name' => 'Diesel Transfer Pump',
                'slug' => 'diesel-transfer-pump',
                'brand' => 'Gorman-Rupp',
                'model' => '80 Series',
                'excerpt' => 'Diesel-powered transfer pump.',
                'description' => '<p>Efficient transfer pump for liquid handling.</p>',
                'specifications' => [
                    'Capacity' => '600 m³/h',
                ],
                'applications' => [
                    'Pumping',
                ],
                'meta_title' => 'Diesel Transfer Pump',
                'meta_description' => 'Diesel transfer pump.',
                'featured' => false,
                'sort_order' => 11,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 5,
                'name' => 'Submersible Dewatering Pump',
                'slug' => 'submersible-dewatering-pump',
                'brand' => 'Flygt',
                'model' => '2670',
                'excerpt' => 'Submersible pump for dewatering applications.',
                'description' => '<p>Designed for reliable dewatering in industrial environments.</p>',
                'specifications' => [
                    'Power' => '11 kW',
                ],
                'applications' => [
                    'Pumping',
                ],
                'meta_title' => 'Submersible Dewatering Pump',
                'meta_description' => 'Industrial submersible pump.',
                'featured' => false,
                'sort_order' => 12,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 6,
                'name' => 'Oil Water Separator Unit',
                'slug' => 'oil-water-separator-unit',
                'brand' => 'RWO',
                'model' => 'SKIT',
                'excerpt' => 'Oil water separator for environmental protection.',
                'description' => '<p>Separates oil from wastewater before discharge.</p>',
                'specifications' => [
                    'Capacity' => '5 m³/h',
                ],
                'applications' => [
                    'Waste Management',
                ],
                'meta_title' => 'Oil Water Separator Unit',
                'meta_description' => 'Oil water separator.',
                'featured' => true,
                'sort_order' => 13,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 6,
                'name' => 'Filter Press System',
                'slug' => 'filter-press-system',
                'brand' => 'Matec',
                'model' => 'TT250',
                'excerpt' => 'Industrial sludge dewatering system.',
                'description' => '<p>Efficient filter press for waste management operations.</p>',
                'specifications' => [
                    'Plate Size' => '1200 mm',
                ],
                'applications' => [
                    'Waste Management',
                ],
                'meta_title' => 'Filter Press System',
                'meta_description' => 'Industrial filter press.',
                'featured' => false,
                'sort_order' => 14,
                'status' => 'published',
                'published_at' => now(),
            ],

            [
                'equipment_category_id' => 6,
                'name' => 'Portable Spill Response Kit',
                'slug' => 'portable-spill-response-kit',
                'brand' => 'Brady',
                'model' => 'Marine 240L',
                'excerpt' => 'Emergency spill response equipment.',
                'description' => '<p>Portable spill response kit for rapid containment of oil and chemical spills.</p>',
                'specifications' => [
                    'Capacity' => '240 Liter',
                ],
                'applications' => [
                    'Waste Management',
                    'Emergency Response',
                ],
                'meta_title' => 'Portable Spill Response Kit',
                'meta_description' => 'Portable spill response kit.',
                'featured' => false,
                'sort_order' => 15,
                'status' => 'published',
                'published_at' => now(),
            ],

        ];

        foreach ($equipments as $equipment) {
            Equipment::updateOrCreate(
                ['slug' => $equipment['slug']],
                $equipment
            );
        }
    }
}