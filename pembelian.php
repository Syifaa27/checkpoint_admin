<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modelPembelian;
use App\modelBarang;
use Validator;
class pembelian extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = modelPembelian::all();
        //return view('contact', compact('data'));
        return view('pembelian', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = modelBarang::all();
        return view('pembelian_create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'id'=> 'required',
            'kd_barang'=> 'required',
            'jumlah'=> 'required',
            'total_harga'=> 'required',
        ]);
            //ini yang menambah data pembelian
        $data = new modelPembelian();
        $data->id = $request->id;
        $data->kd_barang = $request->kd_barang;
        $data->jumlah = $request->jumlah;
        $data->total_harga = $request->total_harga;
        $data->save();

        //ini merubah data dari controller barang
        $databeli = modelBarang::where('kd_barang',$request->kd_barang)->first();
            // x = x-1;
        $databeli->stok = $databeli->stok + $request->jumlah;
        $databeli->save();

        //ini merubah stok pembelian
        return redirect()->route('pembelian.index')->with('alert_message', 'Berhasil menambah data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = modelPembelian::where('id', $id)->get();
        return view('pembelian_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id'=> 'required',
            'kd_barang'=> 'required',
            'jumlah'=> 'required',
            'total_harga'=> 'required',
        ]);

        $data = modelPembelian::where('id', $id)->first();
        $data->id = $request->id;
        $data->kd_barang = $request->kd_barang;
        $data->jumlah = $request->jumlah;
        $data->total_harga = $request->total_harga;
        $data->save();

        return redirect()->route('pembelian.index')->with('alert_message', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = modelPembelian::where('id', $id)->first();
        $data->delete();
        return redirect()->route('pembelian.index')->with('alert_,message', 'Berhasil menghapus data!');
    }
}
