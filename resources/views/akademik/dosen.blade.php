@extends('layout.main')
@section('title')
    Daftar Dosen
@endsection
@section('content')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .pagination-container .pagination {
            margin-bottom: 0;
        }

        .pagination-container .page-link {
            font-size: 0.875rem;
            padding: 0.25rem 0.5rem;
        }

        .pagination-container .page-item .page-link {
            border-radius: 0.2rem;
        }
    </style>
    <h1>Daftar Dosen jurusan ti</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Nik</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dsn as $dosen)
                <tr>
                    <td>{{ $dosen->id }}</td>
                    <td>{{ $dosen->nama }} </td>
                    <td>{{ $dosen->nik }} </td>
                    {{-- <td>{{ $dosen->alamat }} </td> --}}
                    <td>{{ $dosen->keahlian }} </td>

                </tr>
            @endforeach
    </table>
    <div class="pagination-container d-flex justify-content-center mt-4">
        {{ $dsn->links('pagination::bootstrap-5') }}
    </div>
@endsection
