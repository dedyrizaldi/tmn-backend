<?php

namespace App\Http\Resources\News;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,

            'message' => 'News retrieved successfully.',

            'data' => $this->collection->map(function ($news) {
                return [
                    'id' => $news->id,

                    'title' => $news->title,

                    'slug' => $news->slug,

                    'author' => $news->author,

                    'excerpt' => $news->excerpt,

                    'thumbnail' => $news->getFirstMediaUrl('thumbnail'),

                    'category' => [
                        'id' => $news->category?->id,
                        'name' => $news->category?->name,
                        'slug' => $news->category?->slug,
                    ],

                    'featured' => (bool) $news->featured,

                    'published_at' => optional($news->published_at)
                        ?->toIso8601String(),
                ];
            })->values(),
        ];
    }

    /**
     * Add pagination metadata.
     */
    public function with(Request $request): array
    {
        return [
            'meta' => [
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'per_page' => $this->perPage(),
                'total' => $this->total(),
                'from' => $this->firstItem(),
                'to' => $this->lastItem(),
            ],
        ];
    }
}