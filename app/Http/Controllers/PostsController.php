<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Posts;

class PostsController extends Controller
{
    //
    
    public function store(Request $request){
        
        
        $user = \Auth::user();
        $user_id = $user->id;
        $post = new Posts;
        
        $user_post_count = $user->posts()->count();
        
        $image_name = "{$user_id}_{$user_post_count}";
        $file = $request->file('file_image');
        $image_ext = $file->getClientOriginalExtension();
        $file->storeAs('public/images/',"{$image_name}.{$image_ext}");

        $request->user()->posts()->create([
            'user_id' => $user->id,
            'caption' => $request->caption,
            'img_path' => $image_name,
            'img_ext' => $image_ext,
            ]);
    
        return back();
    }
    
}
