<?php

namespace App\Http\Controllers;

use App\Models\PetaPersil;
use App\Models\Persil;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetaPersilController extends Controller
{
    public function index()
    {
        $peta = PetaPersil::with(['persil','media'])->paginate(12);
        return view('pages.persildata.peta.index', compact('peta'));
    }

    public function create()
    {
        $persil = Persil::all();
        return view('pages.persildata.peta.create', compact('persil'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'geojson' => 'nullable|string',
            'panjang_m' => 'nullable|numeric',
            'lebar_m' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
            'media_files.*' => 'nullable|image|max:2048',
        ]);

        $peta = PetaPersil::create($request->only('persil_id','geojson','panjang_m','lebar_m','keterangan'));

        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $i => $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('uploads/peta_persil', $filename, 'public');

                Media::create([
                    'ref_table' => 'peta_persil',
                    'ref_id' => $peta->peta_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()->route('persildata.peta.index')->with('success','Peta persil berhasil disimpan!');
    }

    public function edit($id)
    {
        $peta = PetaPersil::with('media')->findOrFail($id);
        $persil = Persil::all();
        return view('pages.persildata.peta.edit', compact('peta','persil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'geojson' => 'nullable|string',
            'panjang_m' => 'nullable|numeric',
            'lebar_m' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
            'media_files.*' => 'nullable|image|max:2048',
        ]);

        $peta = PetaPersil::findOrFail($id);
        $peta->update($request->only('persil_id','geojson','panjang_m','lebar_m','keterangan'));

        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $i => $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $file->storeAs('uploads/peta_persil', $filename, 'public');

                Media::create([
                    'ref_table' => 'peta_persil',
                    'ref_id' => $peta->peta_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()->route('persildata.peta.index')->with('success','Peta persil berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $peta = PetaPersil::findOrFail($id);

        Media::where('ref_table','peta_persil')->where('ref_id',$id)->delete();
        $peta->delete();

        return back()->with('success','Peta persil berhasil dihapus!');
    }
}
