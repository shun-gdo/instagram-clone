<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritePostsController extends Controller
{
    //
    public function store(Request $request, $postId){
        \Auth::user()->favorite(intval($postId));
        return back();
    }
    
    public function destroy(Request $request, $postId){
        \Auth::user()->unfavorite(intval($postId));
        return back();
    }
}
