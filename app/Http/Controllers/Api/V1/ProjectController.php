<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Project\ProjectCollection;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

public function index(Request $request)
{
    $query = Project::query()
        ->with(['category', 'media']);

    dd([
        'total' => $query->count(),
        'first' => $query->first(),
    ]);
}
    /**
     * Display a listing of published projects.
     */
    // public function index(Request $request)
    // {

    
    //     $query = Project::query()
    //         ->with([
    //             'category',
    //             'media',
    //         ])
    //         ->where('status', 'published')
    //         ->where(function ($query) {
    //             $query->whereNull('published_at')
    //                 ->orWhere('published_at', '<=', now());
    //         });

    //     /**
    //      * Search
    //      */
    //     if ($request->filled('search')) {
    //         $search = $request->string('search');

    //         $query->where(function ($q) use ($search) {
    //             $q->where('title', 'like', "%{$search}%")
    //                 ->orWhere('excerpt', 'like', "%{$search}%")
    //                 ->orWhere('client', 'like', "%{$search}%")
    //                 ->orWhere('location', 'like', "%{$search}%");
    //         });
    //     }

    //     /**
    //      * Category Filter
    //      */
    //     if ($request->filled('category')) {
    //         $category = $request->string('category');

    //         $query->whereHas('category', function ($q) use ($category) {
    //             $q->where('slug', $category);
    //         });
    //     }

    //     /**
    //      * Featured Filter
    //      */
    //     if ($request->filled('featured')) {
    //         $query->where(
    //             'featured',
    //             filter_var($request->featured, FILTER_VALIDATE_BOOLEAN)
    //         );
    //     }

    //     /**
    //      * Sorting
    //      */
    //     $sortBy = $request->get('sort_by', 'published_at');
    //     $sortDirection = $request->get('sort_direction', 'desc');

    //     $query->orderBy($sortBy, $sortDirection);

    //     /**
    //      * Pagination
    //      */
    //     $perPage = $request->integer('per_page', 10);

    //     return new ProjectCollection(
    //         $query->paginate($perPage)
    //             ->withQueryString()
    //     );
    // }

    /**
     * Display the specified project.
     */
    public function show(string $slug)
    {
        $project = Project::query()
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

        return new ProjectResource($project);
    }
}