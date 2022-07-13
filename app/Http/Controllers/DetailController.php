<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Detail::all();
        return view('detail.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detail.create');
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
            'transaksi_id' => 'bail|required|unique:tb_penjualan_detail',
            'barang_id' => 'required'
            ],
            [
                'transaksi_id.required' => 'ID Transaksi wajib diisi',
                'transaksi_id.unique' => 'ID Transaksi sudah ada',
                'barang_id.required' => 'ID Barang wajib diisi'
            ]);

            Detail::create([
                'transaksi_id' => $request->transaksi_id,
                'barang_id' => $request->barang_id,
                'barang_jml' => $request->barang_jml
                ]);
                
                return redirect('detail');
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
        $row = Detail::findOrFail($id);
        return view('detail.edit', compact('row'));
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
            'transaksi_id' => 'bail|required',
            'barang_id' => 'required'
            ],
            [
            'transaksi_id.required' => 'ID Transaksi wajib diisi',
            'barang_id.required' => 'ID Barang wajib diisi'
            ]
            );

            $row = Pelanggan::findOrFail($id);
            $row->update([
            'transaksi_id' => $request->transaksi_id,
            'barang_id' => $request->barang_id,
            'barang_jml' => $request->barang_jml
            ]);

            return redirect('detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Detail::findOrFail($id);
        $row->delete();

        return redirect('detail');
    }
}
