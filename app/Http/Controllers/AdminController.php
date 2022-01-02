<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $min = User::min('annual_income');
        $max = User::max('annual_income');
        
        return view('admin.dashboard',compact('min','max'));
    }

    public function userdata(Request $request){
        $gender = $request->gender;
        $family_type = $request->family_type;
        $manglik = $request->manglik;
        $min_annual = $request->min_annual;
        $max_annual = $request->max_annual;
        $report = 1;
        if(empty($min_annual) && empty($max_annual)){
            $min_annual = 0;
            $max_annual = 150000;
        }
        
        $user = User::where('gender',$gender)
                        ->where('family_type',$family_type)
                        ->where('manglik',$manglik)
                        ->whereBetween('annual_income',[$min_annual, $max_annual])
                        ->get();

        return datatables()->of($user)
                           ->make(true);
    }
}
