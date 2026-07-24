<?php

namespace App\Http\Resources\News;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsCategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
     public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'message' => 'News categories retrieved successfully.',
            'data'    => NewsCategoryResource::collection($this->collection),
        ];
    }
}