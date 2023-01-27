<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','type','name','phone','address','timing','days','profile_pic','user_id',
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
    "pathology" ,
    "is_radiodiagnosis" ,"radiodiagnosis","ambulance",
    "about"];
}
