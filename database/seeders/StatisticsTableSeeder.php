<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatisticsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     */
    public function run()
    {
        \DB::table('statistics')->delete();
        
        \DB::table('statistics')->insert(array (
            0 => 
            array (
                'name' => 'Attaque',
                'icon' => 'statistics/March2023/dzGBG1pjAbcqGoPlSNN9.png',
            ),
            1 => 
            array (
                'name' => 'Défense',
                'icon' => 'statistics/March2023/bjmdvc9mr68YhsmjGYaY.png',
            ),
            2 => 
            array (
                'name' => 'Puissance Magique',
                'icon' => 'statistics/March2023/HQxtnY6h62wGA6JkKl4P.png',
            ),
            3 => 
            array (
                'name' => 'Esprit',
                'icon' => 'statistics/March2023/qKp7nJlJqUWbwb3UJGyM.png',
            ),
            4 => 
            array (
                'name' => 'Dommages',
                'icon' => 'statistics/March2023/qcDdwjP7kvmxW8K9sEdc.png',
            ),
            5 => 
            array (
                'name' => 'Points de vie',
                'icon' => 'statistics/March2023/DVVRXsg4KDVlP3kmHty6.png',
            ),
            6 => 
            array (
                'name' => 'Vitesse',
                'icon' => 'statistics/March2023/Ymt6CxFHco4rfzg9xBbg.png',
            ),
            7 => 
            array (
                'name' => 'Initiative',
                'icon' => 'statistics/March2023/1oN4dzQaBK3C40E9GDTX.png',
            ),
            8 => 
            array (
                'name' => 'Chance',
                'icon' => 'statistics/March2023/dMZHN5IfYNsNmzmhHWre.png',
            ),
            9 => 
            array (
                'name' => 'Moral',
                'icon' => 'statistics/March2023/9Vgsh465duWZh3j4sM9K.png',
            ),
            10 => 
            array (
                'name' => 'Tirs',
                'icon' => 'statistics/March2023/ty8BS6O4uQNW6SwgqXjj.png',
            ),
            11 => 
            array (
                'name' => 'Portée',
                'icon' => 'statistics/March2023/9ha1TChzVZMn0lcxssIn.png',
            ),
            12 => 
            array (
                'name' => 'Mana',
                'icon' => 'statistics/March2023/fktctMutS7SSj3UUr4jK.png',
            ),
            13 => 
            array (
                'name' => 'Croissance',
                'icon' => 'statistics/March2023/gr6RjkxX9vqzK2NUosHX.png',
            ),
        ));
        
        
    }
}
