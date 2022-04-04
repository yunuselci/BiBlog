<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{

    protected $fillable  = ['title', 'subtitle', 'description', 'slug', 'published'];
    public $timestamps = false;
}
