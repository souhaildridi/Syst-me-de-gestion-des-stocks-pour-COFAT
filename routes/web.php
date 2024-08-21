<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\transactionController;

Route::resource('/product', ProductController::class); 
Route::get('/appl', [ProductController::class, 'appl'])->name('appl'); 

Route::get('landingpage', [CustomAuthController::class, 'landingpage']); 
Route::get('loginuser', [CustomAuthController::class, 'index'])->name('loginuser');
Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin'); 
Route::get('signup', [CustomAuthController::class, 'signup'])->name('register-user');
Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::post('/update-quantity', [ProductController::class, 'updateQuantity'])->name('updateQuantity');
Route::get('/transfere-product', [ProductController::class, 'transfereproduct'])->name('transfereproduct');
Route::post('processTransaction', [ProductController::class, 'processTransactionn'])->name('processTransaction');
Route::get('/transfer-form/{id}', [ProductController::class, 'showTransferForm'])->name('transfer-form');

Route::get('loginadmin', [adminController::class, 'index'])->name('loginadmin');
Route::post('postloginadmin', [adminController::class, 'loginadmin'])->name('postloginadmin'); 
Route::get('signout', [adminController::class, 'signOut'])->name('signout');
Route::get('signupadmin', [adminController::class, 'signup'])->name('register-admin');
Route::post('postsignup', [adminController::class, 'signupsave'])->name('postsignup'); 
Route::get('indexDash', [adminController::class, 'indexDash'])->name('indexDash');


Route::get('listeAdmin', [adminController::class, 'listeAdmin'])->name('listeAdmin');
Route::get('ajouterAdmin', [adminController::class, 'ajouterAdmin'])->name('ajouterAdmin');
Route::delete('/admin/{id}/delete', [adminController::class, 'destroy'])->name('admin.destroy');
Route::get('editAdmin/{id}', [adminController::class, 'edit'])->name('editAdmin');
Route::put('admin/{id}', [adminController::class, 'update'])->name('admin.update');
Route::get('dashboardadmin', [adminController::class, 'dashboardadmin'])->name('dashboardadmin');


Route::get('listeProduit', [ProductController::class, 'listeProduit'])->name('listeProduit');
Route::get('ajouterProduit', [ProductController::class, 'ajouterProduit'])->name('ajouterProduit');
Route::delete('/produit/{id}/delete', [ProductController::class, 'destroy'])->name('produit.destroy');
Route::post('postsignupproduit', [ProductController::class, 'signupsave'])->name('postsignupproduit'); 
Route::get('editProduit/{id}', [ProductController::class, 'edit'])->name('editProduit');
Route::put('Product/{id}', [ProductController::class, 'update'])->name('Product.update');

Route::get('listeUser', [CustomAuthController::class, 'listeUser'])->name('listeUser');
Route::delete('/user/{id}/delete', [CustomAuthController::class, 'destroy'])->name('user.destroy');
Route::post('postsignupuser', [CustomAuthController::class, 'signupsave'])->name('postsignupuser'); 
Route::get('ajouterUser', [CustomAuthController::class, 'ajouterUser'])->name('ajouterUser');
Route::get('editUser/{id}', [CustomAuthController::class, 'edit'])->name('editUser');
Route::put('user/{id}', [CustomAuthController::class, 'update'])->name('user.update');

require __DIR__.'/auth.php';

Route::get('/generate-pdf/{id}', [transactionController::class, 'generatePDF'])->name('generate-pdf');;










