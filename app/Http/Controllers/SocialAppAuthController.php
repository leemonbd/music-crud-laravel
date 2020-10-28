<?php

namespace App\Http\Controllers;

use App\CoverImages;
use App\PostText;
use App\ProfileImages;
use Illuminate\Http\Request;
use App\Customer;
use App\Division;
use App\District;
use DB;
use Session;
use Image;

class SocialAppAuthController extends Controller
{
    public function index(){
        return view('front-end.social-app-auth.social-app-login');
    }

    public function socialAppRegister(){
        return view('front-end.social-app-auth.social-app-register');
    }

    public function socialAppForgetPass(){
        return view('front-end.social-app-auth.social-app-forget-pass');
    }


    public function socialAppDivisionsDistricts(){
        $divisions=Division::all();
        $districts=District::all();
        return view('front-end.social-app-auth.social-app-register',[
            'divisions'=>$divisions,
            'districts'=>$districts
        ]);
    }
    public function newCustomer(Request $request){
        $customer=new Customer();
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:customers,email',
            'password'=>'required',
            'confirmPassword'=>'required|same:password',
            'division'=>'required',
            'district'=>'required',
        ]);


        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->password=$request->password;
        $customer->confirm_password=$request->confirmPassword;
        $customer->division=$request->division;
        $customer->district=$request->district;
        $customer->save();
        $customerId=$customer->id;
        $customerName=$customer->name;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customerName);

        return redirect('/social-app-register')->with('message','Customer Info Saved Successfully');
    }



    public function newLogin(Request $request){
        $customer=Customer::all()->where('email',$request->email)->where('password',$request->password)->first();
        /*$customersInfo=DB::table('customers')
            ->join('divisions', 'customers.division','divisions.id')
            ->join('districts', 'customers.district','districts.id')
            ->select('books.*','divisions.division_name','districts.district_name')
            ->get();
        return $customersInfo;*/

        if($customer){
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->name);
            return redirect('/profile');

        }else{
            return redirect('/')->with('message','Invalid email address or password');

        }
    }

    public function myAccount($customerId){
        $customerSessionId=Session::get('customerId');
        $customer=Customer::find($customerId);
        $customerAddress=DB::table('customers')
            ->join('divisions', 'customers.division','=','divisions.id')
            ->join('districts', 'customers.district','=','districts.id')
            ->select('customers.*','divisions.division_name','districts.district_name')
            ->where('customers.id',$customerSessionId)
            ->first();
        $coverimage=CoverImages::all()->where('customer_id',$customerSessionId)->last();
        $profileImage=ProfileImages::all()->where('customer_id',$customerSessionId)->last();
        return view('front-end.social-app-auth.my-account',[
            'customerAddress'=>$customerAddress,
            'customer'=>$customer,
            'coverimage'=>$coverimage,
            'profileImage'=>$profileImage,

        ]);
    }
    public function updateAccount(Request $request){

        $this->validate($request,[
            'confirm_password'=>'same:new_password',
        ]);
        $customer=Customer::find($request->id);
       if($request->old_password == $customer->password){
           $customer->name=$request->name;
           $customer->email=$request->email;
           $customer->password=$request->new_password;
           $customer->confirm_password=$request->confirm_password;
           $customer->division=$request->division;
           $customer->district=$request->district;
           $customer->country=$request->country;
           $customer->save();
           Session::forget('customerId');
           Session::forget('customerName');

           return redirect('/');

       }else{
           return redirect()->back()->with('message','Old password does not match');
       }





        }



    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }


    public function getSubcat($id){
        $district=DB::table('districts')->where('division_id',$id)->get();
        return response()->json($district);
    }

    public function getDistrict($id){
        $district=DB::table('districts')->where('division_id',$id)->get();
        return response()->json($district);
    }
}
