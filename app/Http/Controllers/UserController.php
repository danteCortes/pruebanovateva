<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreUserRequest;

use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function index(){
        return User::get();
    }

    public function save(StoreUserRequest $request){

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->save();

        return $user;
    }

    public function inCategory(Request $request){
        return User::leftJoin('posts as p', 'p.user_id', '=', 'users.id')
            ->leftJoin('categories as c', 'c.id', '=', 'p.category_id')
            ->where('c.id', $request->category_id)
            ->get();
    }

    public function allPosts($user_id){
        return Post::where('user_id', $user_id)->get();
    }
}
