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
     *
     * Category digunakan sebagai Lingkup Kerja project.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(
            ProjectCategory::class,
            'project_category_id'
        );
    }

    /**
     * Media Collections
     */
    public function registerMediaCollections(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Thumbnail
        |--------------------------------------------------------------------------
        |
        | Thumbnail utama project.
        |
        */
        $this
            ->addMediaCollection('thumbnail')
            ->singleFile();

        /*
        |--------------------------------------------------------------------------
        | Client Logo
        |--------------------------------------------------------------------------
        |
        | Logo perusahaan/client.
        | Hanya boleh memiliki satu file.
        |
        */
        $this
            ->addMediaCollection('client_logo')
            ->singleFile();

        /*
        |--------------------------------------------------------------------------
        | Gallery
        |--------------------------------------------------------------------------
        |
        | Berisi seluruh foto pekerjaan/project.
        | Dapat memiliki banyak file.
        |
        */
        $this
            ->addMediaCollection('gallery');

        /*
        |--------------------------------------------------------------------------
        | Experience Letter
        |--------------------------------------------------------------------------
        |
        | Surat pengalaman kerja.
        | Hanya boleh memiliki satu file.
        |
        */
        $this
            ->addMediaCollection('experience_letter')
            ->singleFile();
    }

    /**
     * Scope a query to only published projects.
     */
    public function scopePublished($query)
    {
        return $query
            ->where('status', 'published')
            ->where(function ($query) {
                $query
                    ->whereNull('published_at')
                    ->orWhere(
                        'published_at',
                        '<=',
                        now()
                    );
            });
    }

    /**
     * Scope a query to featured projects.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}