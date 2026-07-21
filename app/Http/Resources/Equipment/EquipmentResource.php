<?php

namespace App\Http\Resources\Equipment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentResource extends JsonResource
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

            'excerpt' => $this->excerpt,

            'description' => $this->description,

            'thumbnail' => $this->getFirstMediaUrl('thumbnail'),

            'gallery' => $this->getMedia('gallery')
                ->map(fn ($media) => [
                    'id' => $media->id,
                    'name' => $media->name,
                    'url' => $media->getUrl(),
                ])
                ->values(),

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