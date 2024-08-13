<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use Spatie\GoogleCalendar\Event;

class mailController extends Controller
{
    
    public function forgotPassword(){
        $id = Auth::id();
        $user = User::all()->where('USER_ID', $id);
        $title = "Khôi phục mật khẩu";
        return view('info.forgotPassword' , ['user'=> $user])->with('title', $title);
    }
    public function postEmail(Request $request)
    {
        $email = $request->get('email');
        $request->validate([
            "email" => ["required", "email", "exists:users,email"]
        ], [
            "email.required" => "Vui lòng nhập email vào",
            "email.email" => "Email không đúng định dạng",
            "email.exists" => "Email không tồn tại"
        ]);
        if (!empty($request)) {
            $user = User::where("email", '=', $email)->first();
            $code =  (string)time();
            $user->code = $code;
            $user->save();
            $mail = new PHPMailer(true);
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            try {

                //code...
                //Server settings
                $mail->SMTPDebug = 2;
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'huyb2111800@student.ctu.edu.vn';                     //SMTP username
                $mail->Password   = 'twlmaovxrhzoupxg';                               //SMTP password
                $mail->Port       = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->setFrom('huyb2111800@student.ctu.edu.vn', 'Mailer');
                $mail->addAddress($email, 'MB');
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Verify Email';
                $mail->Body    = "Your code is $code";
                $mail->send();
                $request->session()->put('emailVerify', $email);
                Session::flash("message", "Mã code đã được gửi");
                return redirect("/vertifyCode");
            } catch (Exception $e) {
                //throw $th;
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
    public function vertifyCode()
    {
        $title = 'Nhập mã xác nhận';
        return view("info.showVertifyCode")->with('title', $title);
    }
    public function postVertifyCode(Request $request)
    {
        $code = $request->code;
        $userCode = User::where('code', $code)->first();
        if ($userCode == null) {
            Session::flash('error', 'Mã code không chính xác');
            return redirect('/vertifyCode');
        } else {
            Session::flash('message', 'Mã code bạn chính xác. Vui lòng nhập mật khẩu mới');
            return redirect("/doiMatKhau");
        }
    }

    public function acceptCV(Request $request){
        $iduser = $request->userid;
        $idjob = $request->jobid;
        $app = Application::all()->where('USER_ID', $iduser)->where('JOB_ID', $idjob)->first();
        $nameuv=$app->NAME;
        DB::statement('UPDATE APPLICATIONS SET STATUS = 1 WHERE USER_ID = ? AND JOB_ID = ?' , [$request->userid, $request->jobid]);
        $app->save();
        $user = User::find($iduser);
        $name = $user->NAME;
        $email = $user->EMAIL;
        $job = Jobs::find($idjob);
        
        $emailCompany = $job->EMAIL;

        $currentDate = Carbon::now();

        $newDate = $currentDate->addDay();

        $date = $currentDate->format('d/m/Y');

        


        Mail::send('emails.acceptCV', compact('nameuv', 'job', 'date'), function(Message $message) use($email, $name){
            $message->subject('Hẹn phỏng vấn');
            $message->to($email);
        });

        Mail::send('emails.acceptCVforCompany', compact('nameuv', 'job', 'user', 'date'), function(Message $message) use($emailCompany, $name){
            $message->subject('Hẹn ứng viên');
            $message->to($emailCompany);
        });
        
        Session::flash('message', 'Đã gửi email phỏng vấn');
        return redirect()->back();
    }
}
