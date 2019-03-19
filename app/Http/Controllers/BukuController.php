<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\buku;

class BukuController extends Controller
{
    public function index()
    {
        $buku = buku::all();
        return view('admin.buku',compact('buku'));
    }
    public function tambah(Request $req){

        $req->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $url = str_slug($req->nama . $req->deskripsi, "-");
        // arent_id', 'name', 'deskription','url','status',
        $buku = buku::create(
            [
                'title' => $req->nama,
                'parent_id' => $req->id,
                'description' => $req->deskripsi,
                'author' =>  $req->author,
                'publisher' =>  $req->publisher,
                'stock' =>  $req->stock,
                'status' => 1,
                'slug' => $url,
                'cover' => "",
                'price' => $req->price,
                'created_by' => "",
                'updated_by' => "",
                'deleted_by' => "",
                'created_at' => "",
                'updated_at' => "",
                'deleted_at' => "",
            ]);
        // return $buku;
    	return redirect(route('buku'))->with('success', ['Buku Telah Ditambahkan']);
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
        $edit = buku::where('id', $id)->update($data);
        
        
        // return $buku;
    	return redirect(route('buku'))->with('success', ['Buku Telah Diedit']);
    }
    public function hapus(Request $req,$id){
        // return $id;
        $buku =  buku::find($id);
        $buku->delete();
        return redirect(route('buku'))->with('success', ['Buku Telah Dihapus']);
   
   
      }
    }

