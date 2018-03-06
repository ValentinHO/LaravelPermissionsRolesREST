<?php

use Illuminate\Database\Seeder;
use App\Site;

class SitiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Site::create([
        	'site'=>'Aurrera',
        	'lat'=>'19.8458771',
        	'lng'=>'-98.9747411']);

        Site::create([
        	'site'=>'Soriana',
        	'lat'=>'19.8320181',
        	'lng'=>'-98.9792445']);

        Site::create([
        	'site'=>"Domino's",
        	'lat'=>'19.8296867',
        	'lng'=>'-98.9780402']);

        Site::create([
        	'site'=>'Comisión de agua',
        	'lat'=>'19.8491404',
        	'lng'=>'-98.9765087']);

        Site::create([
        	'site'=>'Villa escalante',
        	'lat'=>'19.84799',
        	'lng'=>'-98.9776191']);
    }
}
