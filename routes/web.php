<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripePaymentController;
// Route::get('Confirm_order', function () {
//     return view('Home.index');
// });
route::get('/', [HomeController::class,'home']);
Route::get('/dashboard', [HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth','admin']);
route::get('view_province', [AdminController::class,'view_Province'])->middleware(['auth','admin']);
route::get('frm_province', [AdminController::class,'frm_province'])->middleware(['auth','admin']);
route::post('add_Province', [AdminController::class,'add_Province'])->middleware(['auth','admin']);
route::get('delete_province/{id}', [AdminController::class,'delete_province'])->middleware(['auth','admin']);
route::get('edite_province/{id}', [AdminController::class,'edite_province'])->middleware(['auth','admin']);
route::post('update_provinc/{id}', [AdminController::class,'update_provinc'])->middleware(['auth','admin']);





route::get('view_rest_province',[AdminController::class,'view_rest_province'])->middleware(['auth','admin']);
route::get('view_shop/{id}', [AdminController::class,'view_shop'])->middleware(['auth','admin']);
route::get('edite_shop/{id}',[AdminController::class,('edite_shop')])->middleware(['auth','admin']);
route::post('update_shop/{id}',[AdminController::class,'update_shop'])->middleware(['auth','admin']);
route::get('delete_shop/{id}', [AdminController::class,'delete_shop'])->middleware(['auth','admin']);



route::get('add_product/{id}',[AdminController::class,'addpro_shop'])->middleware(['auth','admin']);
route::post('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);
route::post('add_shop',[AdminController::class,'add_shop'])->middleware(['auth','admin']);

route::get('view_product/{id}',[AdminController::class,'view_product'])->middleware(['auth','admin']);

route::get('edite_prod/{id}',[AdminController::class,'edite_prod'])->middleware(['auth','admin']);
route::post('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']);
route::get('delete_prod/{id}', [AdminController::class,'delete_prod'])->middleware(['auth','admin']);
route::get('view_order', [AdminController::class,'view_order'])->middleware(['auth','admin']);
route::get('view_order_product/{id}', [AdminController::class,'view_order_product'])->middleware(['auth','admin']);

//add_restaurant

route::get('add_restaurant',[HomeController::class,'add_restaurant']);
route::post('upload_rest',[HomeController::class,'upload_rest']);

route::get('shop_province/{id}', [HomeController::class,'Shoprovince'])->middleware(['auth', 'verified']);





//Order 
route::get('Order_prod/{id}', [OrderController::class,'Order_prod'])->middleware(['auth', 'verified']);
route::get('add_card/{id}', [OrderController::class,'add_card'])->middleware(['auth', 'verified']);
route::get('Mini_card',[OrderController::class,'Mini_card'])->middleware(['auth', 'verified']);
route::get('Sum_prod/{id}',[OrderController::class,'Sum_prod'])->middleware(['auth', 'verified']);
route::get('Sub_prod/{id}',[OrderController::class,'Sub_prod'])->middleware(['auth', 'verified']);
Route::post('qty_input/{id}',[OrderController::class,'qty_input'])->middleware(['auth', 'verified']);
Route::post('Check_out',[OrderController::class,'Check_out'])->middleware(['auth', 'verified']);

route::get('History_order',[OrderController::class,'History_order'])->middleware(['auth', 'verified']);
route::get('vieworder_product',[OrderController::class,'vieworder_product'])->middleware(['auth', 'verified']);
Route::get('remove_order/{id}',[OrderController::class,'remove_order'])->middleware(['auth', 'verified']);


 route::get('invoid',[OrderController::class,'invoid'])->middleware(['auth', 'verified']);


Route::get('view_order_product/{date}',[OrderController::class,'view_order_product'])->middleware(['auth', 'verified']);


Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});












