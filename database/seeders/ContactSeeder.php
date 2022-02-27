<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact = [
            [
                'icon' => 'fab fa-twitter', 
                'link' => 'https://twitter.com/'
            ],
            [
                'icon' => 'fab fa-discord', 
                'link' => 'https://discord.com/'
            ],
        ];

        Contact::insert($contact);
    }
}
