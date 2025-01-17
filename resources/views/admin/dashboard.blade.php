@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</h1>
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
@stop

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalReports }}</h3>
                    <p>Total Laporan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="{{ route('admin.reports.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $todayReports }}</h3>
                    <p>Laporan Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <a href="{{ route('admin.reports.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pendingReports }}</h3>
                    <p>Laporan Pending</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
                <a href="{{ route('admin.reports.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $completedReports }}</h3>
                    <p>Laporan Selesai</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <a href="{{ route('admin.reports.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Chart Laporan -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Statistik Laporan
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="reportsChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>

        <!-- Lokasi Terbanyak -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        Lokasi Terbanyak
                    </h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Lokasi</th>
                                    <th>Jumlah Laporan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topLocations as $location)
                                <tr>
                                    <td>{{ $location->lokasi }}</td>
                                    <td>{{ $location->total }}</td>
                                    <td>
                                        <span class="badge badge-{{ $location->status == 'selesai' ? 'success' : 'warning' }}">
                                            {{ ucfirst($location->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history mr-1"></i>
                        Aktivitas Terbaru
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        @forelse($recentReports as $report)
                            <div>
                                <i class="fas fa-file bg-info"></i>
                                <div class="timeline-item">
                                    <span class="time">
                                        <i class="fas fa-clock"></i> 
                                        {{ $report->created_at->diffForHumans() }}
                                    </span>
                                    <h3 class="timeline-header">
                                        <strong>{{ optional($report->user)->name ?? 'User tidak ditemukan' }}</strong>
                                        melaporkan masalah sampah
                                    </h3>
                                    <div class="timeline-body">
                                        <strong>Lokasi:</strong> {{ $report->lokasi }}<br>
                                        <strong>Deskripsi:</strong> {{ Str::limit($report->deskripsi, 100) }}
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="{{ route('admin.reports.edit', $report->id) }}" 
                                           class="btn btn-primary btn-sm">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="timeline-item">
                                <div class="timeline-body">
                                    Tidak ada aktivitas terbaru
                                </div>
                            </div>
                        @endforelse
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart data
        const ctx = document.getElementById('reportsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    label: 'Jumlah Laporan',
                    data: {!! json_encode($chartData) !!},
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@stop