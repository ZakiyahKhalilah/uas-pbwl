<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Pelanggan::all();
        return view('pelanggan.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
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
            'pelanggan_nama' => 'bail|required|unique:tb_pelanggan',
            'pelanggan_email' => 'required'
            ],
            [
                'pelanggan_nama.required' => 'Nomor Pelanggan wajib diisi',
                'pelanggan_nama.unique' => 'Nomor Pelanggan sudah ada',
                'pelanggan_email.required' => 'Nama wajib diisi'
            ]);

            Pelanggan::create([
                'pelanggan_nama' => $request->pelanggan_nama,
                'pelanggan_email' => $request->pelanggan_email,
                'pelanggan_alamat' => $request->pelanggan_alamat
                ]);
                
                return redirect('pelanggan');
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
        $row = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('row'));
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
            'pelanggan_nama' => 'bail|required',
            'pelanggan_email' => 'required'
            ],
            [
            'pelanggan_nama.required' => 'Nomor Pelanggan wajib diisi',
            'pelanggan_email.required' => 'Nama Pelanggan wajib diisi'
            ]
            );

            $row = Pelanggan::findOrFail($id);
            $row->update([
            'pelanggan_nama' => $request->pelanggan_nama,
            'pelanggan_email' => $request->pelanggan_email,
            'pelanggan_alamat' => $request->pelanggan_alamat
            ]);

            return redirect('pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Pelanggan::findOrFail($id);
        $row->delete();

        return redirect('pelanggan');
    }
}
