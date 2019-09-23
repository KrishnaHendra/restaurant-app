<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function pesan(Request $request){
        DB::table('cart')->insert([
            'id_makanan' => $request->makanan,
            'jumlah' => $request->jumlah,
            'no_meja' => $request->no_meja
        ]);
        $request->session()->flash('notifadd',' Pesanan Telah Ditambahkan! ');
        return redirect('/customer');
    }
}
