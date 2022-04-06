<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnippetTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'slug', 'description', 'published'];
    public $timestamps = false;
}
