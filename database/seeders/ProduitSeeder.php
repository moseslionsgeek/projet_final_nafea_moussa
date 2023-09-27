<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produit::insert([
            [
                'titre'=>'chair 1',
                'prix'=>20,
                'image'=>'image1.jpg',
                'createur'=>1,
                'stock'=>3,
                'categorie'=>'Chaise en wood',
            ],
            [
                'titre'=>'chair 2',
                'prix'=>90,
                'image'=>'image2.jpg',
                'createur'=>1,
                'stock'=>30,
                'categorie'=>'Chaise en wood',
            ],
            [
                'titre'=>'chair 3',
                'prix'=>120,
                'image'=>'image3.jpg',
                'createur'=>1,
                'stock'=>20,
                'categorie'=>'Chaise en wood',
            ],
            [
                'titre'=>'chair 4',
                'prix'=>170,
                'image'=>'image4.jpg',
                'createur'=>1,
                'stock'=>2,
                'categorie'=>'Chaise en wood',
            ],
            [
                'titre'=>'chair 5',
                'prix'=>70,
                'image'=>'image5.jpg',
                'createur'=>1,
                'stock'=>9,
                'categorie'=>'Chaise en wood',
            ],
            [
                'titre'=>'chair 6',
                'prix'=>60,
                'image'=>'image6.jpg',
                'createur'=>1,
                'stock'=>4,
                'categorie'=>'Chaise en wood',
            ],
            [
                'titre'=>'chair 7',
                'prix'=>10,
                'image'=>'image7.jpg',
                'createur'=>1,
                'stock'=>1,
                'categorie'=>'Chaise en wood',
            ],
            [
                'titre'=>'chair 8',
                'prix'=>90,
                'image'=>'image8.jpg',
                'createur'=>1,
                'stock'=>30,
                'categorie'=>'Chaise en plastic',
            ],
          
        ]);
     

    }
}
