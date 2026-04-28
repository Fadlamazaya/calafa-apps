<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         //daftar kolom yang bosa difilter sesuai name pada form
         $filterableColumns = ['pembayaran'];
          $filterableColumns = ['status'];
         //daftae kolom yang akan di search saat keyword search dilakukan
         $searchableColumns = ['nama_pelanggan'];
         //gunakan scope filter untuk memproses query
         $pageData['dataPesanan'] = Pesanan::filter($request, $filterableColumns,$searchableColumns)
         ->paginate(5)
         ->onEachSide(2)
         ->withQueryString();

        return view('admin.pesanan.index', $pageData);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => ['required', 'string'],
            'pesanan_item' => ['required'],
            'harga' => ['required', 'numeric'],
            'tgl_pesan' => ['required', 'date'],
            'pembayaran' => ['required',  'in:Transfer,Tunai,E-Wallet'],
            'status' => ['required',  'in:Belum_bayar,Selesai'],
        ]);

        $data['nama_pelanggan'] = $request->nama_pelanggan;
        $data['pesanan_item'] = $request->pesanan_item;
        $data['harga'] = $request->harga;
        $data['tgl_pesan'] = $request->tgl_pesan;
        $data['pembayaran'] = $request->pembayaran;
        $data['status'] = $request->status;

        Pesanan::create($data);

        return redirect()->route('pesanan.list')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {
        $pageData['dataPesanan'] = Pesanan::findOrFail($param1);
        return view('admin.pesanan.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pelanggan' => ['required', 'string'],
            'pesanan_item' => ['required'],
            'harga' => ['required', 'numeric'],
            'tgl_pesan' => ['required', 'date'],
            'pembayaran' => ['required',  'in:Transfer,Tunai,E-Wallet'],
            'status' => ['required',  'in:Belum_bayar,Selesai'],
        ]);


        $pesanan_id = $request->pesanan_id;
        $pesanan = Pesanan::findOrFail($pesanan_id);

        $pesanan->nama_pelanggan = $request->nama_pelanggan;
        $pesanan->pesanan_item = $request->pesanan_item;
        $pesanan->harga = $request->harga;
        $pesanan->tgl_pesan = $request->tgl_pesan;
        $pesanan->pembayaran = $request->pembayaran;
        $pesanan->status = $request->status;

        $pesanan->save();

        return redirect()->route('pesanan.list')->with('success', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrFail($param1);

        $pesanan->delete();

        return redirect()->route('pesanan.list')->with('success', 'Penghapusan Data Berhasil');
    }
}
