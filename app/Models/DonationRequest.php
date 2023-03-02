<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_name',
        'patient_phone',
        'patient_age',
        'hospital_name',
        'hospital_address',
        'city_id',
        'blood_type_id',
        'bags_num',
        'details',
        'latitude',
        'longitude',
        'client_id'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notification');
    }

    /**
     * @return BelongsTo
     */
    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }
    public function scopeSearch($query, $request){
        if ($request->has('search')) {
            $query->where(function($query) use($request){
                $query->where('patient_name', 'like', '%'. $request->search. '%');
                $query->orWhere('patient_phone', 'like', '%'. $request->search. '%');
                $query->orWhere('patient_age', 'like', '%'. $request->search. '%');
                $query->orWhere('blood_type_id', 'like', '%'. $request->search. '%');
                $query->orWhere('bags_num', 'like', '%'. $request->search. '%');
            });
        }
    }
}
