<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KapasitasRuang;
class KapasitasRuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KapasitasRuang::create(['limit'=>200]);
    }
}
