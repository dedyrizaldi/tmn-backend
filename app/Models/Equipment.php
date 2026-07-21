<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Equipment extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'equipments';

    protected $fillable = [
        'equipment_category_id',
        'name',
        'slug',
        'brand',
        'model',
        'excerpt',
        'description',
        'specifications',
        'applications',
        'meta_title',
        'meta_description',
        'featured',
        'sort_order',
        'status',
        'published_at',
    ];

    protected $casts = [
        'specifications' => 'array',
        'applications'   => 'array',
        'featured'       => 'boolean',
        'published_at'   => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            EquipmentCategory::class,
            'equipment_category_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Media Library
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('thumbnail')
            ->singleFile();

        $this
            ->addMediaCollection('gallery');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getThumbnailAttribute(): ?string
    {
        return $this->getFirstMediaUrl('thumbnail');
    }

    public function getGalleryAttribute(): array
    {
        return $this
            ->getMedia('gallery')
            ->map(fn (Media $media) => $media->getUrl())
            ->toArray();
    }
}