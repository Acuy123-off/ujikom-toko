<?php

namespace Database\Seeders;

use App\Models\kategori;
use App\Models\prduk;
use App\Models\produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
        'name'=>'syam',
        'email'=>'udin@gmail.com',
        'password'=>bcrypt('123'),
        'role'=>'admin'
        ]);

        User::create([
        'name'=>'syama',
        'email'=>'udina@gmail.com',
        'password'=>bcrypt('123'),
        'role'=>'customer'
        ]);

        kategori::create([
        'name'=>'makan'
        ]);

        kategori::create([
        'name'=>'minum'
        ]);

        produk::create([
        'kategori_id'=>'2',
        'name'=>'pop ice',
        'harga'=>2000,
        'desk'=>'',
        'foto'=>'foto/popice.jpg',
        'qty'=>120
        ]);

        produk::create([
        'kategori_id'=>'1',
        'name'=>'Batagor',
        'harga'=>5000,
        'desk'=>'',
        'foto'=>'foto/batagor.jpg',
        'qty'=>100
        ]);
    }
}
