<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){

    	$countries = DB::table('country')->get();
    	return view('FrontEnd.pages.home', ['countries' => $countries]);
    }

    public function get_cricketer($cid){

        $result = DB::table('cricketer')
                  ->where('country_id',$cid)
                  ->get();
        return response()->json($result);  
    }

    public function get_crinfo($crid){

        $result = DB::table('cricketer_detail')
                  ->join('cricketer', 'cricketer_detail.cricketer_id', '=', 'cricketer.cricketer_id')
                  ->select('cricketer_detail.*', 'cricketer.cricketer_name')
                  ->where('cricketer_detail.cricketer_id',$crid)
                  ->first();
        return response()->json($result);  
    }

    public function get_cr_one_info($cr_one_id){

        $result = DB::table('cricketer')
                  ->join('country', 'cricketer.country_id', '=', 'country.country_id')
                  ->select('cricketer.*', 'country.country_name')
                  ->where('cricketer.country_id',$cr_one_id)
                  ->get();
        return response()->json($result);
    }
}
