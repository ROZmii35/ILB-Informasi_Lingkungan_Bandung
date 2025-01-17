<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['store']);
    }

    public function index()
    {
        $reports = Report::latest()->paginate(10);
        return view('reports.index', compact('reports'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('reports', 'public');
            $validated['gambar'] = $path;
        }

        $validated['user_id'] = auth()->id();
        Report::create($validated);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        
        $validated = $request->validate([
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($report->gambar) {
                Storage::disk('public')->delete($report->gambar);
            }
            $path = $request->file('gambar')->store('reports', 'public');
            $validated['gambar'] = $path;
        }

        $report->update($validated);

        return redirect()->route('admin.reports.index')->with('success', 'Laporan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        
        if ($report->gambar) {
            Storage::disk('public')->delete($report->gambar);
        }
        
        $report->delete();

        return redirect()->route('admin.reports.index')->with('success', 'Laporan berhasil dihapus!');
    }
}
