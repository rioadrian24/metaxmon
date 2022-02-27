<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = [
            [
                'title' => 'Play',
                'description' => 'Enjoy the game with great stories and explore the metaXmon world. Not only you, but you can play with your friends.',
            ],
            [
                'title' => 'Breed',
                'description' => 'You can breed with 2 Dragocat and you will get 1 Egg with 4 different rarities ( common, rare, unique, mythic ).',
            ],
            [
                'title' => 'Trade and sell',
                'description' => 'In the future, there will be a full access website you can trade, sell and mint metaXmon dragocat.',
            ],
            [
                'title' => 'Earn',
                'description' => 'You can Earn Heavenly potion by playing the game, fighting the enemy, fighting against another player, and many more.',
            ],
        ];

        Work::insert($works);
    }
}
