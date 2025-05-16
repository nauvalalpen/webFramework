@extends('layout.main')

@section('content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <h2>Daftar Penggunas</h2>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mb-3">
            <div class="col d-flex gap-2">
                <a class="btn btn-primary" href="{{ route('penggunas.create') }}">
                    <i class="bi bi-plus-circle"></i> Tambah Pengguna
                </a>
                <a class="btn btn-outline-secondary" href="{{ route('penggunas.trash') }}">
                    <i class="bi bi-trash"></i> Lihat Data Terhapus
                </a>

            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Foto</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penggunas as $index => $user)
                                <tr>
                                    <td class="text-center">{{ $penggunas->firstItem() + $index }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->file_upload)
                                            <img src="{{ asset('storage/' . $user->file_upload) }}"alt="{{ $user->name }}"
                                                width="100">
                                        @else
                                            <span style="color: grey">(Tidak ada Foto)</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('penggunas.show', $user->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Lihat
                                            </a>
                                            <a href="{{ route('penggunas.edit', $user->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('penggunas.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin hapus?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-3">Tidak ada data pengguna</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-3">
            {{ $penggunas->links() }}
        </div>
    </div>

    @if (session('success') || session('error'))
        <script>
            // Auto-dismiss alerts after 5 seconds
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    var alerts = document.querySelectorAll('.alert');
                    alerts.forEach(function(alert) {
                        var bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    });
                }, 5000);
            });
        </script>
    @endif
@endsection
