<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PemesananMobil extends Model
{
    protected $connection = 'second_db';
    protected $table = 'pesanan_mobil';
    protected $primaryKey = 'id';
	public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'jenis_mobil',
        'tanggal_pesan'
    ];
}
