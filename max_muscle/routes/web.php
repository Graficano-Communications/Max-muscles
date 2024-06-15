<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/', 'HomeController@index')->name('home');
Route::post('/SendMail','HomeController@SendMail')->name('SendMail');
Route::get('/about-us', 'HomeController@about')->name('about');
Route::get('/contact-us', 'HomeController@contact')->name('contact');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/timeline', 'HomeController@timeline')->name('timeline');

Route::get('/product/{slug}', 'HomeController@product')->name('product');
Route::get('/our_team', 'HomeController@our_team')->name('our_team');

Route::get('/password_hash/{pass}', 'HomeController@password_hash')->name('password_hash');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/events', 'HomeController@events')->name('events');
Route::get('/compliance', 'HomeController@compliance')->name('compliance');
Route::get('/technologypatners', 'HomeController@technologypatners')->name('technologypatners');
Route::get('/media','HomeController@media')->name('media');
Route::get('/logisticpatners','HomeController@logisticpatners')->name('logisticpatners');
Route::get('/blogs','HomeController@blog')->name('blogs'); 
Route::get('/blog/{slug}', 'HomeController@blogdetails')->name('blog.details');

Route::get('/videos','HomeController@videos')->name('videos');
 


Route::get('/blog/{id}','BlogController@blogs_detail')->name('blog_detail');  
Route::get('/csr','HomeController@csr_view')->name('csr');
Route::get('/faq','HomeController@faq')->name('faq');
Route::get('/Future_WithUs','HomeController@FutureWithUs')->name('Future_WithUs'); 
Route::get('/sports','HomeController@sports')->name('sports');
Route::get('/catalogues', 'HomeController@resources')->name('resources');
Route::post('/downloadcatlog','HomeController@downloadcatlog')->name('downloadcatlog');

 

Route::get('/departments', 'HomeController@departments')->name('departments'); 
 


Route::get('/subcategory/{cat_slug}', 'HomeController@get_by_category')->name('category'); 
Route::get('/category/{category_slug}/{subcategory_slug}','HomeController@get_by_subcategory')->name('subcategory'); 
 
Route::get('/product_by_category/sports/{category_slug}/{subcategory_slug}','HomeController@product_by_category')->name('product_by_category');
 Route::post('/search','HomeController@search')->name('search');

Route::get('/admin/login','HomeController@admin_login')->name('admin.login')->middleware('guest');   
Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
Route::get('admin/aboutus','AdminController@edit_aboutus')->name('admin.aboutus');
Route::PUT('about/update/{id}','AdminController@update')->name('about.update');

Route::resource('admin/banners', 'BannerController');
Route::resource('admin/events', 'EventController');
Route::resource('admin/categories', 'CategoryController');
Route::resource('admin/csr', 'CsrController');
Route::resource('admin/products', 'ProductController');
Route::resource('admin/catlogs', 'CatlogController');
Route::resource('admin/image','ImageController');
Route::resource('admin/video','VideoController');
Route::resource('admin/department','departmentController');
Route::resource('admin/blog','BlogController');
Route::resource('admin/ourteam','OurteamController');
Route::resource('admin/history','HistoryController'); 
Route::POST('sort_history','HistoryController@sort_history')->name('sort_history');

 
Route::get('admin/delimg/{id}/{pid}','departmentController@delimg')->name('delimgdept');

Route::get('check_product_url/{slug}','ProductController@check_product_url')->name('check_product_url');
// Product Images routes
Route::get('products_images/{id}', 'ProductController@images')->name('products_images');
Route::post('add_img','ProductController@add_img')->name('add_img');
Route::DELETE('delimg/{id}/{pid}','ProductController@delimg')->name('delimg');
Route::get('editimg/{id}','ProductController@editimg')->name('editimg');
Route::PUT('updateimg/{id}','ProductController@updateimg')->name('updateimg');

// =============

Route::get('/sub_category/{id}','CategoryController@sub_category')->name('sub_category');
Route::get('/view_sub_category/{id}','CategoryController@view_sub_category')->name('view_sub_category'); 
Route::get('/view_sub_department/{id}','departmentController@view_sub_department')->name('view_sub_department');
Route::get('/add_sub_department/{id}','departmentController@add_sub_department')->name('add_sub_department'); 
Route::get('/sub_csr/{id}','CategoryController@sub_csr')->name('sub_csr');
Route::get('/view_sub_csr/{id}','CsrController@view_sub_csr')->name('view_sub_csr');
Route::get('/subcategory/edit/{id}','CategoryController@sub_category_edit')->name('subcategory.edit');
Route::PUT('/subcategory/update/{id}','CategoryController@subcategoryupdate')->name('subcategory.update');
Route::DELETE('/subcategory/delete/{id}','CategoryController@sub_category_del')->name('subcategory.destroy');
Route::get('/subdepartment/edit/{id}','departmentController@sub_department_edit')->name('subdepartment.edit');
Route::PUT('/subdepartment/update/{id}','departmentController@subdepartmentupdate')->name('subdepartment.update');
Route::DELETE('/subdepartment/delete/{id}','departmentController@sub_department_del')->name('subdepartment.destroy');
Route::POST('sort_category','CategoryController@sort_category')->name('sort_category');
Route::POST('sort_department','departmentController@sort_department')->name('sort_department');
Route::POST('sort_subcategory','CategoryController@sort_subcategory')->name('sort_subcategory');
Route::POST('sort_banner','BannerController@sort_banner')->name('sort_banner');
Route::POST('sort_blog','BlogController@sort_blog')->name('sort_blog');
Route::POST('sort_csr','CsrController@sort_csr')->name('sort_csr'); 
Route::POST('sort_subcsr','CsrController@sort_subcsr')->name('sort_subcsr'); 
Route::POST('sort_img','ImageController@sort_img')->name('sort_img'); 
Route::POST('sort_vid','VideoController@sort_vid')->name('sort_vid'); 
Route::POST('sort_subdepartment','departmentController@sort_subdepartment')->name('sort_subdepartment');
Route::POST('subdepartment_store','departmentController@subdepartment_store')->name('subdepartment_store');
Route::POST('sort_ourteam','OurteamController@sort_ourteam')->name('sort_ourteam'); 

Route::DELETE('del_dept_img/{image}/{id}','departmentController@del_dept_img')->name('del_dept_img');
Route::get('admin/images/{image}/delete/{id}','ProductController@deleteimg')->name('deleteimg');


Route::POST('blog_store','BlogController@blog_store')->name('blog_store');

Route::get('/subcsr/edit/{id}','CsrController@sub_csr_edit')->name('subcsr.edit');
Route::PUT('/subcsr/update/{id}','CsrController@subcsrupdate')->name('subcsr.update');
Route::DELETE('/subcsr/delete/{id}','CsrController@sub_csr_del')->name('subcsr.destroy');

Route::get('/product_by_subcategory/{id}','ProductController@product_by_subcategory')->name('product_by_subcategory');
Route::POST('sort_products','ProductController@sort_products')->name('sort_products');

Route::get('/importexport','ProductController@importexport')->name('importexport');
Route::get('/producttocopy/{id}','ProductController@producttocopy')->name('producttocopy');
Route::post('/exportprodcucts','ProductController@exportprodcucts')->name('exportprodcucts'); 
  
Route::POST('sort_catlog','CatlogController@sort_catlog')->name('sort_catlog');
Route::POST('sort_event','EventController@sort_event')->name('sort_event');


// CART Route
Route::post('/add_to_cart' ,'CartController@add_to_cart')->name('add_to_cart');
Route::get('/get_cart_data' ,'CartController@get_cart_data')->name('get_cart_data');
Route::get('/inquiry' ,'CartController@inquiry')->name('inquiry');
Route::get('/cart' ,'CartController@cart')->name('cart');
Route::post('/checkout','CartController@checkout')->name('checkout');
Route::get('/removecart/{rowid}','CartController@removecart')->name('removecart');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
