<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $newsCount = News::count();
        $galleryCount = Gallery::count();
        $publishedNews = News::published()->count();
        $publishedGallery = Gallery::published()->count();

        // Order statistics
        $totalOrders = \App\Models\Order::count();
        $pendingOrders = \App\Models\Order::where('status', 'pending')->count();
        $completedOrders = \App\Models\Order::where('status', 'completed')->count();
        $totalRevenue = \App\Models\Order::where('status', 'completed')->sum('total_amount');

        return view('admin.dashboard', compact(
            'newsCount',
            'galleryCount',
            'publishedNews',
            'publishedGallery',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'totalRevenue'
        ));
    }
}
