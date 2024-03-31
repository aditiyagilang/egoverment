<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'table_surat_masuk';
    protected $fillable = [
        'id_surat',
        'nama',
        'perihal',
        'asalsurat',
        'file',
        'tanggal_surat',
        'user_id',
    ];

    /**
     * Get the user that owns the surat masuk.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
