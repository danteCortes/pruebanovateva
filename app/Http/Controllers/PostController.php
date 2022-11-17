<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index(){
        return Post::get();
    }

    public function save(StorePostRequest $request){

        $post = new Post;
        $post->category_id = $request->category_id;
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return $post;
    }

    public function getByCategory(Request $request) {
        return Post::where('category_id', $request->category_id)->get();
    }
}
