<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HeroesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('heroes')->delete();
        
        \DB::table('heroes')->insert(array (
            0 => 
            array (
                'name' => 'Faiz',
                'aka' => 'Tourmenteur',
                'biographie' => '<p>Faiz est connu dans les Cit&eacute;s d\'Argent pour son visage d&eacute;figur&eacute; qu\'il dissimule habituellement derri&egrave;re un foulard. Ses cicatrices sont le r&eacute;sultat d\'une rencontre avec des Orcs du d&eacute;sert. Ce mage autrefois enjou&eacute; est depuis habit&eacute; par des pens&eacute;es destructrices et morbides. Poss&eacute;dant une grande ma&icirc;trise des arcanes, Faiz est capable d\'infliger de lourds d&eacute;g&acirc;ts magiques &agrave; ses ennemis.</p>',
            ),
        ));
        
        
    }
}
