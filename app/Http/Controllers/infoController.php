<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class infoController extends Controller
{
    
    public function profile(){
        $id = Auth::id();
        $user = User::find($id);
        $company = Company::where('COMPANY_ID',$user->COMPANY_ID)->first();
        $company = $company->NAME;
        $title = 'Thông tin cá nhân';
        return view('info.profile', ['user' => $user], ['company' => $company])->with('title', $title);
    }
    public function editFormProfile(){
        $id = Auth::id();
        $user = User::find($id);
        $com = Company::all();
        $title = 'Chỉnh sửa thông tin';
        return view('info.editProfile',  ['user' =>$user])->with('com', $com)->with('title', $title);
    }
    public function editProfile(Request $req){
        if($req->has('file_upload')){
            $avatar = $req->file_upload;
            $ext = $req->file_upload->extension();
            $avatar_name = time().'-'.'avatar.'.$ext;
            $avatar->move(public_path('uploadAvatar'), $avatar_name);
            $req->merge(['avatar' => $avatar_name]);
        }

        $id = Auth::id();
        $user = User::where('USER_ID', $id)->first();
        $user->NAME = $req->name;
        $user->PHONE = $req->phone;
        $user->ADDRESS = $req->address;
        if($req->avatar != null){
            $user->AVATAR = $req->avatar;
        }else{
            $user->AVATAR = $req->avatardb;
        }
        
        $user->save();
        Session::flash("message", "Cập nhật thông tin thành công");
        return redirect('/profile');
    }
    public function changeFormPassword(){
        $id = Auth::id();
        $user = User::find($id);
        $title = 'Đổi mật khẩu';
        return view('info.changePassword', ['user'=> $user])->with('title', $title);
    }
    public function changePassword(Request $request)
    {

        $formField = $request->validate([
            "password" => ["required", "min:5", "confirmed"],
        ], [
            "password.required" => "Vui lòng nhập mật khẩu mới",
            "password.min" => "Mật khẩu có tối thiểu 5 ký tự",
            "password.confirmed" => "Mật khẩu không khớp với nhau"
        ]);
        $formField['password'] = bcrypt($formField['password']);
        $email = $request->session()->pull('emailVerify');
        User::where('email', '=', $email)->update(['password' => $formField['password'], 'code' => "0"]);
        Session::flash("message", "Thay đổi mật khẩu thành công");
        return redirect('/');
    }
    
}
