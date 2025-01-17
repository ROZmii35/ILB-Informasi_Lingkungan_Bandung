@extends('admin.layouts.app')

@section('title', 'Edit Laporan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.reports.index') }}">Laporan Sampah</a></li>
    <li class="breadcrumb-item active">Edit Laporan</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Laporan #{{ $report->id }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" 
                       class="form-control @error('lokasi') is-invalid @enderror" 
                       id="lokasi" 
                       name="lokasi" 
                       value="{{ old('lokasi', $report->lokasi) }}" 
                       required>
                @error('lokasi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                          id="deskripsi" 
                          name="deskripsi" 
                          rows="4" 
                          required>{{ old('deskripsi', $report->deskripsi) }}</textarea>
                @error('deskripsi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="gambar">Gambar</label>
                @if($report->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $report->gambar) }}" 
                             alt="Current Image" 
                             class="img-thumbnail"
                             style="max-width: 200px;">
                    </div>
                @endif
                <input type="file" 
                       class="form-control-file @error('gambar') is-invalid @enderror" 
                       id="gambar" 
                       name="gambar">
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                @error('gambar')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection 