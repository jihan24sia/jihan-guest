<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SengketaPersil extends Model
{
    use HasFactory;

    protected $primaryKey = 'sengketa_id';
    protected $table = 'sengketa_persil';
    protected $fillable = [
        'persil_id',
        'pihak_1',
        'pihak_2',
        'kronologi',
        'status',
        'penyelesaian',
    ];

    public function persil()
    {
        return $this->belongsTo(Persil::class, 'persil_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')->where('ref_table', 'sengketa_persil');
    }
}
