<?php

namespace Database\Factories;

use App\Models\DetailPermintaanMaggot;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailPermintaanMaggotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailPermintaanMaggot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tanggal_pengiriman' => $this->faker->word,
        'jumlah_pengiriman' => $this->faker->word,
        'status_pengiriman' => $this->faker->word,
        'status_pembayaran' => $this->faker->word,
        'user_id' => $this->faker->word,
        'permintaan_maggots_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
