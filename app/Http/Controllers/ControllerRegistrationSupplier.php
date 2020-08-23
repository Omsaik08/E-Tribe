<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\tbl_supplier_product;


class ControllerRegistrationSupplier extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('supplier/register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        
                $check=DB::table('tbl_supplier_products')->where('supplier_email',$request->get('supplier_email'))->doesntExist();

                if($check){
                    $check1=DB::table('tbl_supplier_products')->where('phone',$request->get('supplier_phone'))->doesntExist();
                    if($check1){
                    if( strcmp($request->get('new_password'),$request->get('confirm_password'))==0 ){
                                DB::insert("insert into tbl_supplier_products (supplier_name,phone,supplier_email,supplier_password) values(?,?,?,?)",
                                [ $request->get('supplier_name'),$request->get('supplier_phone'),$request->get('supplier_email'),$request->get('new_password') ]);
                                
                                echo "<script>alert('Successfully registered')
                                window.location.href='/supplier_login';
                            </script>";

                    }
                    else{
                        //echo "<script>alert('Entered New Password and confirm password are not matching')</script>";
                        //return redirect('supplier_register');

                        echo "<script>alert('Entered New Password and confirm password are not matching')
                                window.location.href='/supplier_register';
                            </script>";

                    }
                }
                else{
                    //echo "<script>alert('Phone number already in Use......Use another Phone Number !')</script>";
                    //return redirect('supplier_register');
                    
                    echo "<script>alert('Phone number already in Use......Use another Phone Number !')
                                window.location.href='/supplier_register';
                            </script>";
                    
                }
            }
            else{
                //echo "<script>alert('Email already registerd......Register with Another Username!')</script>";
                //return redirect('supplier_register');

                echo "<script>alert('Email already registerd......Register with Another Username!')
                                window.location.href='/supplier_register';
                            </script>";
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


    public function checkLogin(Request $req){

            $check_email=DB::table("tbl_supplier_products")->where("supplier_email",$req->get('username'))->exists();

            if($check_email){
                $check_password=DB::table("tbl_supplier_products")->where("supplier_password",$req->get('password'))->exists();
                if($check_password){
                    $res=tbl_supplier_product::where('supplier_email',$req->get('username'))->first();

                    session(["sid"=>$res['supplier_id']]);
                    session()->save();

                    return redirect("supplier_homepage");
                }
                else{
                    //echo "<script>alert('Incorrect Password!')</script>";
                    //return view("/supplier_login");

                    echo "<script>alert('Incorrect Password!')
                                window.location.href='/supplier_login';
                            </script>";
                }
            }
            else{
                //echo "<script>alert('Email Not Registered')</script>";
                //return view("supplier/register");
                
                echo "<script>alert('Email Not Registered')
                                window.location.href='/supplier_login';
                            </script>";
            }


    }



}
