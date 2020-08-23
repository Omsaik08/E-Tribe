<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_supplier_product;
use DB;
use File;

class AddSupplierProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier=tbl_supplier_product::get()->toArray();
        return view('admin/MainSupplier',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/Add_Supplier_Product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $res=tbl_supplier_product::create(array(
          'supplier_name'=>$request->get('supplier_name'),
          'phone'=>$request->get('ContactNumber'),
          'supplier_email'=>$request->get('supplier_email'),
          'supplier_password'=>$request->get('password')
        ));
        $res->save();
        return redirect('Supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($supplier_id)
    {
        //


        $res=DB::select("select * from tbl_supplier_products where supplier_id=?",[$supplier_id]);

        return view('admin/updatesupplier',compact('res','supplier_id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $supplier_id)
    {
        //

        $phone=DB::select("select phone from tbl_supplier_products where supplier_id=?",[$supplier_id]);

        if( strcmp( $phone[0]->phone,$request->get('phone') )==0 ){
                DB::update("update tbl_supplier_products set supplier_name=?,supplier_password=? where supplier_id=?",[$request->get('supplier_name'),$request->get('password'),$supplier_id]);
        }
        else{
          DB::update("update tbl_supplier_products set supplier_name=?,phone=?,supplier_password=? where supplier_id=?",[$request->get('supplier_name'),$request->get('phone'),$request->get('password'),$supplier_id]);
        }
        return redirect('Supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($supplier_id)
    {


        $p=DB::select('select product_id,category_id from tbl_products where supplier_id=?',[$supplier_id]);

        for($i=0;$i<count($p);$i++){
          $pp=DB::select("select category_name from tbl_product_categories where category_id=?",[$p[$i]->category_id]);
          DB::delete("delete from tbl_carts where product_id=?",[$p[$i]->product_id]);
          //Storage::delete("productcategoryimages/".$pp[0]->category_name."/".$supplier_id);
          File::deleteDirectory(public_path("productcategoryimages/".$pp[0]->category_name."/".$supplier_id));
        }

        DB::delete("delete from tbl_products where supplier_id=?",[$supplier_id]);
        DB::delete("delete from tbl_supplier_products where supplier_id=?",[$supplier_id]);
        return redirect('Supplier');
    }
}
