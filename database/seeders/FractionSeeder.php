<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fraction;

class FractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fraction::insert([
            [
                'id' => 1000,
                'name' => 'PDI Perjuangan'
            ],
            [
                'id' => 2000,
                'name' => 'Gerindra'
            ],
            [
                'id' => 3000,
                'name' => 'Golkar'
            ],
            [
                'id' => 4000,
                'name' => 'Nasdem'
            ],
            [
                'id' => 5000,
                'name' => 'Demokrat'
            ],
            [
                'id' => 6000,
                'name' => 'PPP'
            ],
            [
                'id' => 7000,
                'name' => 'PKS PAN HANURA'
            ],
            [
                'id' => 8000,
                'name' => 'Bangka Bangkit Bersatu'
            ],
        ]);
    }
}
