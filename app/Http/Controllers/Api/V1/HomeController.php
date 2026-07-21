<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Equipment\EquipmentResource;
use App\Http\Resources\News\NewsResource;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Equipment;
use App\Models\News;
use App\Models\Project;

class HomeController extends Controller
{
    /**
     * Display homepage data.
     */
    public function index()
    {
        $featuredNews = News::with([
                'category',
                'media',
            ])
            ->published()
            ->featured()
            ->latest('published_at')
            ->take(3)
            ->get();

        $latestNews = News::with([
                'category',
                'media',
            ])
            ->published()
            ->latest('published_at')
            ->take(6)
            ->get();

        $featuredProjects = Project::with([
                'category',
                'media',
            ])
            ->published()
            ->featured()
            ->latest('published_at')
            ->take(6)
            ->get();

        $featuredEquipment = Equipment::with([
                'category',
                'media',
            ])
            ->published()
            ->featured()
            ->latest('published_at')
            ->take(6)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Home data retrieved successfully.',
            'data' => [
                'featured_news' => NewsResource::collection($featuredNews),
                'latest_news' => NewsResource::collection($latestNews),
                'featured_projects' => ProjectResource::collection($featuredProjects),
                'featured_equipment' => EquipmentResource::collection($featuredEquipment),
            ],
        ]);
    }
}