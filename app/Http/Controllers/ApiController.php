<?php

namespace App\Http\Controllers;

use Facades\App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreImageRequest;

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
}
