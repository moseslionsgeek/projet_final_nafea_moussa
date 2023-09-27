<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProduitWCntoller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleeController;
use App\Http\Controllers\showController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', function () {
//     return view('frontend.home');
// })->name('frontend.home');

Route::get('/shop',[CategoryController::class, "index"])->name("shop.index");

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/messagerie' , [HomeController::class , "boite"])->name("messagerie.boite");



Route::get('/panier', function () {
    return view('frontend.panier');
});

Route::get('/coeur', function () {
    return view('frontend.coeur');
});
// ! home controller 
Route::get("/", [HomeController::class, "index"])->name('home.index');

// ? show produit
Route::get("/show/{produit}", [showController::class, "showitem"])->name('show.produit');

//---
Route::post('/sendmail', [ContactController::class, 'store'])->name('mail.contact');
Route::get('/allproduitWM', function () {
    return view('backend.allproduitWM');
})->middleware(['auth', 'role:webmaster'])->name('backend.allproduitWM');

// mailnewslettre
Route::post('/newlettre', [mailController::class, 'sendMail'])->name('contact.newlettre');



Route::middleware('auth' , 'role:webmaster' )->group(function () {    
    // webmaster Produit
    Route::get("/allproduitWM", [ProduitWCntoller::class, "index"])->name('backend.allproduitWM');
    Route::delete("/backend/produit/{produit}/webmaster", [ProduitWCntoller::class, "destroyproduit"])->name('backendW.destroyproduit');
    Route::put("/backend/produit/{produit}/webmaster", [ProduitWCntoller::class, "updateproduit"])->name('backendW.updateproduit');

    Route::post("/backend/produit/store/webmaster", [ProduitWCntoller::class, "storproduit"])->name('backendW.storproduit');


});

Route::middleware('auth' , 'role:admin' )->group(function () {    
    // admin User
    Route::get("/alluser", [RoleeController::class, "index"])->name('backend.alluser');

    Route::delete("/backend/{user}", [RoleeController::class, "destroyuser"])->name('backend.destroyuser');
    Route::put("/backend/{user}", [RoleeController::class, "updateuser"])->name('backend.updateuser');   
    
    // admin produit
    Route::get("/allproduit", [ProduitController::class, "index"])->name('backend.allproduit');

    Route::delete("/backend/produit/{produit}", [ProduitController::class, "destroyproduit"])->name('backend.destroyproduit');
    Route::put("/backend/produit/{produit}", [ProduitController::class, "updateproduit"])->name('backend.updateproduit');   
    Route::post("/backend/produit/store", [ProduitController::class, "storproduit"])->name('backend.storproduit');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
