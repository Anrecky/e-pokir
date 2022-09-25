<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\SubDistrict;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            ["id" => 1, 'name' => "Bakam"],
            ["id" => 2, 'name' => "Belinyu"],
            ["id" => 3, 'name' => "Mendo Barat"],
            ["id" => 4, 'name' => "Merawang"],
            ["id" => 5, 'name' => "Pemali"],
            ["id" => 6, 'name' => "Puding Besar"],
            ["id" => 7, 'name' => "Riau Silip"],
            ["id" => 8, 'name' => "Sungailiat"]
        ];
        District::insert($districts);

        $subDistricts = [
            ['name' => 'Bakam', 'district_id' => 1],
            ['name' => 'Bukit Layang', 'district_id' => 1],
            ['name' => 'Dalil', 'district_id' => 1],
            ['name' => 'Kapuk', 'district_id' => 1],
            ['name' => 'Mabat', 'district_id' => 1],
            ['name' => 'Mangka', 'district_id' => 1],
            ['name' => 'Maras Senang', 'district_id' => 1],
            ['name' => 'Neknang', 'district_id' => 1],
            ['name' => 'Tiang Tarah', 'district_id' => 1],

            ['name' => 'Bintet', 'district_id' => 2],
            ['name' => 'Gunung Muda', 'district_id' => 2],
            ['name' => 'Gunung Pelawan', 'district_id' => 2],
            ['name' => 'Lumut', 'district_id' => 2],
            ['name' => 'Riding Panjang', 'district_id' => 2],
            ['name' => 'Air Asam', 'district_id' => 2],
            ['name' => 'Air Jungkung', 'district_id' => 2],
            ['name' => 'Belinyu', 'district_id' => 2],
            ['name' => 'Bukit Ketok', 'district_id' => 2],
            ['name' => 'Kuto Panji', 'district_id' => 2],
            ['name' => 'Mantul', 'district_id' => 2],
            ['name' => 'Remodong Indah', 'district_id' => 2],

            ['name' => 'Air Buluh', 'district_id' => 3],
            ['name' => 'Air Duren', 'district_id' => 3],
            ['name' => 'Cengkong Abang', 'district_id' => 3],
            ['name' => 'Kace', 'district_id' => 3],
            ['name' => 'Kace Timur', 'district_id' => 3],
            ['name' => 'Kemuja', 'district_id' => 3],
            ['name' => 'Kota Kapur', 'district_id' => 3],
            ['name' => 'Labuh Air Pandan', 'district_id' => 3],
            ['name' => 'Mendo', 'district_id' => 3],
            ['name' => 'Paya Benua', 'district_id' => 3],
            ['name' => 'Penagan', 'district_id' => 3],
            ['name' => 'Petaling', 'district_id' => 3],
            ['name' => 'Petaling Banjar', 'district_id' => 3],
            ['name' => 'Rukam', 'district_id' => 3],
            ['name' => 'Zed', 'district_id' => 3],

            ['name' => 'Air Anyir', 'district_id' => 4],
            ['name' => 'Balunijuk', 'district_id' => 4],
            ['name' => 'Batu Rusa', 'district_id' => 4],
            ['name' => 'Dwi Makmur', 'district_id' => 4],
            ['name' => 'Jada Bahrin', 'district_id' => 4],
            ['name' => 'Jurung', 'district_id' => 4],
            ['name' => 'Kimak', 'district_id' => 4],
            ['name' => 'Merawang', 'district_id' => 4],
            ['name' => 'Pagarawan', 'district_id' => 4],
            ['name' => 'Riding Panjang', 'district_id' => 4],

            ['name' => 'Air Duren', 'district_id' => 5],
            ['name' => 'Air Ruai', 'district_id' => 5],
            ['name' => 'Karya Makmur', 'district_id' => 5],
            ['name' => 'Pemali', 'district_id' => 5],
            ['name' => 'Penyamun', 'district_id' => 5],
            ['name' => 'Sempan', 'district_id' => 5],

            ['name' => 'Kayu Besi', 'district_id' => 6],
            ['name' => 'Kota Waringin', 'district_id' => 6],
            ['name' => 'Labu', 'district_id' => 6],
            ['name' => 'Nibung', 'district_id' => 6],
            ['name' => 'Puding Besar', 'district_id' => 6],
            ['name' => 'Saing', 'district_id' => 6],
            ['name' => 'Tanah Bawah', 'district_id' => 6],

            ['name' => 'Banyu Asin', 'district_id' => 7],
            ['name' => 'Berbura', 'district_id' => 7],
            ['name' => 'Cit', 'district_id' => 7],
            ['name' => 'Deniang', 'district_id' => 7],
            ['name' => 'Mapur', 'district_id' => 7],
            ['name' => 'Pangkal Niur', 'district_id' => 7],
            ['name' => 'Pugul', 'district_id' => 7],
            ['name' => 'Riau', 'district_id' => 7],
            ['name' => 'Silip', 'district_id' => 7],

            ['name' => 'Rebo', 'district_id' => 8],
            ['name' => 'Bukit Betung', 'district_id' => 8],
            ['name' => 'Jelitik', 'district_id' => 8],
            ['name' => 'Kenanga', 'district_id' => 8],
            ['name' => 'Kudai', 'district_id' => 8],
            ['name' => 'Lubuk Kelik', 'district_id' => 8],
            ['name' => 'Matras', 'district_id' => 8],
            ['name' => 'Parit Padang', 'district_id' => 8],
            ['name' => 'Sinar Baru', 'district_id' => 8],
            ['name' => 'Sinar Jaya Jelutung', 'district_id' => 8],
            ['name' => 'Sri Menanti', 'district_id' => 8],
            ['name' => 'Sungailiat', 'district_id' => 8],
            ['name' => 'Surya Timur', 'district_id' => 8]


        ];
        SubDistrict::insert($subDistricts);
    }
}
