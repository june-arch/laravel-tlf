<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        // Retrieve user IDs
        $user1 = User::where('name', 'Admin')->firstOrFail()->id;
        $user2 = User::where('name', 'John Doe')->firstOrFail()->id;

        // Create four posts
        Post::create([
            'uuid' => \Illuminate\Support\Str::uuid(),
            'title' => 'Exciting Developments in Artificial Intelligence',
            'category' => 'Technology',
            'image' => 'ai.jpg',
            'slug' => 'exciting-developments-in-artificial-intelligence',
            'user_id' => $user1,
        ]);

        Post::create([
            'uuid' => \Illuminate\Support\Str::uuid(),
            'title' => 'Explore the Enchanting Beauty of Bali',
            'category' => 'Travel',
            'image' => 'bali.jpg',
            'slug' => 'explore-the-enchanting-beauty-of-bali',
            'user_id' => $user1,
        ]);

        Post::create([
            'uuid' => \Illuminate\Support\Str::uuid(),
            'title' => 'Fashion Trends: Spring/Summer 2023',
            'category' => 'Fashion',
            'image' => 'fashion.jpg',
            'slug' => 'fashion-trends-spring-summer-2023',
            'user_id' => $user2,
        ]);

        Post::create([
            'uuid' => \Illuminate\Support\Str::uuid(),
            'title' => 'Gourmet Delights: Culinary Adventures Around the World',
            'category' => 'Food',
            'image' => 'food.jpg',
            'slug' => 'gourmet-delights-culinary-adventures-around-the-world',
            'user_id' => $user2,
        ]);
    }
}

