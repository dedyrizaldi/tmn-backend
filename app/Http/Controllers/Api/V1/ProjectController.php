<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Project\ProjectCollection;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\ProjectCategory\ProjectCategoryResource;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of project categories.
     */
    public function categories()
    {
        $categories = ProjectCategory::query()
            ->where('status', 'published')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return ProjectCategoryResource::collection($categories);
    }

    /**
     * Display a listing of published projects.
     */
    public function index(Request $request)
    {
        $query = Project::query()
            ->published()
            ->with([
                'category',
                'media',
            ]);

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        |
        | Search berdasarkan:
        | - Nama kapal
        | - Nama perusahaan
        | - Lokasi
        | - Lingkup kerja / category
        |
        */

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where(
                    'title',
                    'like',
                    "%{$search}%"
                )
                    ->orWhere(
                        'client',
                        'like',
                        "%{$search}%"
                    )
                    ->orWhere(
                        'location',
                        'like',
                        "%{$search}%"
                    )
                    ->orWhereHas(
                        'category',
                        function ($categoryQuery) use ($search) {
                            $categoryQuery->where(
                                'name',
                                'like',
                                "%{$search}%"
                            );
                        }
                    );
            });
        }

        /*
        |--------------------------------------------------------------------------
        | CATEGORY FILTER
        |--------------------------------------------------------------------------
        */

        if ($category = $request->get('category')) {
            $query->whereHas(
                'category',
                function ($q) use ($category) {
                    $q->where('slug', $category);
                }
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FEATURED FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->has('featured')) {
            $query->where(
                'featured',
                filter_var(
                    $request->get('featured'),
                    FILTER_VALIDATE_BOOLEAN
                )
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SORTING
        |--------------------------------------------------------------------------
        */

        $query
            ->orderBy('sort_order')
            ->orderByDesc('project_date');

        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        $perPage = min(
            (int) $request->get('per_page', 12),
            50
        );

        $projects = $query->paginate($perPage);

        return new ProjectCollection($projects);
    }

    /**
     * Display the specified project.
     */
    public function show(string $slug)
    {
        $project = Project::query()
            ->published()
            ->with([
                'category',
                'media',
            ])
            ->where('slug', $slug)
            ->firstOrFail();

        return new ProjectResource($project);
    }
}