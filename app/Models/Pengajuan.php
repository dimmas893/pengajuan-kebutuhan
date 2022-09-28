<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    protected $fillable = [
        'tanggal',
        'user_id_pengajuan',
        'user_id_approval',
        'total_biaya',
    ];
}
