<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'governorate_id'];

    public function governorate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function donationRequests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\DonationRequest');
    }
    public static function rules($cityId=0)
    {
        return [
            'name' => "required|string|min:3|max:255|unique:cities,name,$cityId",
            'governorate_id' => "required|integer|exists:governorates,id",
        ];
    }
}
