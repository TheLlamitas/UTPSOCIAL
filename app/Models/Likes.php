<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Traits\Database;
use Facades\App\Models\User;
use Facades\App\Models\Post;

class Likes extends Model
{
    use Database;

    protected $fillable = [
        'user_id',
        'post_id'
    ];

    public function likeDeleteorSave($request)
    {
        $data = [
            'status' => false,
            'message' => '',
            'data' => []
        ];

        $user = User::find($request->user_id);
        $post = Post::find($request->post_id);

        if(!isset($user_id))
        {
            $data['message'] = 'No se encontro el usuario.';
        } 

        if(!isset($post_id))
        {
            $data['message'] = 'No se encontro el post.';
        } 

        if($user->likedPosts()->where('post_id', $request->post_id)->exists())
        {
            $user->likedPosts()->detach($request->post_id);
            $data['message'] = 'Like Eliminado.';
        }else{
            $user->likedPosts()->attach($request->post_id);
            $data['status'] = true;
            $data['message'] = 'Like agregado.';
        }
        return $data;
        
    }
}
