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
            /*
            |--------------------------------------------------------------------------
            | IDENTITAS PROJECT
            |--------------------------------------------------------------------------
            */

            'id' => $this->id,

            'title' => $this->title,

            'slug' => $this->slug,

            /*
            |--------------------------------------------------------------------------
            | PERUSAHAAN
            |--------------------------------------------------------------------------
            */

            'client' => $this->client,

            'client_logo' => $this->getFirstMediaUrl(
                'client_logo'
            ) ?: null,

            'location' => $this->location,

            /*
            |--------------------------------------------------------------------------
            | TANGGAL / TAHUN PEKERJAAN
            |--------------------------------------------------------------------------
            */

            'project_date' => optional($this->project_date)
                ?->toDateString(),

            /*
            |--------------------------------------------------------------------------
            | THUMBNAIL
            |--------------------------------------------------------------------------
            */

            'thumbnail' => $this->getFirstMediaUrl(
                'thumbnail'
            ) ?: null,

            /*
            |--------------------------------------------------------------------------
            | FOTO PEKERJAAN
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
            | SURAT PENGALAMAN
            |--------------------------------------------------------------------------
            */

            'experience_letter' => $this->getFirstMediaUrl(
                'experience_letter'
            ) ?: null,

            /*
            |--------------------------------------------------------------------------
            | LINGKUP KERJA
            |--------------------------------------------------------------------------
            |
            | Lingkup kerja berasal dari Project Category.
            |
            */

            'category' => [
                'id' => $this->category?->id,
                'name' => $this->category?->name,
                'slug' => $this->category?->slug,
            ],

            /*
            |--------------------------------------------------------------------------
            | STATUS PROJECT
            |--------------------------------------------------------------------------
            */

            'featured' => (bool) $this->featured,

            'status' => $this->status,

            /*
            |--------------------------------------------------------------------------
            | SEO
            |--------------------------------------------------------------------------
            */

            'meta_title' => $this->meta_title,

            'meta_description' => $this->meta_description,

            /*
            |--------------------------------------------------------------------------
            | PUBLISHING
            |--------------------------------------------------------------------------
            */

            'published_at' => optional($this->published_at)
                ?->toIso8601String(),

            /*
            |--------------------------------------------------------------------------
            | TIMESTAMPS
            |--------------------------------------------------------------------------
            */

            'created_at' => optional($this->created_at)
                ?->toIso8601String(),

            'updated_at' => optional($this->updated_at)
                ?->toIso8601String(),
        ];
    }
}