<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['posts','followings','followers','favorites']);
    }
    
    // Postsモデルとの関係
    public function posts(){
        return $this->hasMany(Posts::class);
    }
    
    //Userモデルとの関係 
    public function followings(){
        return $this->belongsToMany(User::class, 'follow','user_id','follow_id')->withTimestamps();
    }
    
    public function followers(){
        return $this->belongsToMany(User::class, 'follow','follow_id','user_id')->withTimestamps();
    }
    
    public function favorites(){
        return $this->belongsToMany(Posts::class,'favorites','user_id','post_id')->withTimestamps();
    }
    
    // ユーザをフォローしているか判定
    public function isFollow($userId){
        return $this->followings()->where('follow_id',$userId)->exists();
    }
    
    public function follow(int $userId){
        $exist = $this->isFollow($userId);
        $its_me = $this->id == $userId;
        
        if($exist || $its_me){
            return false;
        }else{
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow(int $userId){
        $exist = $this->isFollow($userId);
        $its_me = $this->id == $userId;
        
        if($exist && !$its_me){
            $this->followings()->detach($userId);
            return true;
        }else{
            return false;
        }
    }
    
    public function feedPosts(){
        // フォローしているユーザのid配列を作成
        $userIds = $this->followings()->pluck('users.id')->toArray();
        $userIds[] = $this->id;
        
        return Posts::whereIn('user_id',$userIds);
    }
    
    public function followingsCount(){
        $userIds = $this->followings()->pluck('users.id')->toArray();
        return count($userIds);
    }
    
    public function followersCount(){
        $userIds = $this->followers()->pluck('users.id')->toArray();
        return count($userIds);
    }
    
    public function scopeSearch($query,$searchTerm){
        return $query->where(function($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('id', 'like', '%' . $searchTerm . '%');
        });
    }
    
    public function isFavorited(int $postId){
        return $this->favorites()->where('post_id',$postId)->exists();
    }
    
    public function favorite(int $postId){
        $exist = $this->isFavorited($postId);
        
        if($exist){
            return false;
        }else{
            $this->favorites()->attach($postId);
            return true;  
        }
    }
    
    public function unfavorite(int $postId){
        $exist = $this->isFavorited($postId);
        
        if($exist){
            $this->favorites()->detach($postId);
            return true;
        }else{
            return false;  
        }
    }
    
    // public function favoriteCount($postId){
    //     $post = $this->posts()->findOrFail($postId);
    //     $post->
    // }
    
}
