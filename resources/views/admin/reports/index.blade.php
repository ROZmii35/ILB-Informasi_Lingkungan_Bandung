@extends('adminlte::page')

@section('title', 'Kelola Laporan')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Kelola Laporan</h1>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sukses!</h5>
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Laporan Sampah</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="reports-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pelapor</th>
                            <th>Lokasi</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                            <tr>
                                <td>{{ $report->id }}</td>
                                <td>{{ optional($report->user)->name ?? 'User tidak ditemukan' }}</td>
                                <td>{{ $report->lokasi }}</td>
                                <td>{{ Str::limit($report->deskripsi, 100) }}</td>
                                <td class="text-center">
                                    @if($report->gambar)
                                        <img src="{{ Storage::disk('public')->exists($report->gambar) ? 
                                            asset('storage/' . $report->gambar) : 
                                            asset('images/no-image.png') }}" 
                                            alt="Gambar Laporan" 
                                            class="img-thumbnail"
                                            style="max-width: 100px;">
                                    @else
                                        <span class="badge badge-secondary">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $report->status == 'selesai' ? 'success' : 'warning' }}">
                                        {{ ucfirst($report->status) }}
                                    </span>
                                </td>
                                <td>{{ $report->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.reports.edit', $report->id) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if($report->status !== 'selesai')
                                            <form action="{{ route('admin.reports.update-status', $report->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-success"
                                                        title="Selesai"
                                                        onclick="return confirm('Apakah Anda yakin ingin menandai laporan ini sebagai selesai?')">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.reports.destroy', $report->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    title="Hapus"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada laporan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($reports->hasPages())
                <div class="mt-4">
                    {{ $reports->links() }}
                </div>
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#reports-table').DataTable({
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
                }
            });
        });
    </script>
@stop

