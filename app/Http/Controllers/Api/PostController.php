<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use ApiResponses;
    public function allPosts(Request $request) : JsonResponse
    {
        $posts = Post::search($request)->paginate();
        if($request->has('find')) {

            $findPost = Post::where('title', 'like', '%'. $request->get('find'). '%')
                ->orWhere('content', 'like', '%'. $request->get('find'). '%')->get();
            return $this->responseData(compact('findPost'));
        }
        $posts = Post::paginate();
        return $this->responseData(compact('posts'),"all posts");
    }
    public function post(Request $request) : JsonResponse
    {
        if (! $request->has('id')) {
            return $this->responseError(['id'=> 'not found post id']);
        }
        $validator = Validator::make([$request->query('id')],
            ['id'=>'integer'],
            ['exists:posts,id']);
        if ($validator->fails()) {
            return $this->responseError(['id'=>$validator->errors()]);
        }
        $post = Post::with('category')->find($request->query('id'));

        return $this->responseData(compact('post'),"the selected post");
    }
    public function listFavoritePosts() : JsonResponse
    {
        $client = Auth::guard('sanctum')->user();
        $favoritePosts = $client->posts()->paginate();
        return $this->responseData(compact('favoritePosts'),"list of favorite posts");
    }

    public function toggleFavoritePosts(Request $request) : JsonResponse
    {
        if(! $request->post_id){
            return $this->responseError(['post_id'=> 'not found post id']);
        }
        $client = Auth::guard('sanctum')->user();
        $favoritePosts = $client->posts()->toggle($request->post_id);
        return $this->responseData(compact('favoritePosts'),"toggle favorite posts");

    }
}
