<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    
    public function insertSql(){
        $query=DB::insert('insert into mahasiswas(nama, nim, email, nohp, jurusan, prodi, created_at, updated_at, tgllahir, alamat) values ("Nauval Alpen Perdana", "2311083024", "nauval@gmail.com", "083199823782", "Teknologi Informasi", "TRPL",now(), now(), "2004-09-20", "Jl. Hijrah Tanah Sirah")');

        return "Berhasil insert data";
    }

    public function insertPrepared(){
        $query=DB::insert('insert into mahasiswas(nama, nim, email, nohp, jurusan, prodi, created_at, updated_at, tgllahir, alamat) values (?,?,?,?,?,?,?,?,?,?)', ["Sarah Sabrina", "2311083026", "sarah@gmail.com", "083199823782", "Teknologi Informasi", "TRPL",now(), now(), "2004-09-20", "Jl. Hijrah Tanah Sirah"]);

        return "berhasil insert data mahasiswa";
    }

    public function insertBinding(){
        $query = DB::insert('insert into mahasiswas(nama, nim, email, nohp, jurusan, prodi, created_at, updated_at, tgllahir, alamat) values (:nama, :nim, :email, :nohp, :jurusan, :prodi, :created_at, :updated_at, :tgllahir, :alamat)', [
            'nama' => 'Raya Riskiana Sakti',
            'nim' => '2311083029',
            'email' => 'raya@gmail.com',
            'nohp' => '083199823782',
            'jurusan' => 'Teknologi Informasi',
            'prodi' => 'TRPL',
            'created_at' => now(),
            'updated_at' => now(),
            'tgllahir' => '2004-09-20',
            'alamat' => 'Jl. Hijrah Tanah Sirah'
        ]);
        
        return "Berhasil insert data";
    }

    public function update(){
    $query = DB::update('update mahasiswas set jurusan = "Teknik Informatika" where id = 1');

    return "Berhasil update data";
    }

    public function delete(){
        $query = DB::delete('delete from mahasiswas where id = 4');

        return "Berhasil delete data";
    }

    public function select(){
        $query = DB::select('select * from mahasiswas');
        dd($query);
    }
    
    public function selectTampil(){
        $query = DB::select('SELECT * FROM mahasiswas');
        echo ($query[1]->id) . "<br>";
        echo ($query[1]->nama) . "<br>";
        echo ($query[1]->nim) . "<br>";
        echo ($query[1]->email) . "<br>";
        echo ($query[1]->nohp) . "<br>";
        echo ($query[1]->jurusan) . "<br>";
        echo ($query[1]->prodi) . "<br>";
        echo ($query[1]->created_at) . "<br>";
        echo ($query[1]->updated_at) . "<br>";
        echo ($query[1]->tgllahir) . "<br>";
        echo ($query[1]->alamat) . "<br>";
    }

    public function selectView(){
        $query = DB::select('SELECT * FROM mahasiswas');
        return view('akademik.mahasiswapnp', ["mhs" => $query]);
    }

    public function selectWhere(){
        $query = DB::select('select * from mahasiswas where id = 1');
        return view("akademik.mahasiswapnp", ["mhs" => $query]);
    }

    public function statement(){
        $query=DB::delete('TRUNCATE mahasiswas');
        return  "Berhasil menghapus data";
    }
    
    
    
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        DB::Listen(function ($query) {
            Logger("Query : ". $query->sql . "| binding " . implode(',', $query->bindings));
        });

        //mengambil semua data mahasiswa
        $data = Mahasiswa::all();
        // dd($data);

        dump($data);
        return view('mahasiswa.index', compact('data'));

        $mhs = Mahasiswa::all();
        return view('akademik.mahasiswa', compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}