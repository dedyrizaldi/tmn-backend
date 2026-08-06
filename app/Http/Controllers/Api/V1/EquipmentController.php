<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Equipment\EquipmentCollection;
use App\Http\Resources\Equipment\EquipmentResource;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of published equipment.
     */
    public function index(Request $request)
    {
        $query = Equipment::query()
            ->with([
                'category',
                'media',
            ])
            ->where('status', 'published')
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });

        /**
         * Search
         */
        if ($request->filled('search')) {
            $search = $request->string('search');

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        /**
         * Category Filter
         */
        if ($request->filled('category')) {
            $category = $request->string('category');

            $query->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        /**
         * Featured Filter
         */
        if ($request->filled('featured')) {
            $query->where(
                'featured',
                filter_var($request->featured, FILTER_VALIDATE_BOOLEAN)
            );
        }

        /**
         * Sorting
         */
         $sortBy = $request->get('sort_by', 'published_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        $query
            ->orderBy($sortBy, $sortDirection)
            ->orderByDesc('id');

        /**
         * Pagination
         */
        $perPage = $request->integer('per_page', 10);

        return new EquipmentCollection(
            $query->paginate($perPage)
                ->withQueryString()
        );
    }

    /**
     * Display the specified equipment.
     */
    public function show(string $slug)
    {
        $equipment = Equipment::query()
            ->with([
                'category',
                'media',
            ])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->firstOrFail();

        return new EquipmentResource($equipment);
    }
}