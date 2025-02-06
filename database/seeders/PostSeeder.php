<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'First News Post',
                'news_content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum maxime incidunt nostrum adipisci expedita, recusandae minus aperiam quisquam, rem dolores, obcaecati esse iste quaerat est quam delectus nesciunt quibusdam pariatur.',
                'author' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => 'Second News Post',
                'news_content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum maxime incidunt nostrum adipisci expedita, recusandae minus aperiam quisquam, rem dolores, obcaecati esse iste quaerat est quam delectus nesciunt quibusdam pariatur.',
                'author' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
