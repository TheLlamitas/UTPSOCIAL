<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Facades\App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\Filters\DemoFilter;
use App\Http\Requests\Post\PostStoreRequest;

class PostController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->orderBy('updated_at', 'DESC')->get();
        return view('post', ['user' => $user, 'posts' => $posts]);
    }

    public function store(PostStoreRequest $request)
    {
        try {
            $data = $request->all();
            Post::saveOrUpdate($data);

            return redirect()->route('post', auth()->user()->username);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function edit(Request $request)
    {
        $post = Post::find($request->post_id);
        if ($request->user_id == $post->user_id) {
            $post->description = $request->description;
            $post->save();
            // $data = [
            //     'id' => $post->id,
            //     'description' => $request->description
            // ];

            // Post::saveOrUpdate($data);

            return 'Actializado correctamente!!!';
        } else {
            return "En el momento no hay formita";
        }
    }
}
