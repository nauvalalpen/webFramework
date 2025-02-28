<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::all();
        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        return view('nilai.create');
    }

    public function store(Request $request)
    {
        $nilaiAkhir = ($request->tugas * 0.3) + ($request->uts * 0.3) + ($request->uas * 0.4);
        
        $grade = match(true) {
            $nilaiAkhir >= 80 => 'A',
            $nilaiAkhir >= 70 => 'B',
            $nilaiAkhir >= 60 => 'C',
            $nilaiAkhir >= 50 => 'D',
            default => 'E'
        };

        Nilai::create([
            'nama' => $request->nama,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'nilai_akhir' => $nilaiAkhir,
            'grade' => $grade
        ]);

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil disimpan');
    }

    public function edit(Nilai $nilai)
    {
        return view('nilai.edit', compact('nilai'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $nilaiAkhir = ($request->tugas * 0.3) + ($request->uts * 0.3) + ($request->uas * 0.4);
        
        $grade = match(true) {
            $nilaiAkhir >= 80 => 'A',
            $nilaiAkhir >= 70 => 'B',
            $nilaiAkhir >= 60 => 'C',
            $nilaiAkhir >= 50 => 'D',
            default => 'E'
        };

        $nilai->update([
            'nama' => $request->nama,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'nilai_akhir' => $nilaiAkhir,
            'grade' => $grade
        ]);

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diupdate');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus');
    }
}
