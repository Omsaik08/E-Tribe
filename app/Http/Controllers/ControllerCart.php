<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ControllerCart extends Controller
{
    //

    public function callCart(){
        if(session()->exists('id')){
            $res=DB::table('tbl_carts')
                                ->join('tbl_products','tbl_carts.product_id',"=",'tbl_products.product_id')
                                ->join('tbl_product_categories','tbl_product_categories.category_id','=','tbl_products.category_id')
                                ->where('tbl_carts.cust_id',session()->get('id'))
                                ->get();
            return view('client/cart',compact('res'));
        }
        else{
            return redirect('/');
        }
    }

    public function addCartProduct($pid){

        if(session()->exists('id')){
            $check=DB::table('tbl_carts')->where('cust_id',session()->get('id'))->where('product_id',$pid)->doesntExist();
            if($check){
                DB::insert("insert into tbl_carts (cust_id,product_id) values(?,?)",[session()->get("id"),$pid]);
            }
            else{
                //echo "<script>alert('Product is already in CART!')</script>";
                session(['message'=>"Product is already in CART!"]);
                session()->save();
            }
            return redirect('/cart');
        }
        else{
            return redirect('/');
        }
    }



    public function deleteCartProduct($pid){
        if(session()->exists('id')){
            DB::delete("delete from tbl_carts where product_id=? and cust_id=?",[$pid,session()->get('id')]);
            return redirect('cart');
        }
        else{
            return redirect('/');
        }
    }



}
