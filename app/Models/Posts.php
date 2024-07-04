<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    
    protected $fillable = ['img_name','caption'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function favorites(){
        return $this->belongsToMany(User::class,'favorites','post_id','user_id');
    }
    
    public function favorite_count(){
        // $favorite_users = $this->belongsToMany(User::class,'favorites','post_id','user_id');
        // $favorite_users_id = $favorite_users->pluck('user_id')->toArray();
        
        // return count($favorite_users_id);
        return $this->favorites()->count();
    }
    
    
    
}
