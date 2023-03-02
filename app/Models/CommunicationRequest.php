<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunicationRequest extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'title', 'content', 'is_done'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function scopeSearch($query, $request){
        if ($request->has('search')) {
            $query->where(function($query) use($request){
                $query->where('title', 'like', '%'. $request->search. '%');
                $query->orWhere('content', 'like', '%'. $request->search. '%');
                $query->orWhere('is_done', 'like', '%'. $request->search. '%');
                $query->orWhere('client_id', 'like', '%'. $request->search. '%');
            });
        }
    }
}
