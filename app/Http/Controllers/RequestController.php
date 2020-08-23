<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_request;
use App\tbl_product_category;
use DB;
use File;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(session()->exists('sid')){
          $res=DB::table('tbl_requests')
                    ->join('tbl_supplier_products','tbl_requests.supplier_id','=','tbl_supplier_products.supplier_id')
                    ->join('tbl_product_categories','tbl_product_categories.category_id','=','tbl_requests.category_id')
                    ->select('tbl_supplier_products.supplier_name','tbl_requests.request_id','tbl_requests.product_name','tbl_requests.product_image',
                    'tbl_product_categories.category_name','tbl_requests.product_quantity','tbl_requests.request_status','tbl_requests.price')
                    ->where('tbl_requests.supplier_id',session()->get('sid'))
                    ->get();

          return view('supplier/RequestedProducts',compact('res'));
      }
      else{
          return redirect('/');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( session()->exists('sid') ){
            $res=tbl_product_category::get()->toArray();
            $supplier_name=DB::select("select supplier_name from tbl_supplier_products where supplier_id=?",[session()->get('sid')]);
            return view('supplier/Addproducts',compact('res','supplier_name'));
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $img=$request->file('product_image');

      $imgmain=$img->getClientOriginalName();


      if( file_exists('requestedImages') ){

      }
      else{
          mkdir('requestedImages');
      }


      $name=explode(".",$imgmain);
      $imgmain=$name[0]."-".time().".".$name[1];


      DB::insert('insert into tbl_requests (supplier_id,category_id,product_name,product_image,product_quantity,
      request_status,price) values(?,?,?,?,?,?,?)',[session()->get('sid'),$request->get('category_name'),
      $request->get('product_name'),$imgmain,$request->get('product_quantity'),'under security',$request->get('price')]);


      $img->move('requestedImages/',$imgmain);

      return redirect('request');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request_id)
    {

      //$data=DB::select('select * from tbl_requests where request_id=?',[$request_id]);
      if( session()->exists('admin_id') ){
          $data=DB::table('tbl_requests')
                    ->join('tbl_product_categories','tbl_requests.category_id','=','tbl_product_categories.category_id')
                    ->where('tbl_requests.request_id',$request_id)
                    ->get();



          DB::insert('insert into tbl_products (supplier_id,category_id,product_name,quantity,image,price) values (?,?,?,?,?,?)',
          [$data[0]->supplier_id,$data[0]->category_id,$data[0]->product_name,$data[0]->product_quantity,$data[0]->product_image,$data[0]->price]);


          $prod_id=DB::select("select product_id from tbl_products where image=?",[$data[0]->product_image]);


          DB::update('update tbl_requests set request_status=?,product_name=? where request_id=?',['Added Successfully',$prod_id[0]->product_id,$request_id]);


          
          if(file_exists('productcategoryimages/'.$data[0]->category_name.'/'.$data[0]->supplier_id)){
            
          }
          else{
            
            mkdir('productcategoryimages/'.$data[0]->category_name.'/'.$data[0]->supplier_id);
          }

          File::move('requestedImages/'.$data[0]->product_image,'productcategoryimages/'.$data[0]->category_name.'/'.$data[0]->supplier_id.'/'.$data[0]->product_image);

          session(['message'=>'Added Successfully']);
          session()->save();

          return redirect('requestPro');
      }
      else{
          return redirect('admin_login');
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($request_id)
    {
      $res=tbl_request::where('request_id',$request_id)->first();
      $category_name=DB::select("select category_name,category_id from tbl_product_categories ");
      $supplier_name=DB::select("select supplier_name from tbl_supplier_products where supplier_id=?",[session()->get('sid')]);
      return view('supplier/UpdateRequest',compact('res','request_id','category_name','supplier_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $request_id)
    {

        if( $request->hasFile('product_image') ){

                $img=$request->file('product_image');
                $imgmain=$img->getClientOriginalName();
                $name=explode(".",$imgmain);
                $imgmain=$name[0]."-".time().".".$name[1];


                $iname=DB::select("select product_image from tbl_requests where request_id=?",[$request_id]);
                unlink('requestedImages/'.$iname[0]->product_image);

                DB::update('update tbl_requests set product_name=? ,product_image=?,category_id=?,product_quantity=?,price=?
                where request_id=?',[$request->get('product_name'),$imgmain,$request->get('category_name'),
                $request->get('product_quantity'),$request->get('price'),$request_id]);

                $img->move('requestedImages/',$imgmain);
        }
        else{
                DB::update('update tbl_requests set product_name=? ,category_id=?,product_quantity=?,price=?
                where request_id=?',[$request->get('product_name'),$request->get('category_name'),
                $request->get('product_quantity'),$request->get('price'),$request_id]);
        }

        return redirect('request');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($d)
    {
      $x=substr($d, -1);
      $y=intval(substr($d, 0, -1));
      if($x=='a')
      {
      DB::update('update tbl_requests set request_status=? where request_id=?',['Rejected',$y]);
      return redirect('requestPro');
      }
      else {
        $res=tbl_request::where('request_id',$y);
        $res->Delete();
        return redirect('request');
      }

    }

}
