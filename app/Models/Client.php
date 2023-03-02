<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable = [
        'name',
        'phone',
        'password',
        'email',
        'date_of_birth',
        'last_donation_date',
        'city_id',
        'status',
        'blood_type_id',
        'pin_code',
        'device_name',
    ];


    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function communicatioRequests()
    {
        return $this->hasMany('App\Models\CommunicationRequest');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\DonationRequest');
    }

    public function notificationTokens()
    {
        return $this->hasMany('App\Models\Token');
    }
    public function scopeSearch($query, $request){
        if ($request->has('search')) {
            $query->where(function($query) use($request){
                $query->where('name', 'like', '%'. $request->search. '%');
                $query->orWhere('email', 'like', '%'. $request->search. '%');
            });
        }
    }

}
