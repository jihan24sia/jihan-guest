<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    // MediaController.php
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        Storage::disk('public')->delete('uploads/peta_persil/' . $media->file_name);
        $media->delete();

        return back()->with('success', 'Media berhasil dihapus');
    }
}
