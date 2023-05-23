<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    function findAll()
    {
        return Post::get();
    }
}
