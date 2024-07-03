<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    //
    
    public function store(String $id){
        
        \Auth::user()->follow(intval($id));
        
        return back();
    }
    
    public function destroy(String $id){
        
        \Auth::user()->unfollow(intval($id));
        
        return back();
    }
}
