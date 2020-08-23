<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_product;
use App\tbl_product_category;
use DB;
use File;

class ProductResource extends Controller
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
            $res=tbl_product::get()->toArray();
            return view('admin/AvailableProducts',compact('res'));
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
        return view('admin/AddProduct');
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
        if( session()->exists('admin_id') ){
            if( file_exists('productcategoryimages') ){

            }
            else{
              mkdir( 'productcategoryimages' );
            }

            $arr=array("Handcrafts","Arts","Paintings","Forest Products");



            $ee="";
            if( file_exists('productcategoryimages/'.$arr[(int)$request->get('category_name')-1]) ){
                  $ee='productcategoryimages/'.$arr[(int)$request->get('category_name')-1];
            }
            else{
              if( strcmp( $request->get('category_name'),"1" )==0 ){
                $ee='productcategoryimages/'."Handcrafts";
              }
              elseif( strcmp( $request->get('category_name'),"2" )==0 ){
                $ee='productcategoryimages/'."Arts";
              }
              elseif( strcmp( $request->get('category_name'),"3" )==0 ){
                $ee='productcategoryimages/'."Paintings";
              }
              else{
                  $ee='productcategoryimages/'."Forest Products";
              }
                mkdir( $ee );
            }


            if( file_exists($ee."/".$request->get('supplier_id')) ){

            }
            else{
              mkdir( $ee."/".$request->get('supplier_id') );
            }



            if($request->hasFile('image')){
              $img=$request->file('image');
              $imgname=$img->getClientOriginalName();
              $name=explode(".",$imgname);
              //"productcategoryimages/".$request->get('supplier_id')."/"
              $imgname=$name[0]."-".time().".".$name[1];



            $res=tbl_product::create(array(
              'supplier_id'=>$request->get('supplier_id'),
              'product_name'=>$request->get('product_name'),
              'category_id'=>$request->get('category_name'),
              'quantity'=>$request->get('quantity'),
              'image'=>$imgname,
              'price'=>$request->get('price')
            ));
            $img->move($ee."/".$request->get('supplier_id')."/",$imgname);
            $res->save();
            return redirect('admin_home');

            }
        }
        else{
            return redirect('admin_login');
        }



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
    public function edit($product_id)
    {
        //
        $res=tbl_product::where('product_id',$product_id)->first();
        return view('admin/UpdateProducts',compact('res','product_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $product_id)
    {
        //



        $res=tbl_product::where( "product_id",$product_id )->first();
        $cname=tbl_product_category::where("category_id",$res['category_id'])->first();

        if( $request->hasFile('image') ){
          if(file_exists("productcategoryimages/".$cname['category_name']."/".$res['supplier_id'])."/".$res['image'])

            unlink("productcategoryimages/".$cname['category_name']."/".$res['supplier_id']."/".$res['image']);

            $img=$request->file('image');
            $imgname=$img->getClientOriginalName();

            $name=explode(".",$imgname);
            //"productcategoryimages/".$request->get('supplier_id')."/"
            $imgname=$name[0]."-".time().".".$name[1];

            DB::update("update tbl_products set product_name=?,quantity=?,image=?,price=? where product_id=?",[$request->get('product_name'),$request->get('quantity'),$imgname,$request->get('price'),$product_id]);

            $img->move("productcategoryimages/".$cname['category_name']."/".$res['supplier_id']."/",$imgname);

          }
        else{
          DB::update("update tbl_products set product_name=?,quantity=?,price=? where product_id=?",[$request->get('product_name'),$request->get('quantity'),$request->get('price'),$product_id]);
        }
return redirect('admin_home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        //

        $res=tbl_product::where( "product_id",$product_id )->first();
        $cname=tbl_product_category::where("category_id",$res['category_id'])->first();

        unlink("productcategoryimages/".$cname['category_name']."/".$res['supplier_id']."/".$res['image']);

        DB::delete("delete from tbl_products where product_id=?",[$product_id]);
        return redirect('admin_home');
    }


	public function availproducts($cid){   //   cid means category_id

			if(session()->exists('admin_id')){
                $res=DB::table('tbl_products')
                        ->join('tbl_supplier_products','tbl_products.supplier_id','=','tbl_supplier_products.supplier_id')
                        ->where('tbl_products.category_id',$cid)
                        ->get();
    			$cname1=DB::select("select category_name from tbl_product_categories where category_id=?",[$cid]);
    			$cname=$cname1[0]->category_name;

    		    return view('admin/AvailableProducts',compact('cid','res','cname'));
            }
            else{
                return redirect('/admin_login');
            }
	}



}
