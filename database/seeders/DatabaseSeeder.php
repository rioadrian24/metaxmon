<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UserSeeder::class);
        $this->call(BannerSettingSeeder::class);
        $this->call(RoadMapSeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(WorkDescriptionSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(NftSeeder::class);
    }
}
