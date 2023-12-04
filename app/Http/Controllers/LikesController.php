<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Facades\App\Models\Likes;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;


class LikesController extends Controller
{
    use ApiResponse;

    public function likes(Request $request) : JsonResponse
    {
        $response = Likes::likeDeleteorSave($request);
        return $this->responseJson($response['status'], $response['message'], $response['data']);
    }
    
}
