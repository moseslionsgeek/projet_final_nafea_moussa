<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
    $products = Produit::all();
    $ayoub = "ayoub";
    $fourProduits = Produit::latest()->limit(4)->get();
    $eightrProduits = Produit::latest()->limit(8)->get();
    $lastproduit = Produit::latest()->limit(1)->get();
    return view('frontend.home',compact("ayoub",'products','fourProduits','eightrProduits','lastproduit'));
   }
   public function boite(){
      $contacts = Contact::all();
      return view('backend.boitemessagerie' , compact("contacts"));
  }
}
