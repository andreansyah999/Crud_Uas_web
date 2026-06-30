<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemainOlahraga extends Model
{
    protected $table = 'pemain_olahragas';
    protected $primaryKey = 'id_event';
    protected $fillable = ['gambar', 'nama_event', 'tanggal', 'tempat', 'penanggung_jawab'];
}