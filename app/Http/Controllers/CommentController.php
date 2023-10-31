<?php

namespace App\Http\Controllers;

use Facades\App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|max:191'
        ]);

        Comment::saveOrUpdate($request->all());

        dd("Guardado exitoso...");
    }
}
