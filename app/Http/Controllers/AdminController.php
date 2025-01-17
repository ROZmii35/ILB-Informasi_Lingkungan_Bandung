<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function dashboard()
    {
        // Data untuk chart
        $chartData = Report::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->limit(7)
            ->get()
            ->reverse();

        $chartLabels = $chartData->pluck('date')->map(function($date) {
            return Carbon::parse($date)->format('d M');
        });
        
        $chartValues = $chartData->pluck('total');

        // Lokasi dengan laporan terbanyak
        $topLocations = Report::selectRaw('lokasi, COUNT(*) as total, status')
            ->groupBy('lokasi', 'status')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->get();

        return view('admin.dashboard', [
            'totalReports' => Report::count(),
            'todayReports' => Report::whereDate('created_at', today())->count(),
            'pendingReports' => Report::where('status', 'pending')->count(),
            'completedReports' => Report::where('status', 'selesai')->count(),
            'recentReports' => Report::with('user')->latest()->take(5)->get(),
            'chartLabels' => $chartLabels,
            'chartData' => $chartValues,
            'topLocations' => $topLocations
        ]);
    }
} 