<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class showController extends Controller
{
    public function index(){
        return view('frontend.show');
    }
    public function showitem(Produit $produit){
        return view('frontend.show',compact('produit'));
    }
}
