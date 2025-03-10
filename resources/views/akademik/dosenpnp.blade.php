@extends('layout.main')
@section('title', 'Daftar Dosen Jurusan TI')

@section('content')
    <h1>Daftar Dosen Jurusan TI</h1>
    <ol>
        @forelse ($dns as $namadosen)
            <li>
                {{ $namadosen }}
            </li>
        @empty
            <div class="alert alert-warning d-inline-block">
                Data Dosen tidak ada. Silahkan isis array data dosen
            </div>
        @endforelse
    </ol>
@endsection
