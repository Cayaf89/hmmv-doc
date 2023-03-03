<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CivilizationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('civilizations')->delete();
        
        DB::table('civilizations')->insert(array (
            0 => 
            array (
                'name' => 'Académie',
            ),
            1 => 
            array (
                'name' => 'Bastion',
            ),
            2 => 
            array (
                'name' => 'Donjon',
            ),
            3 => 
            array (
                'name' => 'Forteresse',
            ),
            4 => 
            array (
                'name' => 'Havre',
            ),
            5 => 
            array (
                'name' => 'Inferno',
            ),
            6 => 
            array (
                'name' => 'Nécropole',
            ),
            7 => 
            array (
                'name' => 'Sylve',
            ),
        ));
        
        
    }
}
