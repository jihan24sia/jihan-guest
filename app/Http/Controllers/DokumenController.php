<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Persil;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $filterableColumns = ['jenis_dokumen'];
        $searchableColumns = ['nomor', 'keterangan'];

        $data = Dokumen::filter($request, $filterableColumns)
            ->with('persil', 'media')
            ->search($request, $searchableColumns)
            ->paginate(12);

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
            'media_files.*' => 'file|mimes:jpeg,png,jpg,gif,pdf|max:4096'
        ]);

        $dokumen = Dokumen::create($validated);

        // Upload multiple media
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $i => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/dokumen', $filename, 'public');

                Media::create([
                    'ref_table' => 'dokumen',
                    'ref_id' => $dokumen->dokumen_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()->route('dokumen.index')
            ->with('success', 'Data dokumen berhasil disimpan!');
    }

    public function edit($id)
    {
        $dokumen = Dokumen::with('media')->findOrFail($id);
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
            'media_files.*' => 'file|mimes:jpeg,png,jpg,gif,pdf|max:4096'
        ]);

        $dokumen = Dokumen::findOrFail($id);
        $dokumen->update($validated);

        // Upload new media
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $i => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads/dokumen', $filename, 'public');

                Media::create([
                    'ref_table' => 'dokumen',
                    'ref_id' => $dokumen->dokumen_id,
                    'file_name' => $filename,
                    'mime_type' => $file->getMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

        return redirect()->route('dokumen.index')
            ->with('success', 'Data dokumen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);

        // Hapus semua media terkait
        $medias = $dokumen->media;
        foreach ($medias as $media) {
            if (Storage::disk('public')->exists('uploads/dokumen/' . $media->file_name)) {
                Storage::disk('public')->delete('uploads/dokumen/' . $media->file_name);
            }
            $media->delete();
        }

        $dokumen->delete();

        return back()->with('success', 'Data dokumen berhasil dihapus!');
    }

    // Hapus media individual
    public function destroyMedia($media_id)
    {
        $media = Media::findOrFail($media_id);
        if (Storage::disk('public')->exists('uploads/dokumen/' . $media->file_name)) {
            Storage::disk('public')->delete('uploads/dokumen/' . $media->file_name);
        }
        $media->delete();

        return back()->with('success', 'Media berhasil dihapus!');
    }
}
