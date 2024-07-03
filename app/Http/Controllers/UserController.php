<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function search(Request $request){
        $searchTerm = $request->input('search');
        $users = User::search($searchTerm)->get();
        
        if(isset($searchTerm)){
            
        return view('/Users/search_user',[
            'users'=>$users,
            'initialValue' => $searchTerm,
            ]);
        }else{
            return view('/Users/search_user');
        }
    }
}
