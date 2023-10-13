<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanMaggot extends Model
{
    use HasFactory;

    public $fillable = [
        'jumlah_permintaan',
        'tanggal_permintaan',
        'tanggal_akhir_permintaan',
        'user_id',
        'status',
        'lokasi_pengantaran',
        'produk_id',
        'harga',
    ];

    function User(){
        return $this->belongsTo(User::class);
    }

    function Produk(){
        return $this->belongsTo(ProdukMaggot::class);
    }

    public function detailPermintaanMaggots()
    {
        return $this->hasMany(DetailPermintaanMaggot::class, 'permintaan_maggots_id');
    }

}
