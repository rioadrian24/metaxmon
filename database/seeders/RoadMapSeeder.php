<?php

namespace Database\Seeders;

use App\Models\RoadMap;
use Illuminate\Database\Seeder;

class RoadMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maps = [
            [
                'title' => 'metaXmon Phase 0.1 ( Q1 2022:)',
                'description' => 'metaXMon Released on XRPLedger
Creating metaXmon Twitter, Discord, Instagram
Whitepaper, Roadmap, Website Release
Blackholed Account issuer
Upgrading NFT art ( Logo,NFT )
Airdrop For Community
Pre-Sale 10% of development wallet',
            ],
            [
                'title' => 'metaXmon Phase 0.2-0.5 ( Q1-Q2 2022 )',
                'description' => 'Final art NFT Released
Giveaway 15% of supply to the community
Building a strong and solid community
Minting, Selling, Promotion NFT
Hiring Digital Artist',
            ],
            [
                'title' => 'metaXmon Phase 0.6-0.9 ( Q3-Q4 2022 )',
                'description' => 'Game Concept Released
Game Trailer Released
Game Development
Build a full Website',
            ],
            [
                'title' => 'metaXmon Phase 1.0 ( Q4-Q1 2023 )',
                'description' => 'Website Released ( Minting, Trade and sell )
Heaven Pixie (HP) Token released ( For Breeding, Growing, Reward on game content )',
            ],
        ];

        RoadMap::insert($maps);
    }
}
