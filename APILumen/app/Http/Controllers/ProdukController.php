<?php

namespace App\Http\Controllers;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function tampildata()
    {
        try{
            $query = Produk::all();
            $result['success'] = true;
            $result['data'] = $query;
            $result['count'] = $query->count();
            return response($result, 200);
        }
        catch(\Illuminate\Database\QueryException $exception){
            $result['success'] = false;
            $result['message'] = $exception->getMessage();
            return response($result, 500);
        }
    }

    public function detail($id) 
    {
        try {
            // cara panjang
            // $query = DB::table('masterbarang')
            // ->select('masterbarang.*')
            // ->where('kode_barang', '=', $kode_barang)
            // ->get();


            // cara simple get dalam satu baris
            $query = Produk::where('id', $id)->first();

            // get nama barang aja berdasarkan kode_barang
            // $query = MasterBarang::select('masterbarang.nama_barang')->where('kode_barang', $kode_barang)->first();

            // get semua data baran tp namanya aja
            // $query = MasterBarang::select('masterbarang.nama_barang')->get();

            // sama dengan select*from masterbarang where id=$id
            // $query = MasterBarang::find(1);

            $result['success'] = true;
            $result['data'] = $query;
            return response($result, 200);

        } catch(\Illuminate\Database\QueryException $exception) {
            $result['success'] = false;
            $result['message'] =$exception->getMessage();
            return response($result, 500);
        }
    }

    public function save(Request $request)
    {
        try{
            $query = Produk::create([
                'nama' => $request->input('nama'),
                'stok' => $request->input('stok'),
                'harga' => $request->input('harga')
            ]);
            $result['success'] = true;
            return response($result, 200);
        }
        catch(\Illuminate\Database\QueryException $exception){
            $result['success'] = false;
            $result['message'] = $exception->getMessage();
            return response($result, 500);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $query = Produk::find($id);
            if ($query) {
                $query->nama = $request->input('nama');
                $query->stok = $request->input('stok');
                $query->harga = $request->input('harga');
                $query->save();

                $result['success'] = true;
                return response($result, 200);
            } else {
                $result['success'] = false;
                return response($result, 500);
            }
        }
        catch(\Illuminate\Database\QueryException $exception){
            $result['success'] = false;
            $result['message'] = $exception->getMessage();
            return response($result, 500);
        }
    }

    public function delete($id)
    {
        try {
            // jika primarykey menggunakan id
            $query = Produk::find($id);

            // jika tidka menggunakan id sebagai primary key
            // $query = MasterBarang::where("kode_barang",$kode_barang)->first();
            if ($query) {
                $query->delete();
                $result['success'] = true;
                return response($result, 200);
            } else {
                $result['success'] = false;
                return response($result, 500);
            }

        } catch(\Illuminate\Database\QueryException $exception) {
            $result['success'] = false;
            $result['message'] =$exception->getMessage();
            return response($result, 500);
        } 
    }

    //
}
