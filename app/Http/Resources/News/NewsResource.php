<?php

namespace App\Http\Resources\News;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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

            'author' => $this->author,

            'excerpt' => $this->excerpt,

            'content' => $this->content,

            'thumbnail' => $this->getFirstMediaUrl('thumbnail'),

            'gallery' => $this->getMedia('gallery')
                ->map(fn ($media) => [
                    'id' => $media->id,
                    'name' => $media->name,
                    'url' => $media->getUrl(),
                ])
                ->values(),

            'category' => $this->category ? [
                'id' => $this->category->id,
                'name' => $this->category->name,
                'slug' => $this->category->slug,
            ] : null,

            'featured' => (bool) $this->featured,

            'status' => $this->status,

            'sort_order' => $this->sort_order,

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