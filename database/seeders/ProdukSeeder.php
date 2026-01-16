<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Makanan (id: 1)
            ['nama_produk' => 'Nasi Goreng', 'kategori_id' => 1, 'harga' => 15000, 'stok' => 50],
            ['nama_produk' => 'Mie Goreng', 'kategori_id' => 1, 'harga' => 12000, 'stok' => 45],
            ['nama_produk' => 'Ayam Bakar', 'kategori_id' => 1, 'harga' => 20000, 'stok' => 30],

            // Minuman (id: 2)
            ['nama_produk' => 'Es Teh Manis', 'kategori_id' => 2, 'harga' => 5000, 'stok' => 100],
            ['nama_produk' => 'Es Jeruk', 'kategori_id' => 2, 'harga' => 7000, 'stok' => 80],
            ['nama_produk' => 'Kopi Hitam', 'kategori_id' => 2, 'harga' => 8000, 'stok' => 60],

            // Snack (id: 3)
            ['nama_produk' => 'Keripik Singkong', 'kategori_id' => 3, 'harga' => 10000, 'stok' => 40],
            ['nama_produk' => 'Roti Bakar', 'kategori_id' => 3, 'harga' => 12000, 'stok' => 25],

            // Sembako (id: 4)
            ['nama_produk' => 'Beras 5kg', 'kategori_id' => 4, 'harga' => 65000, 'stok' => 20],
            ['nama_produk' => 'Minyak Goreng 1L', 'kategori_id' => 4, 'harga' => 16000, 'stok' => 35],
            ['nama_produk' => 'Gula Pasir 1kg', 'kategori_id' => 4, 'harga' => 14000, 'stok' => 30],

            // Alat Tulis (id: 5)
            ['nama_produk' => 'Buku Tulis', 'kategori_id' => 5, 'harga' => 5000, 'stok' => 100],
            ['nama_produk' => 'Pulpen', 'kategori_id' => 5, 'harga' => 3000, 'stok' => 150],
            ['nama_produk' => 'Pensil', 'kategori_id' => 5, 'harga' => 2000, 'stok' => 120],
            ['nama_produk' => 'Penghapus', 'kategori_id' => 5, 'harga' => 1500, 'stok' => 80],
        ];

        foreach ($products as $product) {
            \App\Models\Produk::create($product);
        }
    }
}
