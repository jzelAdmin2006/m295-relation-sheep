<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    function findPostsBySlug($tagSlug)
    {
        return Tag::where('slug', '=', $tagSlug)
            ->first()
            ->posts()
            ->with('author')
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content,
                    'tags' => $post->tags,
                    'author' => $post->author,
                    'topic' => $post->topic,
                ];
            });
    }
}
