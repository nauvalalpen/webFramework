<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggunas = Pengguna::latest()->paginate(5);
        return view('penggunas.index', compact('penggunas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penggunas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenggunaRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        
        Pengguna::create($data);
        
        return redirect()->route('penggunas.index')
            ->with('success', 'Pengguna berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('penggunas.show', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('penggunas.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenggunaRequest $request, string $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $data = $request->validated();
        
        // Only update password if provided
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        
        $pengguna->update($data);
        
        return redirect()->route('penggunas.index')
            ->with('success', 'Pengguna berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();
        
        return redirect()->route('penggunas.index')
            ->with('success', 'Pengguna berhasil dihapus');
    }
    
    /**
     * Display a listing of trashed resources.
     */
/**
 * Display a listing of trashed resources.
 */
/**
 * Display a listing of trashed resources.
 */
public function trash()
{
    $trashedPenggunas = Pengguna::onlyTrashed()->latest()->paginate(5);
    return view('penggunas.trash', compact('trashedPenggunas'));
}


    
    /**
     * Restore the specified resource from trash.
     */
    public function restore(string $id)
    {
        $pengguna = Pengguna::onlyTrashed()->findOrFail($id);
        $pengguna->restore();
        
        return redirect()->route('penggunas.trash')
            ->with('success', 'Pengguna berhasil dipulihkan');
    }
    
    /**
     * Permanently delete the specified resource from storage.
     */
    public function forceDelete(string $id)
    {
        $pengguna = Pengguna::onlyTrashed()->findOrFail($id);
        $pengguna->forceDelete();
        
        return redirect()->route('penggunas.trash')
            ->with('success', 'Pengguna berhasil dihapus permanen');
    }
}
