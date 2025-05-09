@extends('layout.main')

@section('content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <h2>Detail Pengguna</h2>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Nama</div>
                    <div class="col-md-9">{{ $pengguna->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Email</div>
                    <div class="col-md-9">{{ $pengguna->email }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Telepon</div>
                    <div class="col-md-9">{{ $pengguna->phone ?: '-' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Dibuat Pada</div>
                    <div class="col-md-9">{{ $pengguna->created_at->format('d M Y H:i') }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Diperbarui Pada</div>
                    <div class="col-md-9">{{ $pengguna->updated_at->format('d M Y H:i') }}</div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('penggunas.edit', $pengguna->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="{{ route('penggunas.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
