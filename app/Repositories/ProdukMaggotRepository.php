<?php

namespace App\Repositories;

use App\Models\ProdukMaggot;
use App\Repositories\BaseRepository;

/**
 * Class ProdukMaggotRepository
 * @package App\Repositories
 * @version October 13, 2023, 4:25 pm UTC
*/

class ProdukMaggotRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'harga'
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
        return ProdukMaggot::class;
    }
}
