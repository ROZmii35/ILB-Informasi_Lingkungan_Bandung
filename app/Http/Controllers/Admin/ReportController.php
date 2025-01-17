<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('user')
                        ->latest()
                        ->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'status' => 'required|in:pending,selesai'
        ]);

        if ($request->hasFile('gambar')) {
            if ($report->gambar) {
                Storage::disk('public')->delete($report->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('reports', 'public');
        }

        $report->update($validated);
        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'Laporan berhasil diperbarui!');
    }

    public function updateStatus(Report $report)
    {
        $report->update(['status' => 'selesai']);
        return redirect()
            ->route('admin.reports.index')
            ->with('success', 'Status laporan berhasil diperbarui!');
    }

    public function destroy(Report $report)
    {
        try {
            if ($report->gambar) {
                Storage::disk('public')->delete($report->gambar);
            }
            $report->delete();
            return redirect()
                ->route('admin.reports.index')
                ->with('success', 'Laporan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.reports.index')
                ->with('error', 'Gagal menghapus laporan!');
        }
    }
} 