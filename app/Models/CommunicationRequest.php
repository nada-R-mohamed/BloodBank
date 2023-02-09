<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunicationRequest extends Model 
{

    protected $table = 'communication_requests';
    public $timestamps = true;
    protected $fillable = array('client_id', 'title', 'content', 'is_done');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}