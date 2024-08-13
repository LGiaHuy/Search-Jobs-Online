<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search(Request $request){
        $search = $request->search;
        $jobs = Jobs::where('NAME', 'like', '%' . $search . '%')->paginate(5);
        $title = 'Trang chủ';
        return view('index', ['jobs'=> $jobs])->with('title', $title)->with('search', $search);
    }
    public function searchFilter(Request $request){
        // dd($request->all());
        $time = $request->time;
        $ex = $request->ex;
        $salary = $request->salary;

        // Xây dựng truy vấn dựa trên các thông tin được cung cấp
        $query = Jobs::query();
        
        if($time){
            $query->where('TIME', $time);
        }

        if($ex){
            $query->where('EXPERIENCE', '<', $ex);
        }

        if($salary){
            $query->where('SALARY', '>', $salary);
        }

        $jobs = $query->paginate(5);
        $search = [$time, $ex, $salary];
        $title = 'Trang chủ';
        return view('index', ['jobs'=> $jobs])->with('title', $title)->with('search', $search);
    }
    
}
