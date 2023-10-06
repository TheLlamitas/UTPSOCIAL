<?php

namespace App\Http\Controllers;

use Facades\App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreImageRequest;
use Facades\App\Models\User;
use Illuminate\Support\Facades\View;

class ApiController extends Controller
{
    public function cropImage(StoreImageRequest $request)
    {
        try {
            $image = Post::storeImage($request);
            return response()->json([
                'imagePath' => asset('uploads').'/'.$image->basename,
                'imageName' => $image->basename
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function render(Request $request)
    {
        $user = User::find($request->user_id);
        return View::make('components.content-modal-post-show')->with('user', $user)->render();
    }
}
