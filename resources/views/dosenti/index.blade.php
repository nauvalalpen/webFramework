@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar Dosen TI</h4>
                        <a href="{{ route('dosenti.create') }}" class="btn btn-primary">Tambah Dosen</a>
                    </div>

                    <div class="card-body">
                        @if (session('Success'))
                            <div class="alert alert-success">
                                {{ session('Success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Bidang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dosens as $index => $dosen)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $dosen->nama }}</td>
                                            <td>{{ $dosen->nik }}</td>
                                            <td>{{ $dosen->email }}</td>
                                            <td>{{ $dosen->nohp }}</td>
                                            <td>{{ $dosen->bidang }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('dosenti.edit', $dosen->id) }}"
                                                        class="btn btn-sm btn-warning me-2">Edit</a>
                                                    <form action="{{ route('dosenti.destroy', $dosen->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data dosen</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Add pagination links here -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $dosens->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
