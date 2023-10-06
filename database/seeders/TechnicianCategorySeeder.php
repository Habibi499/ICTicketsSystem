<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TechnicianCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            'Hardware',
            'Software',
            'Genesys',
            'Exodus',
            'Network',
        ];

        foreach ($categories as $category) {
            DB::table('technicians')->insert([
                'name' => $category,
                'category' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
