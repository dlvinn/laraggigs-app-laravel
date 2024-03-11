<?php

use App\Models\Listing;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

/* Route::get('/', function () {//you can access request or response object inside of that function aswell in the parameters
    return view('listings', [
        'heading' => 'latest listing',
        'listings' => Listings::all(),
    ]);
}); */
// Route::get('/list/{id}', function ($id) {//you can access request or response object inside of that function aswell in the parameters
//     // dd($id);
//     return view('listings2', [
//         'heading' => 'latest listing',
//         'listings' => Listing::find($id),
//     ]);
// });
/* Route::get('/list', function () {//you can access request or response object inside of that function aswell in the parameters
    return view('listings2', [
        'heading' => 'latest listing',
        'listings' => Listing::all(),
    ]);
}); */


// Route::get('posts/{id}', function($id){
//     //when it comes to debugging you can use dd() and show for example whatever the id is it means die dump
//     //dd('sarzm'); //this will stop everything and shows whatever you pass in and its gonna send 500 response code because its not gonna send anything pass that
//     ddd('sarzm');
//     return response('<blockquote> sarsam '. $id. '</blockquote>')->header('Content-Type', 'html');
// })->where('id', '[0-9]+');//you can put constraints by just what i did here you should constraint using regular expressions

// Route::get('/search', function(Request $request){
//     dd($request->name.' '. $request->city . '  '); //its case sensitive aswell
// });

/* Route::get('/list', function () {//you can access request or response object inside of that function aswell in the parameters
    return view('listings', [
        'heading' => 'latest listing',
        'listings' => Listing::all(),
    ]);
});
Route::get('/', function () {//you can access request or response object inside of that function aswell in the parameters
    return view('listings', [
        'heading' => 'latest listing',
        'listings' => Listing::all(),
    ]);
});
Route::get('/list/{listing}', function (Listing $listing) {//you can access request or response object inside of that function aswell in the parameters
    
    if($listing){
        return view('listing', [
            'listing' => $listing,
        ]);}
     */
    //ypu can do it this way but there is a better way
    // $listing = Listing::find($id);
    // if($listing){
    //     return view('listing', [
    //         'listing' => Listing::find($id),
    //     ]);
    // }else{
    //     abort('404');
    // }
   
// 

Route::get('/', [ListingController::class,'index']);





//show create listing page
Route::get('/list/create',[ListingController::class, 'create'])->middleware('auth');
//stores the listing using post method
Route::post('/list',[ListingController::class, 'store'])->middleware('auth');
//show edit form
Route::get('/list/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');
//Edit submit to update
Route::put('/list/{listing}', [ListingController::class,'update'])->middleware('auth');
// to delete
Route::delete('/list/{listing}', [ListingController::class,'destroy']);

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
//return single listing
Route::get('/list/{listing}',[ListingController::class, 'show']);

//show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
//create a new user 
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

