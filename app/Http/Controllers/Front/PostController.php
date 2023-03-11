<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();
        return view('front.posts.index', compact('posts'));
    }
    public function postDetails(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $relatedPosts = Post::where('category_id', $post->category_id)->get();
        return view('front.posts.article-details', compact('post','relatedPosts'));
    }
}
