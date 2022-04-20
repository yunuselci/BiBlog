<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{

    protected $fillable  = ['title', 'subtitle', 'slug', 'description', 'published'];
    public $timestamps = false;
}
