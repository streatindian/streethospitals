<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    public $fillable = ['title', 'slug', 'meta_title', 'meta_keyword', 'meta_description', 'thumbnail', 'banner_image', 'sort_description', 'description', 'status'];
}
