<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\dataBarang>
 */
class DataBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sku' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
            'nama_barang' => fake()->word(),
            'images' => fake()->imageUrl(640, 480, 'animals', true),
            'stock_bagus' => fake()->numberBetween(0, 100),
            'stock_rusak' => fake()->numberBetween(0, 20),
            'qty_keluar' => fake()->numberBetween(0, 50),
            'harga_barang' => fake()->numberBetween(10000, 70000),
        ];
    }
}
