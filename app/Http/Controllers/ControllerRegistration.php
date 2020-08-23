<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_customer;
use DB;

class ControllerRegistration extends Controller
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
    public function store(Request $req)
    {

      $temp=tbl_customer::where('cust_email',$req->get('cust_email'))->first();

      if( strlen( $temp )==0 ) { // to check register id already exists or not
        if( strcmp($req->get('new_password'),$req->get('confirm_password'))==0 ){

            if( file_exists('Customer_Images') ){

            }
            else{
              mkdir('Customer_Images');
            }

          if($req->hasFile('cust_photo'))
          {
            $img=$req->file('cust_photo');
            $imgnm=$img->getClientOriginalName();

            $ext=explode(".",$imgnm);

            $imgnm=$req->get('cust_phone').".".$ext[1];

            $reg= new tbl_customer([
              'cust_photo'=>$imgnm,
              'cust_name'=>$req->get('cust_name'),
              'cust_phone'=>$req->get('cust_phone'),
              'cust_email'=>$req->get('cust_email'),
              'cust_password'=>$req->get('new_password'),
              'cust_home_addr'=>$req->get('cust_home_addr'),
              'cust_office_addr'=>$req->get('cust_office_addr')
            ]);

            $img->move('Customer_Images',$imgnm);
            $reg->save();
            echo "<script>alert('Successfully Registered!')
                      window.location.href='/login';
                  </script>";
          }
          else
          {
            $reg= new tbl_customer([
              'cust_name'=>$req->get('cust_name'),
              'cust_phone'=>$req->get('cust_phone'),
              'cust_email'=>$req->get('cust_email'),
              'cust_password'=>$req->get('new_password'),
              'cust_home_addr'=>$req->get('cust_home_addr'),
              'cust_office_addr'=>$req->get('cust_office_addr')
            ]);
            $reg->save();
            echo "<script>alert('Successfully Registered!')
                      window.location.href='/login';
                  </script>";
          }
          
        }
        else{
          //echo "<script>alert(' New password & old password is not matching  !')</script>";
          //return redirect('/register');

          
          echo "<script>
                  alert('New password & old password is not matching  !');
                  window.location.href='/register';
                </script>";


        }
      }
      else{
        
        echo "<script>alert('Username already exists')
                      window.location.href='/login';
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

      $email=$req->get('username');

      $res=tbl_customer::where('cust_email',$email)->first();

      $username1= $res['cust_email'];
      $password=$res['cust_password'];

      if( strlen($username1) > 0 ){
        if( strcmp( $password,$req->get('password') )==0 ){
            session(["id"=>$res["cust_id"]]);
            session()->save();


			request()->validate([
            'captcha' => 'required|captcha'
            ],
            ['captcha.captcha'=> 'Invalid captcha code.' ]);


            return redirect('/homepage');
        }
        else{
          
          echo "<script>alert('Incorrect Password')
                      window.location.href='/login';
                  </script>";
          //return view('client/guest_user');
        }
      }
      else{
        echo "<script>alert('Username is not exists')
                      window.location.href='/login';
                  </script>";
        //return view('client/guest_user');
      }

    }





    public function demo(){

        echo session()->get("id");

        dd(session()->all());
    }



	public function checkAdminLogin(Request $req){
        if( strcmp( $req->get('username'),"admin@gmail.com" )==0 ){
            if( strcmp( $req->get('password'),"admin@123" )==0 ){
                session(['admin_id'=>"admin"]);
                session()->save();
                return redirect('admin_home');
            }
            else{
                
                echo "<script>alert('Password is Invalid')
                      window.location.href='/admin_login';
                  </script>";
                
            }
        }
        else{
            
            echo "<script>alert('Username is Invalid')
                      window.location.href='/admin_login';
                  </script>";
            
        }
    }





    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function logout(){
          if( session()->exists('id') ){
              session()->forget('id');
              session()->save();
              return redirect('/');
          }
          else if( session()->exists('sid') ){
              session()->forget('sid');
              session()->save();
              return redirect('/');
          }
    }







    public function MyProfileUpdate(Request $req){

        if(session()->exists('id')){    //   for customer wants to update profile
            $cust_id=session()->get('id');
            $result=DB::select('select * from tbl_customers where cust_id=?',[$cust_id]);
            if($req->hasFile('cust_photo'))
            {
              unlink('Customer_Images/'.$result[0]->cust_photo);
              $img=$req->file('cust_photo');
              $image_name=$img->getClientOriginalName();

              $ext=explode(".",$image_name);

              $image_name=$req->get('cust_phone').".".$ext[1];
                $res=DB::update('update tbl_customers set cust_name=?,cust_phone=?,cust_photo=?,cust_password=?,cust_home_addr=?,cust_office_addr=? where cust_id=?',[$req->get('cust_name'),$req->get('cust_phone'),$image_name,$req->get('cust_password'),$req->get('cust_home_addr'),$req->get('cust_office_addr'),$cust_id]);

              $img->move('Customer_Images/',$image_name);
              
              #echo "alert('successfully updated')";
              #return redirect('myaccount');

              echo "<script>alert('successfully updated')
                      window.location.href='/myaccount';
                  </script>";
              
            }
            else{
              $res=DB::update('update tbl_customers set cust_name=?,cust_phone=?,cust_password=?,cust_home_addr=?,cust_office_addr=? where
               cust_id=?',[$req->get('cust_name'),$req->get('cust_phone'),$req->get('cust_password'),$req->get('cust_home_addr'),
               $req->get('cust_office_addr'),$cust_id]);
              
              #echo "alert('successfully updated')";
              #return redirect('myaccount');
              
              echo "<script>alert('successfully updated')
                      window.location.href='/myaccount';
                  </script>";

            }
        }
        else if(session()->exists('sid')){   // update if supplier wants to update his profile

              $res=DB::update('update tbl_supplier_products set supplier_name=?,phone=?,supplier_password=?
                where supplier_id=?',[$req->get('supplier_name'),$req->get('phone'),$req->get('supplier_password'),
                    session()->get('sid')]);
              return redirect('myaccount');

        }



    }






    public function sample(){
      dd(session()->all());
    }







    public function forgotpassword(Request $request){
		if(strcmp($request->get('newpassword'),$request->get('confirmpassword'))==0)
		{
			$res=DB::update('update  tbl_customers set cust_password=? where cust_email=?',[$request->get('newpassword'),$request->get('username')]);
		  return redirect('/');
		}
		else{
		  echo "alert('Both passwords should match')";
		  #return redirect('/');
		}
	}





}
