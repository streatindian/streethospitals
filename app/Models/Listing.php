<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Bolvachan@2022

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'type',
        'name',
        'phone',
        'address',
        'timing',
        'days',
        'profile_pic',
        'user_id',
        "year",
        "address",
        "country",
        "state",
        "city",
        "phone2",
        "email",
        "email2",
        "website",
        "director_name",
        "director_phone",
        "manager_name",
        "manager_phone",
        "management",
        "service",
        "intensive_care_services",
        "pathology",
        "is_radiodiagnosis",
         "radiodiagnosis",
          "ambulance",
        "about",
        "gender","degree","specialization","state_medical_council","registration_number","birth_date","birth_month",
        "birth_year","blood_group","clinic_hospital_name","practicing_since_year",
        "pincode","massage_types","service_type","latitude","longitude","status"
    ];

    public function course(){
        return $this->hasMany('App\Models\course','listing_id','id');
    }

    public function associations(){
        return $this->hasMany('App\Models\Association','listing_id','id');
    }
}
