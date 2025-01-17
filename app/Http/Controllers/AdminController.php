<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    // Tambahkan method profile
    public function profile()
    {
        return view('admin.profile', [
            'user' => auth()->user()
        ]);
    }

    // Tambahkan method untuk update profile
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()
            ->route('admin.profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }
} 