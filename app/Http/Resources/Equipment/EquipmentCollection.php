<?php

namespace App\Http\Resources\Equipment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EquipmentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,

            'message' => 'Equipment retrieved successfully.',

            'data' => $this->collection->map(function ($equipment) {
                return [
                    'id' => $equipment->id,

                    'title' => $equipment->title,

                    'slug' => $equipment->slug,

                    'excerpt' => $equipment->excerpt,

                    'thumbnail' => $equipment->getFirstMediaUrl('thumbnail'),

                    'category' => [
                        'id' => $equipment->category?->id,
                        'name' => $equipment->category?->name,
                        'slug' => $equipment->category?->slug,
                    ],

                    'featured' => (bool) $equipment->featured,

                    'published_at' => optional($equipment->published_at)
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