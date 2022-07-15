<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialAndFooterLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footers')->insert([
            // 'name' => Str::random(10),
            // 'email' => Str::random(10) . 'admin@admin.com',
            'address' => 'No Adress Added',
            'email' => 'shimul.ckbt@gmail.com',
            'phone' => '+8801786227277',
            'facebook' => 'https://www.facebook.com/shimulckbt/',
            'youtube' => 'https://www.youtube.com/channel/UC4bhFeQaISNfVTY-PLG3H3w',
            'twitter' => 'https://twitter.com/shimulckbt',
            'instagram' => 'https://www.instagram.com/shimulckbt/',
            'github' => 'https://github.com/shimulckbt',
            'linkedin' => 'https://www.linkedin.com/in/shimulckbt/',
            'stackoverflow' => 'https://stackoverflow.com/users/17585372/shimul-chakraborty',
            'footer_credit' => '2022 shimulckbt',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
