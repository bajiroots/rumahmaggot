<?php

namespace App\Repositories;

use App\Models\DetailPermintaanMaggot;
use App\Repositories\BaseRepository;

/**
 * Class DetailPermintaanMaggotRepository
 * @package App\Repositories
 * @version October 13, 2023, 5:16 pm UTC
*/

class DetailPermintaanMaggotRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal_pengiriman',
        'jumlah_pengiriman',
        'status_pengiriman',
        'status_pembayaran',
        'user_id',
        'permintaan_maggots_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetailPermintaanMaggot::class;
    }
}
