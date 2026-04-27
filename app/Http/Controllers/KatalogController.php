<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         //daftar kolom yang bosa difilter sesuai name pada form
         $filterableColumns = ['ketersediaan'];
         //daftae kolom yang akan di search saat keyword search dilakukan
         $searchableColumns = ['nama_katalog'];
         //gunakan scope filter untuk memproses query
         $pageData['dataKatalog'] = Katalog::filter($request, $filterableColumns,$searchableColumns)
         ->paginate(5)
         ->onEachSide(2)
         ->withQueryString();

        return view('admin.katalog.index', $pageData);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.katalog.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_katalog' => ['required', 'string'],
            'deskripsi' => ['required'],
            'harga' => ['required', 'numeric'],
            'ketersediaan' => ['required',  'in:Tersedia,Habis,Pre-order'], //hanya bernilai male dan female
            'kategori' => ['required', 'string'],
            'tgl_rilis' => ['required', 'date'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $data['nama_katalog'] = $request->nama_katalog;
        $data['deskripsi'] = $request->deskripsi;
        $data['harga'] = $request->harga;
        $data['ketersediaan'] = $request->ketersediaan;
        $data['kategori'] = $request->kategori;
        $data['tgl_rilis'] = $request->tgl_rilis;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = $gambar->store('images/katalog', 'public'); // Simpan di folder 'storage/app/public/images/kelas'
            $data['gambar'] = $path;
        }

        Katalog::create($data);

        return redirect()->route('katalog.list')->with('success', 'Penambahan Data Berhasil!');

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
        $pageData['dataKatalog'] = Katalog::findOrFail($param1);
        return view('admin.katalog.edit', $pageData);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_katalog' => ['required', 'string'],
            'deskripsi' => ['required'],
            'harga' => ['required', 'numeric'],
            'ketersediaan' => ['required', 'in:Tersedia,Habis,Pre-order'], //hanya bernilai male dan female
            'kategori' => ['required', 'string'],
            'tgl_rilis' => ['required', 'date'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],

        ]);


        $katalog_id = $request->katalog_id;
        $katalog = Katalog::findOrFail($katalog_id);

        $katalog->nama_katalog = $request->nama_katalog;
        $katalog->deskripsi = $request->deskripsi;
        $katalog->harga = $request->harga;
        $katalog->ketersediaan = $request->ketersediaan;
        $katalog->kategori = $request->kategori;
        $katalog->tgl_rilis = $request->tgl_rilis;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = $gambar->store('images/katalog', 'public'); // Simpan di folder 'storage/app/public/images/kelas'
            $data['gambar'] = $path;
        }

        $katalog->save();

        return redirect()->route('katalog.list')->with('success', 'Perubahan Data Berhasil');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $katalog = Katalog::findOrFail($param1);

        $katalog->delete();

        return redirect()->route('katalog.list')->with('success', 'Penghapusan Data Berhasil');

    }
}
