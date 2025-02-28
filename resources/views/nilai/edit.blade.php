<!DOCTYPE html>
<html>
<head>
    <title>Edit Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Nilai</h2>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('nilai.update', $nilai) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $nilai->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai Tugas</label>
                        <input type="number" class="form-control" name="tugas" value="{{ $nilai->tugas }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai UTS</label>
                        <input type="number" class="form-control" name="uts" value="{{ $nilai->uts }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai UAS</label>
                        <input type="number" class="form-control" name="uas" value="{{ $nilai->uas }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
