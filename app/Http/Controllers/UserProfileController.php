<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserProfileController extends Controller
{
    function user_profile(){
        return view('admin.user.user_profile');
    }

    function profile_photo_update(Request $request){
        $request->validate([
            'photo'=>'required',
        ]);
        if(Auth::user()->photo == null){
            $photo = $request->photo;
            $extension = $photo->extension();
            $file_name = Auth::id().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/user/'.$file_name));
    
            User::find(Auth::id())->update([
                'photo'=>$file_name,
            ]);
            return back()->with('updated','Photo Added Successfully');
        }
        else{
            $user_info = User::find(Auth::id());
            $delete_form = public_path('uploads/user/'.$user_info->photo);
            unlink($delete_form);

            $photo = $request->photo;
            $extension = $photo->extension();
            $file_name = Auth::id().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/user/'.$file_name));

            User::find(Auth::id())->update([
                'photo'=>$file_name,
            ]);
            return back()->with('updated','Photo Update Successfully');
        }
    }

    function profile_information(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);
        User::find(Auth::id())->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'update_at'=>Carbon::now(),
        ]);
        return back()->with('updated','Name Update Successfull');
    }

    function profile_password(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required',
            'password'=>['required','confirmed',Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'password_confirmation'=>'required',
        ]);

        $user = User::find(Auth::id());
        if(Hash::check($request->current_password,$user->password)){
            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password),
            ]);
            return back()->with('updated','Password Update Successfull'); 
        }
    }

    function users_list(){
        $users = User::where('id','!=',Auth::id())->latest()->get();
        return view('admin.user.users_list',[
            'users'=>$users,
        ]);
    }

    function user(){
        return view('admin.user.user');
    }

    function user_store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>['required',Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
        ],
        ]);

        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Add new user successfully');
    }

    function user_delete($id){
        $users = User::find($id);
        if($users->photo == null){
            User::find($id)->delete();
            return back();
        }
        else{
            $delete_form = public_path('uploads/user/'.$users->photo);
            unlink($delete_form);
    
            User::find($id)->delete();
            return back();
        }
    }
}
