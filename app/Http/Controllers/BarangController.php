<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Barang::all();
        return view('barang.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_nama' => 'bail|required|unique:tb_barang',
            'barang_harga' => 'required'
            ],
            [
                'barang_nama.required' => 'Nama Barang wajib diisi',
                'barang_nama.unique' => 'Nama Barang sudah ada',
                'barang_harga.required' => 'Harga wajib diisi'
            ]);

            Barang::create([
                'barang_nama' => $request->barang_nama,
                'barang_harga' => $request->barang_harga,
                'barang_stok' => $request->barang_stok
                ]);
                
                return redirect('barang');
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
        $row = Barang::findOrFail($id);
        return view('barang.edit', compact('row'));
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
        $request->validate(
            [
            'barang_nama' => 'bail|required',
            'barang_harga' => 'required'
            ],
            [
            'barang_nama.required' => 'Nama Barang wajib diisi',
            'barang_harga.required' => 'Harga Barang wajib diisi'
            ]
            );

            $row = Barang::findOrFail($id);
            $row->update([
            'barang_nama' => $request->barang_nama,
            'barang_harga' => $request->barang_harga,
            'barang_stok' => $request->barang_stok
            ]);

            return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Barang::findOrFail($id);
        $row->delete();

        return redirect('barang');
    }
}
