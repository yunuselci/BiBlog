<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'subtitle', 'slug', 'description', 'published', 'publish_to_dev_to', 'dev_to_article_id'];
}
