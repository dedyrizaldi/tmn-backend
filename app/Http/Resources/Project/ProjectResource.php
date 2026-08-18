<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'title' => $this->title,

            'slug' => $this->slug,

            'client' => $this->client,

            'location' => $this->location,

            'project_date' => optional($this->project_date)
                ?->toDateString(),

            'excerpt' => $this->excerpt,

            'description' => $this->description,

            /*
            |--------------------------------------------------------------------------
            | Thumbnail
            |--------------------------------------------------------------------------
            */
            'thumbnail' => $this->getFirstMediaUrl('thumbnail'),

            /*
            |--------------------------------------------------------------------------
            | Experience Letter
            |--------------------------------------------------------------------------
            |
            | Surat pengalaman disimpan sebagai satu file/gambar
            | pada media collection "experience_letter".
            |
            */
            'experience_letter' => $this->getFirstMediaUrl(
                'experience_letter'
            ) ?: null,

            /*
            |--------------------------------------------------------------------------
            | Gallery
            |--------------------------------------------------------------------------
            */
            'gallery' => $this->getMedia('gallery')
                ->map(fn ($media) => [
                    'id' => $media->id,
                    'name' => $media->name,
                    'url' => $media->getUrl(),
                ])
                ->values(),

            /*
            |--------------------------------------------------------------------------
            | Category
            |--------------------------------------------------------------------------
            */
            'category' => [
                'id' => $this->category?->id,
                'name' => $this->category?->name,
                'slug' => $this->category?->slug,
            ],

            'featured' => (bool) $this->featured,

            'status' => $this->status,

            'meta_title' => $this->meta_title,

            'meta_description' => $this->meta_description,

            'published_at' => optional($this->published_at)
                ?->toIso8601String(),

            'created_at' => optional($this->created_at)
                ?->toIso8601String(),

            'updated_at' => optional($this->updated_at)
                ?->toIso8601String(),
        ];
    }
}