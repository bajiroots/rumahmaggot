<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProdukMaggot
 * @package App\Models
 * @version October 13, 2023, 4:25 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $permintaanMaggots
 * @property string $nama
 * @property integer $harga
 */
class ProdukMaggot extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'produk_maggots';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'harga'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'harga' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required|string|max:255',
        'harga' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function permintaanMaggots()
    {
        return $this->hasMany(\App\Models\PermintaanMaggot::class, 'produk_id');
    }
}
