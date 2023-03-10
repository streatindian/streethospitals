<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
   protected $fillable = ['type','name','slug','description','thumbnail','banner_image','parent_id'];

   public function category(){
    return $this->hasOne('App\Models\Category','id','parent_id');
   }
}
