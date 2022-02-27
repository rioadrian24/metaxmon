<?php

namespace Database\Seeders;

use App\Models\Nft;
use Illuminate\Database\Seeder;

class NftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nfts = [
            [
                'egg' => 'assets/egg/1.png',
                'nft' => 'assets/nft/1.png',
            ],
            [
                'egg' => 'assets/egg/2.png',
                'nft' => 'assets/nft/2.png',
            ],
            [
                'egg' => 'assets/egg/3.png',
                'nft' => 'assets/nft/3.png',
            ],
            [
                'egg' => 'assets/egg/4.png',
                'nft' => 'assets/nft/4.png',
            ],
            [
                'egg' => 'assets/egg/5.png',
                'nft' => 'assets/nft/5.png',
            ],
        ];

        Nft::insert($nfts);
    }
}
