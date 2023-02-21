<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BloodType extends Model
{
    use HasFactory;
    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');
    protected $hidden = ['created_at','updated_at','pivot'];

    /**
     * @return HasMany
     */
    public function donationRequests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    /**
     * @return BelongsToMany
     */
    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
