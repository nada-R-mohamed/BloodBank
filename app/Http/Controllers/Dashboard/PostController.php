<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::search($request)->paginate();
        $categories = Category::all();
        return view('dashboard.posts.index', compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Post::rules($request->category_id,'required'));
        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);
        $post = Post::create($data);
        return redirect()->route('posts.index')
            ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $post = Post::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('posts.index')
                ->with('error','Post not found');
        }
        $category = $post->category;
        return view('dashboard.posts.show',compact('post','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $post = Post::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('posts.index')->with('info','Post not found');
        }
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate(Post::rules($id));
        $post = Post::findOrFail($id);
        //old image
        $old_image = $post->image;
        $data = $request->except('image');
        $new_image = $this->uploadImage($request);
        if($new_image){
            $data['image'] = $new_image;
        }
        $post->update($data);
        //check if image was changed
        if($old_image && $new_image){
            Storage::disk('public')->delete($old_image);
        }
        //return redirect to index page with success message
        return redirect()->route('posts.index')
            ->with('success','Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success','post deleted successfully.');
    }

    protected function uploadImage(Request $request)
    {
        if(!$request->hasFile('image')) {
            return;
        }

        $file = $request->file('image');
        $path = $file->store('/uploads',[
            'disk' => 'public'
        ]);
        return $path;
    }

}
