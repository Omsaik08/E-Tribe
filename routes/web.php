<?php

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


use App\tbl_product_category;
use App\tbl_product;
use App\tbl_request;



// session    id = customer id   and   sid = supplier id    and      admin_id = admin id


Route::get('/', function () {
    //$data=DB::select('select * from tbl_products order by created_at desc limit 9');
    $data=DB::table('tbl_products')
            ->join('tbl_product_categories','tbl_products.category_id','=','tbl_product_categories.category_id')
            ->orderBy('tbl_products.created_at','desc')
            ->limit(9)
            ->get();

    return view("client\guest_user",compact('data'));
});



// for guest user
Route::get('guest_handcrafts',function(){
  $data=DB::select('select * from tbl_products where category_id=?',[1]);
  return view('client/guest_handcrafts',compact('data'));
});

Route::get('guest_arts',function(){
  $data=DB::select('select * from tbl_products where category_id=?',[2]);
  return view('client/guest_arts',compact('data'));
});
Route::get('guest_wall_paint',function(){
  $data=DB::select('select * from tbl_products where category_id=?',[3]);
  return view('client/guest_wall_paint',compact('data'));
});
Route::get('guest_forest_product',function(){
  $data=DB::select('select * from tbl_products where category_id=?',[4]);
  return view('client/guest_forest_product',compact('data'));
});










// for admin login
Route::get('/admin_login',function(){
    return view('admin/login');
});
Route::post('/checkAdminLogin','ControllerRegistration@checkAdminLogin');


// resource for registration
Route::resource('/register','ControllerRegistration');





//for client
Route::get('/login',function(){
    return view('client/login');
});
Route::get('/forgot_password',function(){
    return view('client/forgot_password');
});
Route::get('/register',function(){
    return view('client/register');
});
Route::post('/checkLogin','ControllerRegistration@checkLogin');







Route::post('/checkPassword','ControllerRegistration@forgotpassword');


//for index ( homepage ) after login successfully     client user
Route::get('/homepage',function(){
    if(session()->exists('id')){
        $data=DB::select('select * from tbl_products  order by created_at desc limit 9');
    	return view('client\homepage',compact('data'));
    }
    else{
        return redirect('/');
    }
});




//for handcrafts
Route::get('/handcrafts',function(){
    if(session()->exists('id')){
        $data=tbl_product::where('category_id',1)->get();
      	return view('client\handcrafts',compact('data'));
    }
    else{
        return redirect('/');
    }

});




//for arts
Route::get('/arts',function(){
    if(session()->exists('id')){
        $data=DB::select('select * from tbl_products where category_id=? order by created_at limit 6',["2"]);
        return view('client\arts',compact('data'));
    }
    else{
        return redirect('/');
    }

});




//for paintings
Route::get('/paintings',function(){
    if(session()->exists('id')){
        $data=DB::select('select * from tbl_products where category_id=? order by created_at limit 6',["3"]);
        return view('client\paintings',compact('data'));
    }
    else{
        return redirect('/');
    }
});




//for forest_products
Route::get('/forest_products',function(){
    if(session()->exists('id')){
        $data=DB::select('select * from tbl_products where category_id=? order by created_at limit 6',["4"]);
        return view('client\forest_products',compact('data'));
    }
    else{
        return redirect('/');
    }
});






/*
//for product details
Route::get('/product_details',function(){
	return view('client\product_details');
});
*/



// resource for order details
Route::resource('/order_details','ControllerOrderDetails');
Route::get('/product_details/{product_id}','ControllerOrderDetails@callOrderDetails');
Route::get('/place_an_order/{product_id}','ControllerOrderDetails@create');
Route::get('/myOrders','ControllerOrderDetails@showMyOrders');
Route::post('/showBill','ControllerOrderDetails@showBill');





// resource for product category
Route::resource('category','AddProductCategory');
Route::get('addcategory',function(){
    if( session()->exists('admin_id') ){
        return view('admin/Add_Product_Category');
    }
    else{
        return redirect('/admin_login');
    }
});


//for supplier
Route::resource('/Supplier','AddSupplierProduct');
Route::get('/supplier_login',function(){
	return view('supplier/login');
});
Route::get('/supplier_forgot_password',function(){
	return view('supplier/forgot_password');
});
Route::get('/supplier_register',function(){
	return view('supplier/register');
});
Route::post('/supplier_checkLogin','ControllerRegistrationSupplier@checkLogin');

/**
 *      start of supplier product
*       to distinguish between client and supplier we use session to give permission for adding its
*       own product
 */

 /*
// resource for supplier porduct
Route::resource('/Supplier','AddSupplierProduct');
Route::get('addsupplier',function(){
  return view('supplier/login');
});

// for login
Route::get('/supplier_login',function(){
	return view('supplier/login');
});
Route::post('/supplier_checkLogin','ControllerRegistrationSupplier@checkLogin');

// resource for registration
Route::resource('/supplier_register','ControllerRegistrationSupplier');

// for forgot_password
Route::get('/supplier_forgot_password',function(){
	return view('supplier/forgot_password');
});
*/

/**
 *      end of supplier product
 */



// resource for products
Route::resource('product','ProductResource');
Route::get('addproduct',function(){
    if( session()->exists('admin_id') ){
        $res=tbl_product_category::get()->toArray();
        $supplier_name=DB::select("select supplier_name from tbl_supplier_products where supplier_id=?",[session()->get('sid')]);
        return view('admin/AddProduct',compact('res','supplier_name'));
    }
    else{
        return redirect('/admin_login');
    }
});




// for admin dashboard or admin home
Route::get('/admin_home',function(){
    if( session()->exists('admin_id') ){
        $data=DB::table('tbl_products')			
            ->orderBy('tbl_products.created_at','desc')
            ->limit(10)
            ->get();
        return view('admin/admin_home',compact('data'));
    }
    else{
        return redirect('/admin_login');
    }

});
Route::get('get/{id}','ProductResource@availproducts');






// resource  request to add product
/*
Route::get('request1',function(){
    $res=tbl_product_category::get()->toArray();
	return view('client/RequestToAdd',compact('res'));
});
*/

Route::resource('request','RequestController');

Route::get('requestPro',function(){
    if(session()->exists('admin_id') ){
        $res=DB::table("tbl_requests")
                        ->join('tbl_supplier_products','tbl_requests.supplier_id','=','tbl_supplier_products.supplier_id')
                        ->join('tbl_product_categories','tbl_requests.category_id','=','tbl_product_categories.category_id')
                    ->select('tbl_supplier_products.supplier_name','tbl_requests.request_id','tbl_requests.supplier_id','tbl_requests.category_id',
                        'tbl_requests.product_name','tbl_requests.product_image','tbl_requests.product_quantity','tbl_requests.request_status',
                        'tbl_requests.price','tbl_product_categories.category_name')
                        ->where('tbl_requests.request_status',"under security")
                        ->get();

        return view('admin/RequestedProducts',compact('res'));
    }
    else{
        return redirect('admin_login');
    }
});

Route::get('/callShow/{request_id}','RequestController@show');



// controller for cart
Route::get('/cart','ControllerCart@callCart');
Route::get('/cartProduct/{pid}','ControllerCart@addCartProduct');
Route::get('/deleteCartProduct/{pid}','ControllerCart@deleteCartProduct');




Route::get('/sample',function(){
/*
    session()->forget('id');
    //session()->forget('sid');
    session()->save();
    //dd(session()->all());
*/
    dd(session()->all());
	//return view("client/sample");
});































// supplier product
/*
Route::get('supplier_login',function(){
  return view('/');
});
*/
/*
Route::get('supplier_forgot_password',function(){
  return view('supplier/forgot_password');
});
*/

Route::resource('supplier_register','ControllerRegistrationSupplier');
Route::post('checkSupplierLogin','ControllerRegistrationSupplier@checkLogin');
Route::post('insertSupplier','ControllerRegistrationSupplier@store');

Route::get('supplier_homepage',function(){
  if(session()->exists('sid')){
	  $data=DB::table('tbl_products')
            ->join('tbl_product_categories','tbl_products.category_id','=','tbl_product_categories.category_id')
			->where('tbl_products.supplier_id',session()->get('sid'))
            ->orderBy('tbl_products.created_at','desc')
            ->limit(10)
            ->get();
      return view('supplier/supplier_homepage',compact('data'));
  }
  else{
      return redirect('/');
  }
});

/*  removed by request controller create method
Route::get('addSupplierProducts',function(){
    $res=tbl_product_category::get()->toArray();
    $supplier_name=DB::select("select supplier_name from tbl_supplier_products where supplier_id=?",[session()->get('sid')]);
    return view('supplier/Addproducts',compact('res','supplier_name'));
});*/

Route::get('supplier_handcrafts',function(){
    if(session()->exists('sid')){
        $data=DB::select('select * from tbl_products where category_id=? and supplier_id=? order by created_at limit 6',["1",session()->get('sid')]);
        return view('supplier\handcrafts',compact('data'));
    }
    else{
        return redirect('/');
    }
});

Route::get('supplier_arts',function(){
    if(session()->exists('sid')){
        $data=DB::select('select * from tbl_products where category_id=? and supplier_id=? order by created_at limit 6',["2",session()->get('sid')]);
        return view('supplier\arts',compact('data'));
    }
    else{
        return redirect('/');
    }
});

Route::get('supplier_paintings',function(){
    if(session()->exists('sid')){
        $data=DB::select('select * from tbl_products where category_id=? and supplier_id=? order by created_at limit 6',["3",session()->get('sid')]);
        return view('supplier\paintings',compact('data'));
    }
    else{
        return redirect('/');
    }
});

Route::get('supplier_forest_products',function(){
    if(session()->exists('sid')){
        $data=DB::select('select * from tbl_products where category_id=? and supplier_id=? order by created_at limit 6',["4",session()->get('sid')]);
        return view('supplier\forest_products',compact('data'));
    }
    else{
        return redirect('/');
    }

});

//Route::post('supplierAddProducts','ProductResource@store');
Route::get('callAddProducts','RequestController@create');






//  captcha
Route::get('refresh_captcha','ControllerRegistration@refreshCaptcha');




// my profile routes
Route::get('myprofile',function(){
	if(session()->exists('id')){
        return view('client/myprofile');
    }
    else if(session()->exists('sid')){
        return view('supplier/myprofile');
    }
});

Route::get('myaccount',function(){

    if( session()->exists('id') ){
        $cust_id=session()->get('id');
    	$res=DB::select('select * from tbl_customers where cust_id=?',[$cust_id]);
        return view('client/MyAccount',compact('res'));
    }
    else if( session()->exists('sid') ){
        $supplier_id=session()->get('sid');
    	$res=DB::select('select * from tbl_supplier_products where supplier_id=?',[$supplier_id]);
        return view('supplier/MyAccount',compact('res'));
    }

});
Route::get('myprofile_update',function(){
    if( session()->exists('id') ){
        $cust_id=session()->get('id');
        $res=DB::select('select * from tbl_customers where cust_id=?',[$cust_id]);
      return view('client/MyProfileUpdate',compact('res'));
    }
    else if( session()->exists('sid') ){
        $supplier_id=session()->get('sid');
    	$res=DB::select('select * from tbl_supplier_products where supplier_id=?',[$supplier_id]);
      return view('supplier/MyProfileUpdate',compact('res'));
    }

});

Route::post('MyProfileUpdatefunction','ControllerRegistration@MyProfileUpdate');
Route::get('sam','ControllerRegistration@sample');
Route::post('checkPassword',"ControllerRegistration@forgotpassword");








// logout
Route::get('/logout','ControllerRegistration@logout');








/*
Route::get('popup',function(){
    return view('client/login');
});
*/





