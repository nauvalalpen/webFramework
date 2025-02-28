<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Nilai Akhir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Form Nilai Mahasiswa</h2>
    
    @if(session('hasil'))
        <div class="alert alert-success">
            <strong>Hasil Perhitungan:</strong> <br>
            Nama: {{ session('hasil')['nama'] }} <br>
            Nilai Akhir: {{ session('hasil')['nilai_akhir'] }} <br>
            Grade: <strong>{{ session('hasil')['grade'] }}</strong>
        </div>
    @endif

    <form action="{{ url('/hitung-nilai') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tugas" class="form-label">Nilai Tugas:</label>
            <input type="number" name="tugas" class="form-control" max="100" min="0" required>
        </div>

        <div class="mb-3">
            <label for="uts" class="form-label">Nilai UTS:</label>
            <input type="number" name="uts" class="form-control" max="100" min="0" required>
        </div>

        <div class="mb-3">
            <label for="uas" class="form-label">Nilai UAS:</label>
            <input type="number" name="uas" class="form-control" max="100" min="0" required>
        </div>

        <button type="submit" class="btn btn-primary">Hitung Nilai</button>
    </form>

    <table>
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
                <a href="{{ route('nilai.edit', $nilai) }}">Edit</a>
                <form action="{{ route('nilai.destroy', $nilai) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
