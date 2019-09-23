<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index(){
        $pesan=DB::table('cart')->join('masakan', 'cart.id_makanan', '=', 'masakan.id_masakan')->get();
        return view('pesanan',['pesan'=>$pesan]);
    }
}
