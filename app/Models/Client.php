<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable =
        ['name',
        'phone',
        'password',
        'email',
        'date_of_birth',
        'last_donation_date',
        'city_id',
        'blood_type',
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


}
