<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BloodType extends Model
{
    use HasFactory;
    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at','pivot'];


    public function donationRequests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function clients(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\Client');
    }
}
