<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class CobaController extends Controller
{
   public function index(){
        $dashboard = DB::table('pelanggan')->get();
        return view('coba/index',['pelanggan'=>$dashboard]);
   }

    public function table(){
        $pelanggan = DB::table('pelanggan')->paginate(10);
        return view('coba/table',['pelanggan'=>$pelanggan]);
    }

    public function about(){
        return view('coba/about');
    }

    public function grafik(){
        return view('coba/grafik'); 
    }

}
