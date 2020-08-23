<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_product_category;
use DB;
class AddProductCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if( session()->exists('admin_id') ){
            $res=tbl_product_category::get()->toArray();
            return view('admin/AvailableProductCategories',compact('res'));
        }
        else{
            return redirect('/admin_login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/Add_Product_Category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res=tbl_product_category::create(array(
          'category_name'=>$request->get('category_name'),
          'description'=>$request->get('description'),
        ));
        $res->save();
        return redirect('category');
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
    public function edit($category_id)
    {
        //
        $res=DB::select('select * from tbl_product_categories where category_id=?',[$category_id]);
        return view('admin/updateProductCategory',compact('res','category_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        //


        DB::update("update tbl_product_categories set category_name=?,description=? where category_id=?",[$request->get('category_name'),$request->get('description'),$category_id]);
        return redirect('category');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        //
        $res=DB::select('select * from tbl_product_categories where category_id=?',[$category_id]);

        DB::delete('delete from tbl_product_categories where category_id=?',[$category_id]);
        return redirect('category');
    }
}
