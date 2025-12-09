<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';

    protected $fillable = [
        'nama_event',
        'deskripsi_event',
        'kategori_event',
        'tanggal_event',
        'kuota_event',
        'status_event',
        'harga_event',
        'dibuat_oleh',
    ];

    public $timestamps = false; 
}
