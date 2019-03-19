<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::all();
        return view('admin.kategori',compact('kategori'));
    }
    public function tambah(Request $req){

        $req->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $url = str_slug($req->nama . $req->deskripsi, "-");
        // arent_id', 'name', 'deskription','url','status',
        $kategori = kategori::create(
            [
                'name' => $req->nama,
                'parent_id' => $req->parent_id,
                'description' => $req->deskripsi,
                'url' => $url,
                'status' => 1,
            ]);
        // return $kategori;
    	return redirect(route('kategori'))->with('success', ['Kategori Telah Ditambahkan']);
    }
    public function edit(Request $req,$id){

        $req->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $url = str_slug($req->nama . $req->deskripsi, "-");

        $data=[
                'name' => $req->nama,
                'parent_id' => $req->parent_id,
                'description' => $req->deskripsi,
                'url' => $url,
                'status' => 1,
            ];
        $edit = kategori::where('id', $id)->update($data);
        
        
        // return $kategori;
    	return redirect(route('kategori'))->with('success', ['Kategori Telah Diedit']);
    }
    public function hapus(Request $req,$id){
        // return $id;
        $kategori =  kategori::find($id);
        $kategori->delete();
        return redirect(route('kategori'))->with('success', ['Kategori Telah Dihapus']);
   
    }
}
