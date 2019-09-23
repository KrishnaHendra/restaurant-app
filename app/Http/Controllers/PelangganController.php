<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function tambah(){
        return view('coba/tambah');
    }

    public function store(Request $request){
        DB::table('pelanggan')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->nomor
        ]);
        $request->session()->flash('notifadd',' Data Berhasil Ditambahkan! ');
        return redirect('/table');
    }
    
    public function hapus(Request $req, $id){
        DB::table('pelanggan')->where('id_pelanggan',$id)->delete();
        // $request->session()->flash('notif',' Data Berhasil Dihapus! ');
        // $this->session->set_flashdata('nama','Dihapus!');
        $req->session()->flash('notifdelete', 'Data telah dihapus!');
        return redirect('/table');
    }

    public function edit($id){
        $pelanggan = DB::table('pelanggan')->where('id_pelanggan',$id)->get();
        return view('table',['pelanggan'=>$pelanggan]);
    }

    public function update(Request $req){
        DB::table('pelanggan')->where('id_pelanggan',$req->id)->update([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'no_hp' => $req->nomor,
        ]);
        $req->session()->flash('notifedit', 'Data Berhasil Diubah');
        return redirect('/table');
    }

    public function profile(){
        return view('coba/profile');
    }

    public function cari(Request $request){
        // menangkap data pencarian
		$cari = $request->cari;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $pelanggan = DB::table('pelanggan')
        ->where('nama','like',"%".$cari."%")
        ->paginate(10);

        // mengirim data pegawai ke view index
        return view('coba.table',['pelanggan'=> $pelanggan]);

    }
}
