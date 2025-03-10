@extends('layout.main')
@section('title', 'Data Prodi')

@section('content')
    <h1>Nama Jurusan : {{ $data[0] }}, Prodi : {{ $data[1] }}</h1>
    {{-- <ol>
        @forelse ($data as $item)
            <li>
                {{ $item }}
            </li>
        @empty
            <div class="alert alert-warning d-inline-block">
                Data Prodi tidak ada. Silahkan isi array data Prodi
            </div>
        @endforelse
    </ol> --}}


    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card h-100">
                <img src="/images/logoti.png" class="card-img-top" alt="Logo TI">
                <div class="card-body">
                    <h5 class="card-title">Prodi Manajemen Informatika</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nihil voluptate vero
                        harum soluta reiciendis </p>
                    <a href="#" class="btn btn-primary">more</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <img src="/images/logoti.png" class="card-img-top" alt="Logo TI">
                <div class="card-body">
                    <h5 class="card-title">Prodi Teknik Komputer</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nihil voluptate vero
                        harum soluta reiciendis </p>
                    <a href="#" class="btn btn-primary">more</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <img src="/images/logoti.png" class="card-img-top" alt="Logo TI">
                <div class="card-body">
                    <h5 class="card-title">Prodi Teknologi Rekayasa Perangkat Lunak</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi nihil voluptate vero
                        harum soluta reiciendis </p>
                    <a href="#" class="btn btn-primary">more</a>
                </div>
            </div>
        </div>
    </div>
@endsection
