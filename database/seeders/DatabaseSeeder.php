<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ////////////////////////////////// CREATING USERS ///////////////////////////////
        // Create user 1
        DB::table('users')->insert([
            'name' => 'Jake Olsen',
            'email' => 'jakeolsen@example.com',
            'password' => Hash::make('jake1234'),
            'usertype' => 'user',
        ]);

        // Create user 2
        DB::table('users')->insert([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('jane1234'),
            'usertype' => 'user',
        ]);

        // Create user 3
        DB::table('users')->insert([
            'name' => 'Michael Johnson',
            'email' => 'michaeljohnson@example.com',
            'password' => Hash::make('michael1234'),
            'usertype' => 'user',
        ]);

        // Create user 4
        DB::table('users')->insert([
            'name' => 'Sarah Thompson',
            'email' => 'sarahthompson@example.com',
            'password' => Hash::make('sarah1234'),
            'usertype' => 'user',
        ]);

        // Create user 5
        DB::table('users')->insert([
            'name' => 'Emily Davis',
            'email' => 'emilydavis@example.com',
            'password' => Hash::make('emily1234'),
            'usertype' => 'user',
        ]);

        ////////////////////////////////// CREATING ADMINS ///////////////////////////////
        //Create admin 1
        DB::table('users')->insert([
            'name' => 'Liana Dmitrijeva',
            'email' => 'lianadmitwk@gmail.com',
            'google_id' => '114314555810231806598',
            'usertype' => 'admin',
        ]);

        ////////////////////////////////// CREATING BOOKS ///////////////////////////////
        //Create book 1
        DB::table('posts')->insert([
            'name' => "Harry Potter and the Philosopher's Stone",
            'author' => 'J.K.Rowling',
            'price' => 9.99,
            'condition' => 'good',
            'description' => "1st book in the series",
            'image'=> '1.jpg', 
            'user_id' => 1, 
        ]);
        //Create book 2
        DB::table('posts')->insert([
            'name' => "Harry Potter and the Chamber of Secrets	",
            'author' => 'J.K.Rowling',
            'price' => 9.99,
            'condition' => 'good',
            'description' => "2nd book in the series",
            'image'=> '2.jpg', 
            'user_id' => 1, 
        ]);

        //Create book 3
        DB::table('posts')->insert([
            'name' => "Harry Potter and the Prisoner of Azkaban",
            'author' => 'J.K.Rowling',
            'price' => 9.99,
            'condition' => 'good',
            'description' => "3rd book in the series",
            'image'=> '3.jpeg', 
            'user_id' => 1, 
        ]);

        //Create book 4
        DB::table('posts')->insert([
            'name' => "Harry Potter and the Goblet of Fire",
            'author' => 'J.K.Rowling',
            'price' => 9.99,
            'condition' => 'good',
            'description' => "4th book in the series",
            'image'=> '4.jpg', 
            'user_id' => 1, 
        ]);

        //Create book 5
        DB::table('posts')->insert([
            'name' => "Harry Potter and the Order of the Phoenix",
            'author' => 'J.K.Rowling',
            'price' => 9.99,
            'condition' => 'good',
            'description' => "5th book in the series",
            'image'=> '5.jpg', 
            'user_id' => 1, 
        ]);

        //Create book 6
        DB::table('posts')->insert([
            'name' => "Harry Potter and the Half-Blood Prince",
            'author' => 'J.K.Rowling',
            'price' => 9.99,
            'condition' => 'good',
            'description' => "6th book in the series",
            'image'=> '6.jpeg', 
            'user_id' => 1, 
        ]);

        //Create book 7
        DB::table('posts')->insert([
            'name' => "Harry Potter and the Deathly Hallows",
            'author' => 'J.K.Rowling',
            'price' => 9.99,
            'condition' => 'good',
            'description' => "7th book in the series",
            'image'=> '7.jpeg', 
            'user_id' => 1, 
        ]);
        
    }
}
