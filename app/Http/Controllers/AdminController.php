<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Company;
use App\Models\Jobs;
use App\Models\News;
use Illuminate\Support\Facades\Session;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    //
    public function index(){
        $company = Company::all()->count();
        $news = News::all()->count();
        $jobs = Jobs::all()->where('STATUS', 1)->count();
        $jobsWait = Jobs::all()->where('STATUS', 0)->count();
        $UV = User::all()->where('ROLE_ID', 3)->count();
        $NTD = User::all()->where('ROLE_ID', 2)->count();
        $count = [$company, $news, $jobs, $jobsWait, $UV, $NTD];
        $title = 'Trang chủ';
        return view('Admin.index')->with('title', $title)->with('count', $count);
    }
    //CRUD Company
    public function getListCompany(){
        $companies = Company::all();
        $title = 'Danh mục công ty';
        return view('Admin.Company.getListCompany', ['companies' => $companies])->with('title', $title);
    }

    public function create(){
        $title = 'Thêm công ty';
        return view('Admin.Company.insertCompany')->with('title', $title);
    }
    public function store(Request $request){
        $company = new Company();
        $company->name = $request->name;
        $company->slogan = $request->slogan;
        $company->info = $request->info;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->logo = $request->logo;
        $company->link = $request->link;
        $company->save();
        Session::flash('message', 'Thêm công ty thành công');
        return redirect('/admin/listCompany');
    }
    public function editFormCompany($id){
        $companies = Company::all()->where('COMPANY_ID', $id);
        $title = 'Chỉnh sửa công ty';
        return view('Admin.Company.editCompany', ['companies' => $companies])->with('title', $title);
    }
    public function editCompany(Request $request, $id){

        $company = Company::where('COMPANY_ID', $id)->first();
        $company->NAME = $request->name;
        $company->SLOGAN = $request->slogan;
        $company->INFO = $request->info;
        $company->ADDRESS = $request->address;
        $company->PHONE = $request->phone;
        if($company->LOGO = null){
            $company->LOGO = $request->logo;
        }else{
            $company->LOGO = $request->lg;
        }
        $company->LINK = $request->link;
        $company->save();
        Session::flash('message', 'Chỉnh sửa công ty thành công');
        return redirect('admin/listCompany');
    }
    public function destroy(Company $company){
        $company->delete();
        Session::flash('message', 'Xóa công ty thành công');
        return redirect('admin/listCompany');
    }

    //CRUD News
    public function getListNews(){
        $news = News::all();
        $title = 'Danh mục tin tức';
        return view('Admin.News.getListNews', ['news' => $news])->with('title', $title);
    }
    public function createNews(){
        $companies = Company::all();
        $title = 'Thêm tin tức';
        return view('Admin.News.insertNews', ['companies' => $companies])->with('title', $title);
    }
    public function storeNews(Request $request){
        $news = new News();
        $news->NAME = $request->name;
        $news->COMPANY_ID = $request->tencongty;
        if($news->LOGO = null){
            $news->LOGO = $request->logo;
        }else{
            $news->LOGO = $request->lg;
        }
        $news->LINK = $request->link;
        $news->CONTENT = $request->content;
        $news->save();
        Session::flash('message', 'Thêm tin tức thành công');
        return redirect('admin/listNews');
    }
    public function editFormNews($id){
        $news = News::all()->where('NEWS_ID', $id);
        $title = 'Chỉnh sửa tin tức';
        return view('Admin.News.editNews', ['news' => $news])->with('title', $title);
    }
    public function editNews(Request $request, $id){
        $news = News::where('NEWS_ID', $id)->first();
        $news->NAME = $request->name;
        $news->CONTENT = $request->content;
        $news->LOGO = $request->logo;
        $news->LINK = $request->link;
        $news->save();
        Session::flash('message', 'Chỉnh sửa tin tức thành công');
        return redirect('admin/listNews');
    }
    public function destroyNews(News $news){
        $news->delete();
        Session::flash("message", "Bạn đã xóa tin thành công");
        return redirect('/admin/listNews');
    }

    //CRUD Account
    public function getListAccount(){
        $users = User::all();
        $account = 'chung'; 
        $title = 'Danh mục tài khoản'; 
        return view('Admin.Account.account', ['users' => $users])->with('account', $account)->with('title', $title);
    }
    public function getListNTD(){
        $users = User::all()->where('ROLE_ID', 2);
        $account = 'Nhà Tuyền Dụng';  
        $title = 'Danh mục tài khoản Nhà Tuyển Dụng';
        return view('Admin.Account.account', ['users' => $users])->with('account', $account)->with('title', $title);
    }
    public function getListUV(){
        $users = User::all()->where('ROLE_ID', 3);
        $account = 'Ứng Viên';
        $title = 'Danh mục tài khoản Ứng Viên';
        return view('Admin.Account.account', ['users' => $users])->with('account', $account)->with('title', $title);
    }
    public function insertFormAccount(){
        $title = 'Thêm tài khoản';
        return view('Admin.Account.insertAccount')->with('title', $title);
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
        // ]);
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
            $user->PASSWORD = Hash::make($request->password);
            $user->ROLE_ID = $role;
            $user->COMPANY_ID = 1;
            $user->code = 0;
            $user->save();
            Session::flash("message", "Đăng ký thành công");
            return redirect()->back();
        }
        
    }
    public function editFormAccount($id){
        $user = User::all()->where('USER_ID', $id);
        $title = 'Chỉnh sửa tài khoản';
        return view('Admin.Account.editAccount', ['user' => $user])->with('title', $title);
    }
    public function editAccount(Request $request, $id){
        $user = User::where('USER_ID', $id)->first();
        $user->NAME = $request->name;
        $user->ADDRESS = $request->address;
        $user->PHONE = $request->phone;

        $user->save();
        return redirect('admin/listAccount');
    }
    public function destroyAccount(User $user){
        $user->delete();
        Session::flash('message', 'Xóa tài khoản thành công');
        return redirect()->back();
    }

    public function listJobs(){
        $jobs = Jobs::all()->where('STATUS', 1);
        $title = 'tin tuyển dụng';
        return view('admin.Jobs.listJobs', ['jobs' => $jobs], ['title' => $title]);
    }
    public function listJobsWait(){
        $jobs = Jobs::all()->where('STATUS', 0);
        $title = 'tin chờ duyệt';
        return view('admin.Jobs.listJobs', ['jobs' => $jobs], ['title' => $title]);
    }
    public function acceptJob($id){
        $job = Jobs::all()->where('JOB_ID', $id)->first();
        $job->STATUS =1;
        $job->Save();
        return redirect('/admin/listJobs') ;
    }
    public function deleteJob(Jobs $job){
        $status = $job->STATUS;
        $job->delete();
        if($status == 1){
            return redirect('/admin/listJobs');
        }
        return redirect('/admin/listJobsWait');
    }
    public function formUpdate(){
        $title = 'Mẫu đăng tin';
        return view('admin.formUpdate')->with('title', $title);
    }
}
