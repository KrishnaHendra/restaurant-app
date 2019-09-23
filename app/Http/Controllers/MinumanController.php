<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinumanController extends Controller
{
    public function index(){
        $minuman = DB::table('minuman')->join('status_masakan', 'minuman.id_status', '=', 'status_masakan.id_status')->paginate(10);
        return view('minuman.index',['minuman'=>$minuman]);
    }

    public function store(Request $request){
        DB::table('minuman')->insert([
            'minuman' => $request->nama,
            'harga' => $request->harga,
            'id_status' => $request->status
        ]);
        $request->session()->flash('notifadd',' Data Minuman Ditambahkan! ');
        return redirect('/minuman');
    }

    public function hapus(Request $req, $id){
        DB::table('minuman')->where('id_minuman',$id)->delete();
        $req->session()->flash('notifdelete', 'Data Minuman dihapus!');
        return redirect('/minuman');
    }
}
