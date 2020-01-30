<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostInformation;
use App\Tag;
use App\User;

class TagController extends Controller
{
    public function remove(Post $post, Tag $tag) {
        $post-> tags()-> detach($tag);
        return redirect()->back();

    }
}
