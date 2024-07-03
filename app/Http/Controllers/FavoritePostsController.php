<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritePostsController extends Controller
{
    //
    public function store(string $postId){
        \Auth::user()->favorite()
    }
}
