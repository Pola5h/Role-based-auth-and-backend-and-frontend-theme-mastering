<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin123'), // Hash the password
                'user_type' => '1',
                'created_at' => now(),
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'password' => Hash::make('user1234'), // Hash the password
                'user_type' => '2',
                'created_at' => now(),
            ],
        ];
    
        User::insert($users);
        $categories = [
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'description' => 'Explore the world and discover new destinations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Stay up to date with the latest tech trends and innovations.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Food and Cooking',
                'slug' => 'food-cooking',
                'description' => 'Delicious recipes, cooking tips, and culinary adventures.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Health and Wellness',
                'slug' => 'health-wellness',
                'description' => 'Tips for a healthier and happier life.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion and Style',
                'slug' => 'fashion-style',
                'description' => 'Trends, fashion tips, and style inspiration.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business and Finance',
                'slug' => 'business-finance',
                'description' => 'Financial insights and entrepreneurial advice.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gaming',
                'slug' => 'gaming',
                'description' => 'Video games, board games, and gaming culture.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Books and Literature',
                'slug' => 'books-literature',
                'description' => 'Book reviews, author interviews, and literary discussions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Art and Creativity',
                'slug' => 'art-creativity',
                'description' => 'Inspiration for artists and creative individuals.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Science and Nature',
                'slug' => 'science-nature',
                'description' => 'Exploring the wonders of the natural world and scientific discoveries.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Home and Interior Design',
                'slug' => 'home-interior-design',
                'description' => 'Interior decorating tips and home improvement ideas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Parenting and Family',
                'slug' => 'parenting-family',
                'description' => 'Parenting advice, family activities, and child development.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sports and Fitness',
                'slug' => 'sports-fitness',
                'description' => 'Sports news, workout routines, and fitness tips.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Music and Entertainment',
                'slug' => 'music-entertainment',
                'description' => 'The latest in music, movies, and pop culture.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DIY and Crafts',
                'slug' => 'diy-crafts',
                'description' => 'Do-it-yourself projects and creative craft ideas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more categories as needed
        ];
        
        Category::insert($categories);
        
    }
}
