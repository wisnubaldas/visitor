<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alaram;
class AlaramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Alaram;
        $a->status = 0;
        $a->save();
    }
}
