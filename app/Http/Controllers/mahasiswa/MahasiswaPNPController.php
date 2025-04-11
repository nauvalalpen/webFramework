<?php

namespace App\Http\Controllers\mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaPNPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fixed variable name from $dosens to $mahasiswas
        $mahasiswas = DB::table('mahasiswas')->get();
        return view('mahasiswas/index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas',
            'nohp' => 'nullable|string|max:255',
            'jurusan' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'tgllahir' => 'nullable|date',
            'alamat' => 'required|string|max:255',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
            'created_at' => now(),
            'updated_at' => now(),
            'tgllahir' => $request->tgllahir,
            'alamat' => $request->alamat,
        ]);
        
        return redirect()->route('mahasiswas.index')->with('Success', 'Data Mahasiswa berhasil ditambahkan');
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
        // Fixed variable name from $dosen to $mahasiswa
        $mahasiswa = DB::table('mahasiswas')->where('id', $id)->first();
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email,'.$id,
            'nohp' => 'nullable|string|max:255',
            'jurusan' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'tgllahir' => 'nullable|date',
            'alamat' => 'required|string|max:255',
        ]);
        
        DB::table('mahasiswas')->where('id', $id)->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
            'updated_at' => now(),
            'tgllahir' => $request->tgllahir,
            'alamat' => $request->alamat,
        ]);
        
        return redirect()->route('mahasiswas.index')->with('Success', 'Data Mahasiswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('mahasiswas')->where('id', $id)->delete();
        return redirect()->route('mahasiswas.index')->with('Success', 'Data Mahasiswa berhasil dihapus');
    }
}
