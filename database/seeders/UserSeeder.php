<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => "Iskandar, S.IP",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/iskandar.png",
                "area_of_election_id" => 2234,
                "fraction_id" => 1000
            ],
            [
                'name' => "Mendra Kurniawan, A.Md",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/mendra.png",
                "area_of_election_id" => 1234,
                "fraction_id" => 2000
            ],
            [
                'name' => "Rendra Basri, B.Sc",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/rendra.png",
                "area_of_election_id" => 1234,
                "fraction_id" => 3000
            ],
            [
                'name' => "Drs. H. Usnen, M.Si",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/usnen.png",
                "area_of_election_id" => 1234,
                "fraction_id" => 1000
            ],
            [
                'name' => "Erigustian,SH",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/eri_gustian.png",
                "area_of_election_id" => 1234,
                "fraction_id" => 1000
            ],
            [
                'name' => "Firdaus Djohan",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/firdaus_johan.png",
                "area_of_election_id" => 1234,
                "fraction_id" => 4000
            ],
            [
                'name' => "dr. Zarril Khifarri",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/dr_zarril_khifarri.png",
                "area_of_election_id" => 1234,
                "fraction_id" => 7000
            ],
            [
                'name' => "Darsani,SH",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/darsani.png",
                "area_of_election_id" => 1234,
                "fraction_id" => 8000
            ],
            [
                'name' => "Denny Hasbi,SE",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/denny_hasbi.png",
                "area_of_election_id" => 1234,
                "fraction_id" => 6000
            ],
            [
                'name' => "Apt Magrizan, S.Si",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/magrizan.png",
                "area_of_election_id" => 1234,
                "fraction_id" => 7000
            ],
            [
                'name' => "KMS. H. Herman Susilo",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/herman_susilo.png",
                "area_of_election_id" => 1234,
                "fraction_id" => 5000
            ],
            [
                'name' => "M. Taufik Koriyanto, SH, MH",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/taufik_korianto.png",
                "area_of_election_id" => 2234,
                "fraction_id" => 2000
            ],
            [
                'name' => "Novian Arywijaya",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/novian_arywijaya.png",
                "area_of_election_id" => 2234,
                "fraction_id" => 2000
            ],
            [
                'name' => "Imelda,S.AP",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/imelda.png",
                "area_of_election_id" => 2234,
                "fraction_id" => 3000
            ],
            [
                'name' => "Surya Erni, SE",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/surya_erni.png",
                "area_of_election_id" => 2234,
                "fraction_id" => 4000
            ],
            [
                'name' => "Dodi Sadri, ST",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/dodi_sadri.png",
                "area_of_election_id" => 2234,
                "fraction_id" => 6000
            ],
            [
                'name' => "H. Hendra Yunus, SE",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/hendra_yunus.png",
                "area_of_election_id" => 2234,
                "fraction_id" => 5000
            ],
            [
                'name' => "Siti Fatimah, A.Md, Keb",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/siti_fatimah.png",
                "area_of_election_id" => 2234,
                "fraction_id" => 8000
            ],
            [
                'name' => "Muhammad Ali",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/m_ali.png",
                "area_of_election_id" => 2234,
                "fraction_id" => 3000
            ],
            [
                'name' => "Romlan,SH",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/romlan.png",
                "area_of_election_id" => 3234,
                "fraction_id" => 3000
            ],
            [
                'name' => "Massuri, ST",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/massuri.png",
                "area_of_election_id" => 3234,
                "fraction_id" => 2000
            ],
            [
                'name' => "Acit Karvina, S.IP",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/acit_karvina.png",
                "area_of_election_id" => 3234,
                "fraction_id" => 1000
            ],
            [
                'name' => "Rudy Budiono, S.IP",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/rudy_budiono.png",
                "area_of_election_id" => 3234,
                "fraction_id" => 1000
            ],
            [
                'name' => "Junaedi Surya",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/junaidi_surya.png",
                "area_of_election_id" => 3234,
                "fraction_id" => 4000
            ],
            [
                'name' => "H.Suhandi",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/suhandi.png",
                "area_of_election_id" => 3234,
                "fraction_id" => 4000
            ],
            [
                'name' => "Ruslina",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/ruslina.png",
                "area_of_election_id" => 3234,
                "fraction_id" => 5000
            ],
            [
                'name' => "Ramadian",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/ramadian.png",
                "area_of_election_id" => 3234,
                "fraction_id" => 8000
            ],
            [
                'name' => "Sarudin",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/sarudin.png",
                "area_of_election_id" => 4234,
                "fraction_id" => 2000
            ],
            [
                'name' => "Jumadi",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/jumadi.png",
                "area_of_election_id" => 4234,
                "fraction_id" => 1000
            ],
            [
                'name' => "Ismail Yuhaidir, S.Fil.I",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/ismail.png",
                "area_of_election_id" => 4234,
                "fraction_id" => 1000
            ],
            [
                'name' => "Ruswanto, A.Md. P.jk",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/ruswanto.png",
                "area_of_election_id" => 4234,
                "fraction_id" => 3000
            ],
            [
                'name' => "Marianto, S.Sos",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/marianto.png",
                "area_of_election_id" => 4234,
                "fraction_id" => 7000
            ],
            [
                'name' => "Drs. Hairul",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/drs_khairul.png",
                "area_of_election_id" => 4234,
                "fraction_id" => 6000
            ],
            [
                'name' => "Zulkarnain",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/zulkar_nain.png",
                "area_of_election_id" => 4234,
                "fraction_id" => 7000
            ],
            [
                'name' => "Meidian",
                "email" => fake()->unique()->email(),
                "password" => Hash::make('#suksesResesBangka22'),
                "photo" => "storage/foto-dewan/meidian.png",
                "area_of_election_id" => 4234,
                "fraction_id" => 5000
            ],
        ]);
    }
}
