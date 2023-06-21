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
            'name' => 'Jack Olsen',
            'email' => 'jackolsen@example.com',
            'password' => Hash::make('jack1234'),
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
        
        //Create book 8
        DB::table('posts')->insert([
            'name' => "The Shining",
            'author' => 'Stephen King',
            'price' => 12.65,
            'condition' => 'new',
            'description' => "The Shining centers on Jack Torrance, a struggling writer and recovering alcoholic who accepts a position as the off-season caretaker of the historic Overlook Hotel in the Colorado Rockies. His family accompanies him on this job, including his young son Danny, who possesses 'the shining', an array of psychic abilities that allow the child to glimpse the hotel's horrific true nature. Soon, after a winter storm leaves the family snowbound, the supernatural forces inhabiting the hotel influence Jack's sanity, leaving his wife and son in grave danger.",
            'image'=> '8.jpg', 
            'user_id' => 5, 
        ]);

        //Create book 9
        DB::table('posts')->insert([
            'name' => "The Dead Zone",
            'author' => 'Stephen King',
            'price' => 16.85,
            'condition' => 'very good',
            'description' => "The Dead Zone is a science fiction thriller novel by Stephen King published in 1979. The story follows Johnny Smith, who awakens from a coma of nearly five years and, apparently as a result of brain damage, now experiences clairvoyant and precognitive visions triggered by touch. When some information is blocked from his perception, Johnny refers to that information as being trapped in the part of his brain that is permanently damaged, 'the dead zone.' The novel also follows a serial killer in Castle Rock, and the life of rising politician Greg Stillson, both of whom are evils Johnny must eventually face.",
            'image'=> '9.jpg', 
            'user_id' => 5, 
        ]);

        //Create book 10
        DB::table('posts')->insert([
            'name' => "The Running Man",
            'author' => 'Stephen King',
            'price' => 4.89,
            'condition' => 'old',
            'description' => "The story follows protagonist Ben Richards as he participates in the reality show The Running Man in which contestants, allowed to go anywhere in the world, are chased by the general public, who get a huge bounty if they kill him.",
            'image'=> '10.jpeg', 
            'user_id' => 5, 
        ]);

        //Create book 11
        DB::table('posts')->insert([
            'name' => "The Green Mile",
            'author' => 'Stephen King',
            'price' => 6.75,
            'condition' => 'new',
            'description' => "The Green Mile is a 1996 serial novel by American writer Stephen King. It tells the story of death row supervisor Paul Edgecombe's encounter with John Coffey, an unusual inmate who displays inexplicable healing and empathetic abilities. The serial novel was originally released in six volumes before being republished as a single-volume work. The book is an example of magical realism. The subsequent film adaptation was a critical and commercial success.",
            'image'=> '11.jpeg', 
            'user_id' => 5, 
        ]);

        //Create book 12
        DB::table('posts')->insert([
            'name' => "Misery",
            'author' => 'Stephen King',
            'price' => 10.50,
            'condition' => 'old',
            'description' => "Misery is an American psychological horror thriller novel written by Stephen King and first published by Viking Press on June 8, 1987.[1] The novel's narrative is based on the relationship of its two main characters – the romance novelist Paul Sheldon and his deranged self-proclaimed number one fan Annie Wilkes. When Paul is seriously injured following a car accident, former nurse Annie brings him to her home, where Paul receives treatment and doses of pain medication. Paul realizes that he is a prisoner and is forced to indulge his captor's whims.",
            'image'=> '12.jpg', 
            'user_id' => 5, 
        ]);
    }
}
