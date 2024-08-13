<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Application;
use App\Models\Company;
use App\Models\Jobs;
use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\GoogleCalendar\Event;

class UngVienController extends Controller
{
    public function index(){
        $jobs = Jobs::all()->where('STATUS', 1);
        $jobs = Jobs::paginate(5);
        $title= 'Trang chủ';
        $search= ['','',''];
        return view('index', ['jobs' => $jobs], ['title' => $title])->with('search', $search);
    }
    public function detailJob($id){
        $job = Jobs::find($id);
        $user = User::all()->where('USER_ID',$job->USER_ID )->first();
        $company = Company::all()->where('COMPANY_ID', $user->COMPANY_ID)->first();
        $title= 'Chi tiết công việc';
        return view('UngVien.detail', ['job' =>$job], ['user' =>$user])->with('company', $company)->with('title', $title);
    }
    public function companyShow(){
        $companies = Company::all();
        $title= 'Công ty thành viên';
        return view('UngVien.company', ['companies' => $companies], ['title' => $title]);
    }
    public function newsShow(){
        $news = News::all();
        $title= 'Tin tức';
        return view('UngVien.news', ['news' => $news], ['title' => $title]  );
    }
    public function applyForm($id){
        $name = Jobs::find($id)->NAME;
        $idJob = Jobs::find($id)->JOB_ID;
        $title= 'Ứng tuyển';
        return view('UngVien.applyForm', ['name' => $name], ['id' =>$idJob])->with('title', $title);
    }
    public function apply(Request $req ,$id){
        if($req->has('file_upload')){
            $CV = $req->file_upload;
            $ext = $req->file_upload->extension();
            $CV_name = time().'-'.'CV.'.$ext;
            $CV->storeAs('uploadCV', $CV_name);
            $req->merge(['cv' => $CV_name]);
        }
        $app = new Application();
        $idUser = Auth::id();
        $check = Application::all()->where('JOB_ID', $id)->where('USER_ID', $idUser)->first();

        if($check != null){
            return redirect()->back()->with(['error' => 'Bạn đã nộp CV vào công việc này rồi!']);
        }
        $currentDateTime = Carbon::now();
        $app->JOB_ID = $id;
        $app->USER_ID = $idUser;
        $app->NAME = $req->name;
        $app->THOIGIAN = $currentDateTime;
        if($req->note == 'Ghi chú thêm cho nhà tuyển dụng'){
            $app->NOTE = '';
        }else{
            $app->NOTE = $req->note;
        }
        
        $app->STATUS = 0;
        $app->CV = $req->cv;
        $app->save();
        return redirect('/listCV/'.$idUser)->with(['success', 'Nộp CV thành công'], ['id', $idUser]);
        
    }
    public function getListCV($id){
        $applications = Application::all()->where('USER_ID', $id);
        $title = 'Danh sách CV';
        return view('UngVien.listCV', ['applications' => $applications])->with('title', $title);
    }
    public function deleteCV(Request $request){
        DB::statement('DELETE FROM APPLICATIONS WHERE USER_ID = ? AND JOB_ID = ?' , [$request->userid, $request->jobid]);
        Session::flash('message', 'Xóa CV thành công');
        return  redirect('/listCV/'.$request->userid);
    }

}
