<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Detail;
use App\Models\Post;

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Retrieve post IDs
         $post1 = Post::where('title', 'Exciting Developments in Artificial Intelligence')->firstOrFail()->id;
         $post2 = Post::where('title', 'Explore the Enchanting Beauty of Bali')->firstOrFail()->id;
         $post3 = Post::where('title', 'Fashion Trends: Spring/Summer 2023')->firstOrFail()->id;
         $post4 = Post::where('title', 'Gourmet Delights: Culinary Adventures Around the World')->firstOrFail()->id;
 
         // Create details for each post
         Detail::create([
             'start_date' => '2023-01-01',
             'end_date' => '2023-01-10',
             'description' => 'This post discusses the latest updates in technology trends and innovations. It covers topics such as artificial intelligence, machine learning, and data science.',
             'tags' => 'technology, AI, machine learning, data science',
             'post_id' => $post1,
         ]);
 
         Detail::create([
             'start_date' => '2023-02-01',
             'end_date' => '2023-02-10',
             'description' => 'In this post, we explore the world of travel and adventure. From exotic destinations to hidden gems, get inspired to embark on your next journey!',
             'tags' => 'travel, adventure, destination, exploration',
             'post_id' => $post2,
         ]);
 
         Detail::create([
             'start_date' => '2023-03-01',
             'end_date' => '2023-03-10',
             'description' => 'Discover the latest fashion trends and style tips in this captivating post. Whether you\'re a fashion enthusiast or simply looking for inspiration, this post has something for everyone.',
             'tags' => 'fashion, style, trends, inspiration',
             'post_id' => $post3,
         ]);
 
         Detail::create([
             'start_date' => '2023-04-01',
             'end_date' => '2023-04-10',
             'description' => 'Delve into the world of culinary delights with our mouth-watering post. From delectable recipes to foodie adventures, satisfy your cravings and indulge in gastronomic pleasures.',
             'tags' => 'food, recipes, culinary, gastronomy',
             'post_id' => $post4,
         ]);
    }
}
