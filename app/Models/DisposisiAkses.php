<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposisiAkses extends Model
{
    use HasFactory;

    protected $table = 'disposisiakses';

    protected $fillable = [
        'id_disposisi',
        'level',
    ];

    // Define relationship with Disposisi model
    public function disposisi()
    {
        return $this->belongsTo(Disposisi::class, 'id_disposisi');
    }
}
