<?php

namespace App\Http\Controllers;

use Facades\App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Post\StoreImageRequest;
use Facades\App\Models\User;
use Illuminate\Support\Facades\View;
use App\Traits\ApiResponse;

class ApiController extends Controller
{
    use ApiResponse;
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

    public function destroyPost(Request $request) : JsonResponse
    {
        try {
            $response = Post::destroyPost($request->post_id);
            return $this->responseJson($response['status'], $response['message'], $response['data']);
        } catch (\Throwable $th) {
            return $this->responseJson(false, $th->getMessage(), [], 500);
        }
        
    }
}
