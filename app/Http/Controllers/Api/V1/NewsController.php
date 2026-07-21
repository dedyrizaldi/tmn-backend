<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\News\NewsCollection;
use App\Http\Resources\News\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of published news.
     */
    public function index(Request $request)
    {
        $query = News::query()
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
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
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
         * Sort
         */
        $sortBy = $request->get('sort_by', 'published_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        $query->orderBy($sortBy, $sortDirection);

        /**
         * Pagination
         */
        $perPage = $request->integer('per_page', 9);

        return new NewsCollection(
            $query->paginate($perPage)
                ->withQueryString()
        );
    }

    /**
     * Display the specified news.
     */
    public function show(string $slug)
    {
        $news = News::query()
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

        return new NewsResource($news);
    }
}