<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_order_details;
use DB;


class ControllerOrderDetails extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {


        if( session()->exists('id') ){
            $res=DB::select("select * from tbl_products where product_id=?",[$product_id]);
            $cname=DB::select('select category_name from tbl_product_categories where category_id=?',[$res[0]->category_id]);
            $cust_name=DB::select("select cust_name from tbl_customers where cust_id=?",[session()->get('id')]);
            return view('client/order_details',compact('res','cname','cust_name'));
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
    public function store(Request $req)
    {
        //
        //echo "hello i'm in store method of controller";

        $cust_id=session()->get('id');
        $product_id=$req->get('product_id');
        $quantity=$req->get('quantity');
        //$order_date=$req->get('order_date');
        $total_price=$req->get('total_price');
        $ordered_date=date('Y-m-d');
        $ship_date=$req->get('shipment_date');

        $cust_name=DB::select("select cust_name from tbl_customers where cust_id=?",[session()->get('id')]);
        $res=DB::table("tbl_products")
                        ->join("tbl_product_categories","tbl_products.category_id",'=','tbl_product_categories.category_id')
                        ->select('tbl_products.product_name','tbl_products.image','tbl_product_categories.category_name','tbl_products.supplier_id')
                        ->where('tbl_products.product_id',$product_id)
                        ->get();



        return view("client/bill",compact('cust_name','res','product_id','quantity','total_price','ordered_date','ship_date',));


        /*
        DB::insert("insert into tbl_order_details (cust_id,product_id,quantity,total_price,ship_date) values(?,?,?,?,?)",
        [$cust_id,$product_id,$quantity,$total_price,$ship_date]);
        return redirect('myOrders');
        */

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function callOrderDetails($product_id){
        if(session()->exists('id')){
            $res=DB::select('select * from tbl_products where product_id=?',[$product_id]);
            $cname=DB::select('select category_name from tbl_product_categories where category_id=?',[$res[0]->category_id]);
            $similar_products=DB::select('select * from tbl_products where category_id=? and product_id!=?',[$res[0]->category_id,$product_id]);
            return View('client/product_details',compact('res','cname','similar_products'));
        }
        else{
            return redirect('/');
        }
    }




    public function showMyOrders(){
        if(session()->exists('id')){
            $res1=DB::select('select * from tbl_order_details where cust_id=?',[session()->get('id')]);

            $res=DB::table("tbl_order_details")
                    ->join("tbl_products","tbl_order_details.product_id","=","tbl_products.product_id")
                    ->join('tbl_product_categories','tbl_product_categories.category_id','=','tbl_products.category_id')
                    ->select('tbl_order_details.product_id','tbl_order_details.quantity','tbl_order_details.order_date',
                        'tbl_order_details.total_price','tbl_order_details.ship_date','tbl_product_categories.category_name',
                        'tbl_products.supplier_id','tbl_products.image','tbl_products.product_name')
                    ->where("tbl_order_details.cust_id",session()->get('id'))
                    ->get();

            return View('client/ordered_products',compact('res'));
        }
        else{
            return redirect('/');
        }
    }


    public function showBill(Request $req){

        if(session()->exists('id')){
            DB::insert("insert into tbl_order_details (cust_id,product_id,quantity,order_date,total_price,ship_date) values(?,?,?,?,?,?)",
            [session()->get('id'),$req->get('product_id'),$req->get('quantity'),$req->get('order_date'),$req->get('total_price'),$req->get('shipment_date')]);

            

            return redirect('myOrders');
        }
        else{
            return redirect('/');
        }


    }


}
