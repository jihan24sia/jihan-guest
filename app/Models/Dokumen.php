<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Dokumen extends Model
{
    protected $primaryKey = 'dokumen_id';
    protected $table = 'dokumen';
    protected $fillable = [
        'persil_id',
        'jenis_dokumen',
        'nomor',
        'keterangan'
    ];

    public function persil()
    {
        return $this->belongsTo(Persil::class, 'persil_id');
    }
}
