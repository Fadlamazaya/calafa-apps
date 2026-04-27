<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //daftar kolom yang bosa difilter sesuai name pada form
        $filterableColumns = ['kemitraan'];
        //daftae kolom yang akan di search saat keyword search dilakukan
        $searchableColumns = ['nama_mitra'];
        //gunakan scope filter untuk memproses query
        $pageData['dataMitra'] = Mitra::filter($request, $filterableColumns,$searchableColumns)
        ->paginate(10)
        ->onEachSide(2)
        ->withQueryString();
        return view('admin.mitra.index', $pageData);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mitra.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mitra' => ['required'],
            'alamat' => ['required'],
            'email' => ['required', 'email'],
            'telepon' => ['required', 'numeric'],
            'kemitraan' => ['required', 'in:platinum,gold,silver'],
            'bergabung' => ['required', 'date'],
        ]);

        $data['nama_mitra'] = $request->nama_mitra;
        $data['alamat'] = $request->alamat;
        $data['email'] = $request->email;
        $data['telepon'] = $request->telepon;
        $data['kemitraan'] = $request->kemitraan;
        $data['bergabung'] = $request->bergabung;

        Mitra::create($data);

        return redirect()->route('mitra.list')->with('success', 'Penambahan Data Berhasil!');

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
    public function edit(string $id)
    {
        $pageData['dataMitra'] = Mitra::findOrFail($param1);

        return view('admin.mitra.edit', $pageData);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'mitra_id' => ['required'],
            'nama_mitra' => ['required'],
            'alamat' => ['required'],
            'email' => ['email', 'email'],
            'telepon' => ['required','numeric'],
            'kemitraan' => ['required', 'in:platinum,gold,silver'],
            'bergabung' => ['required', 'date'],

        ]);

        $mitra_id = $request->mitra_id;
        $mitra = Mitra::findOrFail($mitra_id);

        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->alamat = $request->alamat;
        $mitra->email = $request->email;
        $mitra->telepon = $request->telepon;
        $mitra->kemitraan = $request->kemitraan;
        $mitra->bergabung = $request->bergabung;

        $mitra->save();

        return redirect()->route('mitra.list')->with('success', 'Perubahan Data Berhasil');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mitra = Mitra::findOrFail($param1);

        $mitra->delete();

        return redirect()->route('mitra.list')->with('success', 'Pengahpusan Data Berhasil!');

    }
}
