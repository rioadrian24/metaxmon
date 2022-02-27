<?php

namespace Database\Seeders;

use App\Models\BannerSetting;
use Illuminate\Database\Seeder;

class BannerSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = [
            [
                'title' => 'What is metaXmon?',
                'description' => 'metaXmon is a game project running on XRPLedger, There will be 2500 First generation NFT on metaXmon. You can play, earn, trade and sell on the metaXmon website in the future.',
                'link_whitepaper' => 'https://drive.google.com/file/d/112B8OirREf2WYIyLm5GHQ4rvNBf7WZ2t/view?usp=drivesdk',
                'link_trustlink' => 'https://xrpl.services/?issuer=rfXHsMTsLKQPrrTYWtX3fgRPtGCF2drtA2&currency=mXm&limit=100000000',
                'thumbnail' => 'assets/banner/1.png',
            ],
        ];

        BannerSetting::insert($banner);
    }
}
