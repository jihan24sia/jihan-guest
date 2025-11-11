<?php

namespace App\Http\Controllers;

use App\Models\Persil;
use App\Models\Warga;
use Illuminate\Http\Request;

class PersilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['persil'] = Persil::all();
        return view('pages.persil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['persil'] = Persil::all();
        $data['warga'] = Warga::all();
        return view('pages.persil.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'kode_persil' => 'required|unique:persil,kode_persil',
            'pemilik_warga_id' => 'required',
            'luas_m2' => 'required|numeric',
            'penggunaan' => 'required',
            'alamat_lahan' => 'required',
            'rt' => 'required',
            'rw' => 'required',

        ]);


        Persil::create($validated);
        return redirect()->route('persil.index')->with('success', 'Data persil berhasil disimpan!');
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
    public function edit($id)
    {
        $data['persil'] = Persil::findOrFail($id);
        $data['warga'] = Warga::all();
        return view('pages.persil.edit', $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $persil = Persil::findOrFail($id);

        $validated = $request->validate([
            'kode_persil' => 'required|unique:persil,kode_persil,' . $id . ',persil_id',
            'pemilik_warga_id' => 'required',
            'luas_m2' => 'required|numeric',
            'penggunaan' => 'required',
            'alamat_lahan' => 'required',
            'rt' => 'required',
            'rw' => 'required',

        ]);


        $persil->update($validated);
        return redirect()->route('persil.index')->with('success', 'Data persil berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Persil::findOrFail($id)->delete();
        return redirect()->route('persil.index')->with('success', 'Data persil dihapus!');
    }
}
