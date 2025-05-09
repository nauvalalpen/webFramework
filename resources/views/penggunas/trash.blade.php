@extends('layout.main')

@section('content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <h2>Daftar Pengguna Terhapus</h2>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row mb-3">
            <div class="col">
                <a class="btn btn-secondary" href="{{ route('penggunas.index') }}">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Pengguna
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
                                <th>Dihapus Pada</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trashedPenggunas as $index => $user)
                                <tr>
                                    <td class="text-center">{{ $trashedPenggunas->firstItem() + $index }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->deleted_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('penggunas.restore', $user->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="bi bi-arrow-counterclockwise"></i> Pulihkan
                                                </button>
                                            </form>
                                            <form action="{{ route('penggunas.force-delete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin hapus permanen? Data tidak dapat dikembalikan!')">
                                                    <i class="bi bi-trash"></i> Hapus Permanen
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-3">Tidak ada data pengguna terhapus</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-3">
            {{ $trashedPenggunas->links() }}
        </div>
    </div>
@endsection
