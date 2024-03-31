<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;
    protected $table = 'table_disposisi';

    protected $fillable = [
        'surat_id',
        'catatan',
    ];

    // Define relationship with SuratMasuk model
    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'surat_id');
    }
}
