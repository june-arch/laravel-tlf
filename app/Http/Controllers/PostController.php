<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPosts()
    {
        $posts = Post::with('user', 'detail')->get();

        $formattedPosts = $posts->map(function ($post) {
            return [
                'id' => $post->uuid,
                'title' => $post->title,
                'category' => $post->category,
                'image' => $post->image,
                'slug' => $post->slug,
                'detail' => [
                    'date' => Carbon::parse($post->detail->start_date)->format('M j, Y') . ' - ' . Carbon::parse($post->detail->end_date)->format('M j, Y'),
                    'time' => Carbon::parse($post->detail->start_date)->format('H:i') . ' - ' . Carbon::parse($post->detail->end_date)->format('H:i'),
                    'desc' => $post->detail->description,
                    'tags' => array_map('trim', explode(',', $post->detail->tags)),
                ],
                'author' => [
                    'name' => $post->user->name,
                    'uuid' => $post->user->uuid,
                ],
            ];
        });

        return response()->json(['data' => ['postLists' => $formattedPosts]]);
    }

    public function getPostsOnly()
    {
        $posts = Post::with('user', 'detail')->get();

        $formattedPosts = $posts->map(function ($post) {
            return [
                'id' => $post->uuid,
                'title' => $post->title,
                'category' => $post->category,
                'image' => $post->image,
                'slug' => $post->slug,
                'detail' => [
                    'date' => Carbon::parse($post->detail->start_date)->format('M j, Y') . ' - ' . Carbon::parse($post->detail->end_date)->format('M j, Y'),
                    'time' => Carbon::parse($post->detail->start_date)->format('H:i') . ' - ' . Carbon::parse($post->detail->end_date)->format('H:i'),
                    'desc' => $post->detail->description,
                    'tags' => array_map('trim', explode(',', $post->detail->tags)),
                ],
                'author' => [
                    'name' => $post->user->name,
                    'uuid' => $post->user->uuid,
                ],
            ];
        });

        return response()->json(['data' => ['postLists' => $formattedPosts]]);
    }
}
