<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use App\Models\Brand;
use App\Models\HomeAbout;
use App\Models\Testimonial;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $brands = Brand::latest()->paginate(5);
    // $abouts = DB::table('home_abouts')->first();
    $abouts = HomeAbout::latest()->first();
    return view('home',compact('brands','abouts'));
});

//category Controller
Route::get('/category/all',[CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'Edit']);
Route::post('/category/update/{id}',[CategoryController::class,'Update']);
Route::get('/softdelete/category/{id}',[CategoryController::class,'SoftDelete']);
Route::get('/category/restore/{id}',[CategoryController::class,'Restore']);
Route::get('/pdelete/category/{id}',[CategoryController::class,'Pdelete']);


//brand controller
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class,'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'Edit']);
Route::post('/brand/update/{id}',[BrandController::class,'Update']);
Route::get('/brand/delete/{id}',[BrandController::class,'Delete']);

//Admin all route
Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}',[HomeController::class,'EditSlider']);
Route::post('/slider/update/{id}',[HomeController::class,'UpdateSlider']);
Route::get('/slider/delete/{id}',[HomeController::class,'Delete']);

//Home About
Route::get('/home/about',[AboutController::class,'HomeAbout'])->name('home.about');
Route::get('/add/about',[AboutController::class,'AddAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);


//Admin COntact Page Route
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/add/contact',[ContactController::class,'AddContact'])->name('add.contact');
Route::post('/store/contact', [ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}', [ContactController::class, 'EditContact']);
Route::post('/update/contact/{id}', [ContactController::class, 'UpdateContact']);

//Admin Testimonial page route
Route::get('/admin/testimonial', [TestimonialController::class, 'AdminTestimonial'])->name('admin.testimonial');
Route::get('/add/testimonial',[TestimonialController::class,'AddTestimonial'])->name('add.testimonial');
Route::post('/store/testimonial', [TestimonialController::class, 'StoreTestimonial'])->name('store.testimonial');
Route::get('/testimonial/edit/{id}',[TestimonialController::class,'EditTestimonial']);
Route::post('/testimonial/update/{id}', [TestimonialController::class, 'UpdateTestimonial']);
Route::get('/testimonial/delete/{id}',[TestimonialController::class,'DeleteTestimonial']);


//Home  page client route
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::get('/services', [ContactController::class, 'Services'])->name('services');
Route::get('/portfolio', [ContactController::class, 'Portfolio'])->name('portfolio');
Route::get('/aboutus', [ContactController::class, 'AboutUs'])->name('aboutus');
Route::get('/team', [ContactController::class, 'Team'])->name('team');
Route::get('/testimonia', [ContactController::class, 'Testimonia'])->name('testimonia');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');
