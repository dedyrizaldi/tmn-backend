<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'news';

    protected $fillable = [
        'news_category_id',
        'title',
        'slug',
        'author',
        'excerpt',
        'content',
        'meta_title',
        'meta_description',
        'featured',
        'sort_order',
        'status',
        'published_at',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Category Relationship
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(
            NewsCategory::class,
            'news_category_id',
            'id'
        );
    }

    /**
     * Media Collections
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('thumbnail')
            ->singleFile();

        $this
            ->addMediaCollection('gallery');
    }
}