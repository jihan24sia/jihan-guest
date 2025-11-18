<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Persil;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $data = Dokumen::with('persil')->get();
        return view('pages.dokumen.index', compact('data'));
    }

    public function create()
    {
        $persil = Persil::all();
        return view('pages.dokumen.create', compact('persil'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'jenis_dokumen' => 'required|string',
            'nomor' => 'required|unique:dokumen,nomor',
            'keterangan' => 'nullable|string',
        ]);

        Dokumen::create($validated);

        return redirect()->route('dokumen.index')
            ->with('success', 'Data dokumen berhasil disimpan!');
    }

    public function edit($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $persil = Persil::all();
        return view('pages.dokumen.edit', compact('dokumen', 'persil'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'jenis_dokumen' => 'required|string',
            'nomor' => "required|unique:dokumen,nomor,$id,dokumen_id",
            'keterangan' => 'nullable|string',
        ]);

        Dokumen::findOrFail($id)->update($validated);

        return redirect()->route('dokumen.index')
            ->with('success', 'Data dokumen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Dokumen::destroy($id);
        return back()->with('success', 'Data dokumen berhasil dihapus!');
    }
}
