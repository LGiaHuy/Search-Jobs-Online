<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImports;
use App\Models\Application;
use App\Models\Company;
use App\Models\User;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Worksheet\SheetView;




class NhaTuyenDungController extends Controller
{
    //
    public function index(){
        $id = Auth::id();
        $quantityJobs = Jobs::all()->where('USER_ID', $id)->where('STATUS', 1)->count();
        $quantityJobsWait = Jobs::all()->where('USER_ID', $id)->where('STATUS', 0)->count();
        $count=0;
        // $Jobs = Jobs::all()->select('USER_ID', 'JOB_ID')->where('USER_ID', $id);
        $count = DB::table('JOBS')->join('APPLICATIONS', 'JOBS.JOB_ID', '=', 'APPLICATIONS.JOB_ID')->select('JOBS.USER_ID', 'JOBS.JOB_ID')->where('JOBS.USER_ID', $id)->get()->count();
        $title = 'Trang chủ';
        return view('NhaTuyenDung.index', ['quantityJobs'=> $quantityJobs], ['quantityJobsWait'=>$quantityJobsWait])->with('title', $title)->with('count', $count);
    }
    public function showFormPostJob(){
        $title = 'Đăng tin';
        return view('NhaTuyenDung.postJob')->with('title', $title);
    }
    public function postJob(Request $request){

        if($request->has('file_upload')){
            $logo = $request->file_upload;
            $ext = $request->file_upload->extension();
            $logo_name = time().'-'.'logo.'.$ext;
            $logo->move(public_path('uploadLogo'), $logo_name);
            $request->merge(['logo' => $logo_name]);
        }
        $id = Auth::id();
        $job = new Jobs();
        $job->USER_ID = $id;
        $job->NAME = $request->name;
        $job->COMPANY = $request->company;
        $job->EMAIL = $request->email;
        $job->SALARY = $request->salary;
        $job->POSITION = $request->position;
        $job->EXPERIENCE = $request->ex;
        $job->DESCRIPTIONS = $request->des;
        $job->BENEFIT = $request->ben;
        $job->REQUIREMENTS = $request->req;
        $job->TIME = $request->time;
        $job->ADDRESS = $request->address;
        $job->LOGO = $request->logo;
        $job->LINK = $request->link;
        $job->save();
        Session::flash("message", "Đăng tin thành công");
        return redirect('/NhaTuyenDung/listJob');    
        
    }
    public function getListJob(){
        $id = Auth::id();
        $jobs = Jobs::all()->where('STATUS', 1)->where('USER_ID', $id);
        $title = "Bài đăng tuyển dụng";
        return view('NhaTuyenDung.listJob', ['jobs' => $jobs])->with('title', $title);
    }
    public function getListJobWait(){
        $id = Auth::id();
        $jobs = Jobs::all()->where('STATUS', 0)->where('USER_ID', $id);
        $title = "Bài đăng chờ duyệt";
        return view('NhaTuyenDung.listJob', ['jobs' => $jobs])->with('title', $title);
    }
    public function editFormJob($id){
        $job = Jobs::all()->where('JOB_ID', $id);
        $title = 'Chỉnh sửa công việc';
        return view('NhaTuyenDung.editJob', ['job' => $job])->with('title', $title);
    }
    public function editJob(Request $request ,$id){
        $job = Jobs::where('JOB_ID', $id)->first();
        if($request->has('file_upload')){
            $logo = $request->file_upload;
            $ext = $request->file_upload->extension();
            $logo_name = time().'-'.'logo.'.$ext;
            $logo->move(public_path('uploadLogo'), $logo_name);
            $request->merge(['logo' => $logo_name]);
        }
        $job->NAME = $request->name;
        $job->COMPANY = $request->company;
        $job->EMAIL = $request->email;
        $job->SALARY = $request->salary;
        $job->POSITION = $request->position;
        $job->EXPERIENCE = $request->ex;
        $job->REQUIREMENTS = $request->req;
        $job->DESCRIPTIONS = $request->des;
        $job->BENEFIT = $request->ben;
        $job->TIME = $request->time;
        $job->ADDRESS = $request->address;
        if($job->LOGO == null){
            $job->LOGO = $request->logo;
        }else{
            $job->LOGO = $request->logodb;
        }
        
        $job->LINK = $request->link;
        $job->save();
        Session::flash("message", "Chỉnh sửa thông tin thành công");
        return redirect('/NhaTuyenDung/listJobWait');    
    }
    public function destroyJob(Jobs $job){
        $job->delete();
        Session::flash("error", "Bạn đã xóa thành công");
        return redirect('/NhaTuyenDung/listJob');
    }
    public function getListUV(){
        $user = Auth::id();
        $title = 'Danh mục công việc';
        $jobs = Jobs::all()->where('USER_ID', $user);
        
        return view('NhaTuyenDung.listUV', ['jobs'=> $jobs])->with('title', $title);
    }
    public function getListCV($id){
        $applications = Application::all()->where('JOB_ID', $id)->where('STATUS', 0);
        $job = Jobs::all()->where('JOB_ID', $id)->first();
        $title = 'Danh mục ứng viên';
        return view('NhaTuyenDung.listCV', ['applications'=> $applications], ['job'=> $job])->with('title', $title);
    }
    public function downloadCV(Request $request){
        $cv = Application::all()->where('USER_ID', $request->userid)->where('JOB_ID', $request->jobid)->first();
        $file = storage_path('/app/uploadCV/'.$cv->CV);
        $ext = pathinfo($cv->CV, PATHINFO_EXTENSION);
        return response()->download($file, $cv->NAME.'-CV.'.$ext);
    }
    public function deleteCV(Request $request){
        DB::statement('DELETE FROM APPLICATIONS WHERE USER_ID = ? AND JOB_ID = ?' , [$request->userid, $request->jobid]);
        Session::flash('message', 'Xóa CV thành công');
        return  redirect()->back();
    }

    public function downloadFormPage(){
        $title = 'Mẫu đăng tin';
        return view('NhaTuyenDung.downloadFormPage')->with('title', $title);
    }
    public function downloadExcel(){
        $file = storage_path('FormPostJob.xlsx');
        return response()->download($file, 'Form.xlsx');
    }
    public function importExcelData(){

        if(isset($_POST['import'])){
            $file = $_FILES['file']['tmp_name'];
            $inputFileName ='test.xlsx';
            move_uploaded_file($file,  $inputFileName);
            $spreadsheet = IOFactory::load($inputFileName);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $arrayCount = count($sheetData);
    
            $id = Auth::id();
            for($i = 2; $i <= $arrayCount; $i++)
            {
                $company = trim($sheetData[$i]["B"]);
                $namejob = trim($sheetData[$i]["A"]);
                $salary = trim($sheetData[$i]["C"]);
                $position = trim($sheetData[$i]["D"]);
                $exp = trim($sheetData[$i]["E"]);
                $des = trim($sheetData[$i]["G"]);
                $req = trim($sheetData[$i]["F"]);
                $ben = trim($sheetData[$i]["H"]);
                $time = trim($sheetData[$i]["I"]);
                $address = trim($sheetData[$i]["J"]);
                $link = trim($sheetData[$i]["K"]);
                $email = trim($sheetData[$i]["L"]);
                
                $job = new Jobs();
                $job->USER_ID = $id;
                $job->NAME = $namejob;
                $job->COMPANY = $company;
                $job->SALARY = $salary;
                $job->POSITION = $position;
                $job->EXPERIENCE = $exp;
                $job->REQUIREMENTS = $req;
                $job->DESCRIPTIONS =$des;
                $job->BENEFIT = $ben;
                $job->TIME = $time;
                $job->ADDRESS = $address;
                $job->EMAIL = $email;
                $job->LINK = $link;
                $job->save();
                Session::flash("message", "Đăng tin thành công");
                return redirect('/NhaTuyenDung/listJob'); 
                
            }
        }
    }
}
