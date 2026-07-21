<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,

            'message' => 'Projects retrieved successfully.',

            'data' => $this->collection->map(function ($project) {
                return [
                    'id' => $project->id,

                    'title' => $project->title,

                    'slug' => $project->slug,

                    'client' => $project->client,

                    'location' => $project->location,

                    'project_date' => optional($project->project_date)
                        ?->toDateString(),

                    'excerpt' => $project->excerpt,

                    'thumbnail' => $project->getFirstMediaUrl('thumbnail'),

                    'category' => [
                        'id' => $project->category?->id,
                        'name' => $project->category?->name,
                        'slug' => $project->category?->slug,
                    ],

                    'featured' => (bool) $project->featured,

                    'published_at' => optional($project->published_at)
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