<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\CustomerEmailVatify;
use App\Notifications\EmailVerifyNotification;
use Illuminate\Support\Facades\Notification;

class CustomerAuthController extends Controller
{
    function customer_login(){
        return view('frontend.customer.customer_login');
    }

    function customer_register(){
        return view('frontend.customer.customer_register');
    }

    function customer_store(Request $request){
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'password'=>['required','confirmed',Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'password_confirmation'=>'required',
        ]);
        $customer_info = Customer::create([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
        ]);
        CustomerEmailVatify::where('customer_id',$customer_info->id)->delete();
        $info = CustomerEmailVatify::create([
            'customer_id'=>$customer_info->id,
            'token'=>uniqid(),
            'created_at'=>Carbon::now(),
        ]);
        Notification::send($customer_info, new EmailVerifyNotification($info));
        return back()->with('success','Your registation successfull please veryfy your email');
    }

    function customer_logged(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            'captcha' => 'required|captcha',
        ]);

        if(Customer::where('email',$request->email)->exists()){
            if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if(Auth::guard('customer')->user()->email_verified_at == null){
                    return redirect()->route('customer.login')->with('email_varify','please your email varify first');
                }
                else{
                    return redirect()->route('index')->with('loggin','Your Registation Successfull');
                }
            }
            else{
                return back()->with('wrong',"password doesn't exists");
            }
        }
        else{
            return back()->with('wrong','Email does not match');
        }
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    
    function customer_email_varify($token){
        if(CustomerEmailVatify::where('token',$token)->exists()){
            $varify_info = CustomerEmailVatify::where('token',$token)->first();

            Customer::find($varify_info->customer_id)->update([
                'email_verified_at'=>Carbon::now(),
            ]);
            CustomerEmailVatify::where('token',$token)->delete();
            return redirect()->route('customer.login')->with('verify','Email varify successfull');
        }
        else{
            abort('404');
        }
    }

    function email_varification_reset(){
        return view('frontend.password_reset.email_varification_reset');
    }

    function email_resed_request(Request $request){
        $customer = Customer::where('email',$request->email)->first();
        if(Customer::where('email',$request->email)->exists()){
            CustomerEmailVatify::where('customer_id',$customer->id)->delete();
            $info = CustomerEmailVatify::create([
                'customer_id'=>$customer->id,
                'token'=>uniqid(),
                'created_at'=>Carbon::now(),
            ]);
            Notification::send($customer, new EmailVerifyNotification($info));
            return back()->with('success','we have send your varification link, please verify your email');
        }
        else{
            return back()->with('noexists','Email does not exists');
        }
    }
}
