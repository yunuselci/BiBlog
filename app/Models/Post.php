<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Post extends Model implements TranslatableContract
{
    use Translatable;

    protected $casts = [
        'published' => 'boolean',
        'publish_to_dev_to' => 'boolean',
    ];

    public $translatedAttributes = ['title', 'subtitle', 'slug', 'description', 'published', 'publish_to_dev_to', 'dev_to_article_id'];

    protected $fillable = ['id', 'user_id', 'image', 'view_count', 'created_at', 'updated_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsPublished(Builder $builder)
    {
        return $builder->whereTranslation('published', true);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
    }

    public function getShortDescriptionAttribute()
    {
        return $this->subtitle ?: Str::limit(strip_tags($this->description));
    }

    public function getUrlAttribute()
    {
        if (!blank($this->slug)) {
            return route('posts.show', $this->slug);
        }
    }

    public function getHumanizedCreatedAtAttribute()
    {
        return $this->created_at->formatLocalized('%B %d, %Y');
    }

    public function getMarkdownAttribute()
    {
        return $this->description;
    }
}
