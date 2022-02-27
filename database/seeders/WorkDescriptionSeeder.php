<?php

namespace Database\Seeders;

use App\Models\WorkDescription;
use Illuminate\Database\Seeder;

class WorkDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $description = [
            [
                'description' => 'The Game will always be updated, the founder already think all off concept for 5 years ahead'
            ]
        ];

        WorkDescription::insert($description);
    }
}
