<?php

namespace App\Http\Controllers\dosen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen;

use Illuminate\Http\Request;

class DosenPNPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Use the Eloquent model with pagination instead of DB facade
        $dosens = Dosen::paginate(10);
        return view('dosens.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dosens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens',
            'nohp' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
        ]);
        
        Dosen::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'bidang_keahlian' => $request->bidang_keahlian,
        ]);
        
        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil ditambahkan');
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
        $dosen = Dosen::findOrFail($id);
        return view('dosens.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email,'.$id,
            'nohp' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
        ]);
        
        $dosen = Dosen::findOrFail($id);
        $dosen->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'bidang_keahlian' => $request->bidang_keahlian,
        ]);
        
        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil dihapus');
    }
}
