<?php

namespace App\Http\Controllers;

use App\Models\SengketaPersil;
use App\Models\Persil;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SengketaPersilController extends Controller
{
    public function index()
    {
        $data = SengketaPersil::with('persil', 'media')->paginate(12);
        return view('pages.persildata.sengketa.index', compact('data'));
    }

    public function create()
    {
        $persil = Persil::all();
        return view('pages.persildata.sengketa.create', compact('persil'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'pihak_1' => 'required|string',
            'pihak_2' => 'required|string',
            'kronologi' => 'required|string',
            'status' => 'required|string',
            'penyelesaian' => 'nullable|string',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
        ]);

        $sengketa = SengketaPersil::create($validated);

        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/sengketa', $filename);

                Media::create([
                    'ref_table' => 'sengketa_persil',
                    'ref_id' => $sengketa->sengketa_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                ]);
            }
        }

        return redirect()->route('sengketa.index')->with('success', 'Sengketa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sengketa = SengketaPersil::with('media')->findOrFail($id);
        $persil = Persil::all();
        return view('pages.persildata.sengketa.edit', compact('sengketa', 'persil'));
    }

    public function update(Request $request, $id)
    {
        $sengketa = SengketaPersil::findOrFail($id);


        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $i => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/sengketa', $filename, 'public');

                Media::create([
                    'ref_table' => 'sengketa_persil',
                    'ref_id' => $sengketa->sengketa_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }
        $validated = $request->validate([
            'persil_id' => 'required|exists:persil,persil_id',
            'pihak_1' => 'required|string',
            'pihak_2' => 'required|string',
            'kronologi' => 'required|string',
            'status' => 'required|string',
            'penyelesaian' => 'nullable|string',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
        ]);

        $sengketa->update($validated);


        return redirect()->route('sengketa.index')->with('success', 'Sengketa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $sengketa = SengketaPersil::findOrFail($id);
        // Hapus media
        foreach ($sengketa->media as $m) {
            Storage::delete('public/uploads/sengketa/' . $m->file_name);
            $m->delete();
        }
        $sengketa->delete();
        return back()->with('success', 'Sengketa berhasil dihapus!');
    }
}
