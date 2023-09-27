<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function index(){
        $categories= Categorie::all();
        $produits= Produit::all();
        $randomProduit = $produits->shuffle()->take(3);
        return view('backend.allproduit' , compact("categories" , "produits","randomProduit"));
    }

    public function destroyproduit(Produit $produit)
    {
        $produit->delete();
        return redirect()->back();
    }

    public function updateproduit(Request $request, Produit $produit)
    {

        request()->validate([
            "titre" => ["required"],
            "prix" => ["required"],
            "stock" => ["required"],
            "categorie" => ["required"],
        ]);

        $image = $request->file("image");


        if ($image) {
            Storage::disk("public")->delete('imgs/product/' . $produit->image);
            $image->storePublicly('imgs/product/', 'public');
            $data = [
                "titre" => $request->titre,
                "prix" => $request->prix,
                "stock" => $request->stock,
                "categorie" => $request->categorie,
                "createur" => 1,
                "image" => $image->hashName(),
            ];

            $produit->update($data);
            return redirect()->back()->with("success" , "le produit a été modifié avec succès");
        } else {
            $data = [
                "titre" => $request->titre,
                "prix" => $request->prix,
                "stock" => $request->stock,
                "categorie" => $request->categorie,
                "createur" => 1,
            ];


            $produit->update($data);
            return redirect()->back()->with("success" , "le produit a été modifié avec succès");
        }
    }
    public function storproduit(Request $request, Produit $produit)
    {
        
        request()->validate([
            "titre" => ["required"],
            "prix" => ["required"],
            "stock" => ["required"],
            "categorie" => ["required"],
        ]);

        $image = $request->file("image");


        $image->storePublicly('imgs/', 'public');



        $data = [
            "titre" => $request->titre,
            "prix" => $request->prix,
            "stock" => $request->stock,
            "categorie" => $request->categorie,
            "createur" => 1,
            "image" => $image->hashName(),
        ];

        
        $produit->create($data);       
        return redirect()->back();
    }
}
