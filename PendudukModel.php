<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendudukModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'penduduk';
    public $timestamps = false;
    protected $fillable = [
        'nik',
        'no_kk',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'pendidikan',
        'alamat_jalan',
        'alamat_rt',
        'alamat_rw',
        'alamat_desa',
        'alamat_kecamatan',
        'alamat_kabupaten',
        'alamat_provinsi',
        'kodepos'
    ];
}
