<!DOCTYPE html>
<html>
<head>
    <title>Create Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Add New Nilai</h2>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('nilai.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai Tugas</label>
                        <input type="number" class="form-control" name="tugas" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai UTS</label>
                        <input type="number" class="form-control" name="uts" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai UAS</label>
                        <input type="number" class="form-control" name="uas" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
