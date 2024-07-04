<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Posts;

class PostsController extends Controller
{
    //
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザーを取得
            $user = \Auth::user();
            // ユーザーの投稿の一覧を作成日時の降順で取得
            $posts = $user->feedPosts()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        
        // index
        return view('index',[
            'user' => $user,
            'posts'=>$posts,
            ]);
    }
    
    public function store(Request $request){
        
        
        $user = \Auth::user();
        $user_id = $user->id;
        $post = new Posts;
        
        $user_post_count = $user->posts()->count();
        
        $file = $request->file('file_image');
        $img_ext = $file->getClientOriginalExtension();
        $img_name = "{$user_id}_{$user_post_count}.{$img_ext}";
        $file->storeAs('public/images/',$img_name);

        $request->user()->posts()->create([
            'user_id' => $user->id,
            'caption' => $request->input('caption'),
            'img_name' => $img_name,
            ]);
    
        return back();
    }
    
    public function show(string $postId){
        
        $user = \Auth::user();
        $user_id = \Auth::id();
        $post = Posts::findOrFail(intval($postId));
        
        return view('posts/post_detail',[
            'user' => $user,
            'post' => $post,
        ]);
        
    }
    
    public function destroy($postId){
        $post = Posts::findOrFail($postId);
        if(\Auth::id() === $post->user->id){
            $post->delete();
            return redirect('/');
        }
        
        return back()->with('Delete Failed');
    }
    
}
