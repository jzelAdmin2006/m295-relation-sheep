<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class TopicController extends Controller
{
    function findPostsBySlug($slug)
    {
        return Topic::where('slug', '=', $slug)
            ->first()
            ->posts()
            ->with('author')
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content,
                    'topic' => $post->topic,
                    'author' => $post->author,
                ];
            });
    }
}
