<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //
    public function showLogin(){
        return view('Auth.login');
    } 
    public function showRegister(){
        return view('Auth.Register');
    }

    public function login(Request $request)
    {
        $data = [
            'EMAIL' => $request->email,
            'password' => $request->password,
        ];
        $remember = false;
        if (!empty($request->get('rememberMe'))) $remember = true;
        if (Auth::attempt($data, $remember)) {
            $request->session()->regenerate();
            Session::flash("message", "Bạn đã đăng nhập thành công");
            if(Auth::user()->ROLE_ID==1){
                return redirect("/admin");
            }
            if(Auth::user()->ROLE_ID==2){
                return redirect("/NhaTuyenDung");
            }
            return redirect("/");
        }
        return back()->withErrors(['email' => "Tài khoản hoặc mật khẩu của bạn không đúng"])->onlyInput('email');
    }
    public function register(Request $request){
        // $request->validate([
        //     "name" => ["required", "min:3"],
        //     "email" => ["required", "email", Rule::unique("users", "email")],
        //     "password" => ["required", "min:5", "confirmed"]
        // ], [
        //     "name.required" => "Vui lòng nhập họ và tên",
        //     "name.min" => "Họ tên tối thiểu 3 ký tự",
        //     "email.required" => "Vui lòng nhập email",
        //     "email.email" => "Email không đúng định dạng",
        //     "email.unique" => "Email đã tồn tại",
        //     "password.required" => "Vui lòng nhập mật khẩu",
        //     "password.min" => "Mật khẩu có tối thiểu 5 ký tự",
        //     "password.confirmed" => "Mật khẩu không khớp"        ]);
         $role = 0;
        if($request->account == 'NTD'){
            $role = 2;
        }else{
           $role = 3;
        }
        $check = User::all()->where('EMAIL', $request->email)->first();
        if($check != null){
            Session::flash("error", "Email đã tồn tại");
            return redirect()->back();
        }else{
            $user = new User();
            $user->NAME = $request->name;
            $user->EMAIL = $request->email;
            $email = $request->email;
            $user->PASSWORD = Hash::make($request->password);
            $user->ROLE_ID = $role;
            $user->COMPANY_ID = 1;
            $code = rand(0000, 9999);
            $user->code = $code;
            $user->save();
            auth()->login($user);
            Mail::send('emails.emailCode', compact('code'), function(Message $message) use($email){
                $message->subject('Xác thực email');
                $message->to($email);
            });
            return redirect('/verifyEmail');
        }   
    }

    public function verifyEmail(){
        $title = "Xác thực email";
        return view('Auth.verifyEmail', compact('title'));
    }
    public function postVerifyEmail(Request $request){
        $user = User::where('EMAIL', $request->email)->first();
        if($request->code == $user->code){
            Session::flash("message", "Bạn đã đăng ký thành công");
            return redirect('/');
        }else{
            $user->delete();
            Session::flash("error", "Email bạn không tồn tại");
            return redirect('/register');
        }
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
