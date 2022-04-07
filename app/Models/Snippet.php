<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Snippet extends Model implements TranslatableContract
{
    use Translatable;

    protected $casts = [
        'published' => 'boolean',
        'publish_to_dev_to' => 'boolean',
    ];

    public $translatedAttributes = ['title', 'subtitle', 'slug', 'description', 'published', 'publish_to_dev_to', 'dev_to_article_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
