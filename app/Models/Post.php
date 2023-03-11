<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'content', 'category_id'];
    protected $hidden = ['created_at', 'updated_at','pivot'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function scopeSearch($query, $request){
        if ($request->has('find')) {
            $query->where(function($query) use($request){
                $query->where('title', 'like', '%'. $request->find. '%');
                $query->orWhere('content', 'like', '%'. $request->find. '%');
            });
        }

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

    }
    public static function rules($postId=0,$required='')
    {
        return [
            'title' => "required|string|min:3|max:255|unique:posts,title,$postId",
            'category_id' => "required|integer|exists:categories,id",
            'content' => "required|string",
            'image' => "$required|image|mimes:jpeg,png,jpg,gif,svg",
        ];
    }
//    public function getImageAttribute($image)
//    {
//        return asset("storage/" . $image);
//    }
}
