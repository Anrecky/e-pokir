<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AreaOfElection;

class AreaOfElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaOfElection::insert([
            ["id" => 1234, "name" => "Sungailiat"],
            ["id" => 2234, "name" => "Merawang - Mendo Barat"],
            ["id" => 3234, "name" => "Belinyu - Riau Silip"],
            ["id" => 4234, "name" => "Pemali - Bakam - Puding Besar"]
        ]);
    }
}
