<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;
    protected $table = 'governorates';
    protected $fillable = ['name'];
    protected $hidden = ['pivot'];


    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public static function rules($id=0)
    {
        return [
            'name' => "required|string|min:3|max:255|unique:governorate,name,$id",
        ];
    }
}
