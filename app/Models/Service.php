<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','description','icon','banner','status','parent'];
    public function parentService(){
        return $this->hasOne('App\Models\Service','id','parent');
    }
}
