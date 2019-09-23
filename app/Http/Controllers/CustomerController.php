<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(){
        $masakan = DB::table('masakan')->join('status_masakan', 'masakan.id_status', '=', 'status_masakan.id_status')->get();
        return view('customer.index',['masakan'=>$masakan]);
    }
}
