<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasakanController extends Controller
{
    
    public function index(){
        $masakan = DB::table('masakan')->join('status_masakan', 'masakan.id_status', '=', 'status_masakan.id_status')->paginate(10);
        return view('masakan.index',['masakan'=>$masakan]);
    }

    public function tambah(){
        return view('masakan/tambah');
    }

    public function store(Request $request){
        DB::table('masakan')->insert([
            'masakan' => $request->masakan,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'id_status' => $request->id_status
        ]);
        $request->session()->flash('notifadd',' Data Masakan Ditambahkan! ');
        return redirect('/masakan');
    }

    public function hapus(Request $req, $id){
        DB::table('masakan')->where('id_masakan',$id)->delete();
        $req->session()->flash('notifdelete', 'Data Masakan dihapus!');
        return redirect('/masakan');
    }

    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $masakan = DB::table('masakan')->join('status_masakan', 'masakan.id_status', '=', 'status_masakan.id_status')
        ->where('kategori','like',"%".$cari."%")
        ->paginate(10);

        // mengirim data pegawai ke view index
        return view('masakan.index',['masakan'=> $masakan]);
    }

    public function edit($id){
        $masakan = DB::table('masakan')->where('id_masakan',$id)->get();
        return view('masakan.index',['masakan'=>$masakan]);
    }

    public function update(Request $req){
        DB::table('masakan')->where('id_masakan',$req->id)->update([
            'masakan' => $req->masakan,
            'kategori' => $req->kategori,
            'harga' => $req->harga,
            'id_status' => $req->status,
        ]);
        $req->session()->flash('notifedit', 'Data Berhasil Diubah');
        return redirect('/masakan');
    }
    
}
