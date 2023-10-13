<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DetailPermintaanMaggot
 * @package App\Models
 * @version October 13, 2023, 5:16 pm UTC
 *
 * @property \App\Models\PermintaanMaggot $permintaanMaggots
 * @property \App\Models\User $user
 * @property string $tanggal_pengiriman
 * @property string $jumlah_pengiriman
 * @property string $status_pengiriman
 * @property string $status_pembayaran
 * @property integer $user_id
 * @property integer $permintaan_maggots_id
 */
class DetailPermintaanMaggot extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'detail_permintaan_maggots';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        // 'tanggal_pengiriman',
        'jumlah_pengiriman',
        'status_pengiriman',
        'status_pembayaran',
        'user_id',
        'permintaan_maggots_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        // 'tanggal_pengiriman' => 'date',
        'jumlah_pengiriman' => 'integer',
        'status_pengiriman' => 'string',
        'status_pembayaran' => 'string',
        'user_id' => 'integer',
        'permintaan_maggots_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'tanggal_pengiriman' => 'required',
        'jumlah_pengiriman' => 'required',
        'status_pengiriman' => 'required|string',
        'status_pembayaran' => 'required|string',
        'user_id' => 'required',
        'permintaan_maggots_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function permintaanMaggots()
    {
        return $this->belongsTo(\App\Models\PermintaanMaggot::class, 'permintaan_maggots_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
