<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\UserMeta::factory(10)->create();
        // // Master -> Regions
        // \App\Models\Master\Regions::factory()
        //     ->count(17)
        //     ->sequence(
        //         ['name' => 'Region I', 'sector' => 'Ilocos Region'],
        //         ['name' => 'Region II', 'sector' => 'Cagayan Valley'],
        //         ['name' => 'Region III', 'sector' => 'Central Luzon'],
        //         ['name' => 'Region IV‑A', 'sector' => 'CALABARZON'],
        //         ['name' => 'MIMAROPA', 'sector' => 'Region'],
        //         ['name' => 'Region V', 'sector' => 'Bicol Region'],
        //         ['name' => 'Region VI', 'sector' => 'Western Visayas'],
        //         ['name' => 'Region VII', 'sector' => 'Central Visayas'],
        //         ['name' => 'Region VIII', 'sector' => 'Eastern Visayas'],
        //         ['name' => 'Region IX', 'sector' => 'Zamboanga Peninsula'],
        //         ['name' => 'Region X', 'sector' => 'Northern Mindanao'],
        //         ['name' => 'Region XI', 'sector' => 'Davao Region'],
        //         ['name' => 'Region XII', 'sector' => 'SOCCSKSARGEN'],
        //         ['name' => 'Region XIII', 'sector' => 'Caraga'],
        //         ['name' => 'NCR', 'sector' => 'National Capital Region'],
        //         ['name' => 'CAR', 'sector' => 'Cordillera Administrative Region'],
        //         ['name' => 'BARMM', 'sector' => 'Bangsamoro Autonomous Region in Muslim Mindanao'],
        //     )
        //     ->create();
        // // Master -> Organizationals
        // \App\Models\Master\Organizationals::factory()
        //     ->count(-1)
        //     ->sequence(
        //         ['cluster' => 'Office of the Secretary – Proper', 'line' => 'OSEC', 'parent' => 0], // 1
        //         ['cluster' => 'UHC Health Services Cluster', 'line' => 'UHC-HSC', 'parent' => 0], // 2
        //         ['cluster' => 'UHC Policy and Strategy Cluster', 'line' => 'UHC-PSC', 'parent' => 0], 
        //         ['cluster' => 'Public Health Services Cluster', 'line' => 'PHSC', 'parent' => 0].
        //         ['cluster' => 'Management Support Cluster I', 'line' => 'MSC', 'parent' => 0],
        //         ['cluster' => 'Management Support Cluster II', 'line' => 'MSC', 'parent' => 0],
        //         ['cluster' => 'Health Regulations and Facility Development Cluster ', 'line' => 'HRFDC', 'parent' => 0],
        //         ['cluster' => 'Special Concerns and Public-Private Partnership Cluster', 'line' => ' SCPPPC', 'parent' => 0],
        //         // parent -> 1
        //         ['cluster' => 'Philippine Health Insurance Corporation', 'line' => 'PhilHealth', 'parent' => 1],
        //         ['cluster' => 'Food and Drug Administration', 'line' => 'FDA', 'parent' => 1],
        //         ['cluster' => 'Philippine National Aids Council', 'line' => 'PNAC', 'parent' => 1],
        //         // GOCC Hospitals, including
        //         ['cluster' => 'Philippine Children’s Medical Center', 'line' => 'PCMC', 'parent' => 1],
        //         ['cluster' => 'Lung Center of the Philippines', 'line' => 'LCP', 'parent' => 1],
        //         ['cluster' => 'Philippine Heart Center', 'line' => 'PHC', 'parent' => 1],
        //         ['cluster' => 'National Kidney and Transplant Institute', 'line' => 'NKTI', 'parent' => 1],
        //         ['cluster' => 'National Nutrition Council', 'line' => 'NNC', 'parent' => 1],
        //         ['cluster' => 'Philippine Institute of Traditional and Alternative Health Care', 'line' => 'PITAHC', 'parent' => 1],
        //         ['cluster' => 'Legal Service', 'line' => 'LS', 'parent' => 1],
        //         ['cluster' => 'Internal Audit Service', 'line' => 'IAS', 'parent' => 1],
        //         ['cluster' => 'Malasakit Program Office', 'line' => 'MPO', 'parent' => 1],
        //         ['cluster' => 'Health Emergency Management Bureau', 'line' => 'HEMB', 'parent' => 1],
        //         ['cluster' => 'Philippine Multi-sectoral Nutrition Project', 'line' => 'PMNP', 'parent' => 1],
        //         ['cluster' => 'Communication Office', 'line' => 'COM', 'parent' => 1],
        //         // parent -> 2
        //     )
        //     ->create();
        // \App\Models\PersonalAccessToken::factory(10)->create();
    }
}
