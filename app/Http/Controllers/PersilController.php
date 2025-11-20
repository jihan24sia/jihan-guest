<?php
namespace App\Http\Controllers;

use App\Models\Persil;
use App\Models\Warga;
use Illuminate\Http\Request;

class PersilController extends Controller
{
    // INDEX
    public function index()
    {
        $persil = Persil::all();
        return view('pages.persil.index', compact('persil'));
    }

    // CREATE FORM
    public function create()
    {
        $warga = Warga::all();
        return view('pages.persil.create', compact('warga'));
    }

    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_persil'      => 'required|unique:persil,kode_persil',
            'pemilik_warga_id' => 'required',
            'luas_m2'          => 'required|numeric',
            'penggunaan'       => 'required',
            'alamat_lahan'     => 'required',
            'rt'               => 'required',
            'rw'               => 'required',
        ]);
        Persil::create($validated);

        return redirect()->route('persil.index')
            ->with('success', 'Data persil berhasil disimpan!');
    }

    // EDIT FORM
    public function edit($id)
    {
        $persil = Persil::findOrFail($id);
        $warga  = Warga::all();
        return view('pages.persil.edit', compact('persil', 'warga'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $persil = Persil::findOrFail($id);

        $validated = $request->validate([
            'kode_persil'  => 'required|unique:persil,kode_persil,' . $id . ',persil_id',
            'luas_m2'      => 'required|numeric',
            'penggunaan'   => 'required',
            'alamat_lahan' => 'required',
            'rt'           => 'required',
            'rw'           => 'required',
        ]);

        $persil->update($validated);

        return redirect()->route('persil.index')
            ->with('success', 'Data persil berhasil diperbarui!');
    }

    // DELETE
    public function destroy($id)
    {
        Persil::findOrFail($id)->delete();

        return redirect()->route('persil.index')
            ->with('success', 'Data persil dihapus!');
    }
}
