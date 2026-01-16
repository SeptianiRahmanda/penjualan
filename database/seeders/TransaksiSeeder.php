<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            $produk = \App\Models\Produk::inRandomOrder()->first();

            if ($produk) {
                $jumlah = rand(1, 5);
                $total = $produk->harga * $jumlah;

                \App\Models\Transaksi::create([
                    'produk_id' => $produk->id,
                    'jumlah' => $jumlah,
                    'total' => $total,
                    'created_at' => now()->subDays(rand(0, 30)), // Random date within last 30 days
                ]);
            }
        }
    }
}
