<?php

namespace App\Http\Resources\ProjectCategory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'message' => 'Project categories retrieved successfully.',
            'data'    => ProjectCategoryResource::collection($this->collection),
        ];
    }
}