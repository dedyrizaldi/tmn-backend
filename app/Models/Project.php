<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'project_category_id',
        'title',
        'slug',
        'client',
        'location',
        'project_date',
        'excerpt',
        'description',
        'meta_title',
        'meta_description',
        'featured',
        'sort_order',
        'status',
        'published_at',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'project_date' => 'date',
        'published_at' => 'datetime',
    ];

    /**
     * Category Relationship
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
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