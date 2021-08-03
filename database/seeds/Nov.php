<?php

use Illuminate\Database\Seeder;
use App\Novedad;

class Nov extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $novedad =  new Novedad();
        $novedad->novedad = "Si";
        $novedad->save();

        $novedad =  new Novedad();
        $novedad->novedad = "No";
        $novedad->save();
    }
}
