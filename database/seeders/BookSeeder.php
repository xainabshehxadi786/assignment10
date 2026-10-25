<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'book_title' => 'Laravel for Beginners',
                'book_price' => 1200.00,
                'book_author' => 'John Smith',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_title' => 'Learning PHP',
                'book_price' => 900.00,
                'book_author' => 'Ali Ahmed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_title' => 'MySQL Basics',
                'book_price' => 750.00,
                'book_author' => 'Sara Khan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

