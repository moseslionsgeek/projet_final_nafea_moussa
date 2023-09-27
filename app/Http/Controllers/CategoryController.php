<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category= Categorie::all();
        $produits= Produit::all();
        return view("frontend.shop", compact('category', 'produits'));
    }
}
