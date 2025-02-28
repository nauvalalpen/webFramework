<!DOCTYPE html>
<html>
<head>
    <title>Nilai List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Nilai</h2>
            <a href="{{ route('nilai.create') }}" class="btn btn-primary">Add New Nilai</a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tugas</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Nilai Akhir</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nilais as $nilai)
                        <tr>
                            <td>{{ $nilai->nama }}</td>
                            <td>{{ $nilai->tugas }}</td>
                            <td>{{ $nilai->uts }}</td>
                            <td>{{ $nilai->uas }}</td>
                            <td>{{ $nilai->nilai_akhir }}</td>
                            <td>{{ $nilai->grade }}</td>
                            <td>
                                <a href="{{ route('nilai.edit', $nilai) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('nilai.destroy', $nilai) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
