<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //daftar kolom yang bosa difilter sesuai name pada form
        $filterableColumns = ['role'];
        //daftae kolom yang akan di search saat keyword search dilakukan
        $searchableColumns = ['name'];
        //gunakan scope filter untuk memproses query
        $pageData['dataUser'] = User::filter($request, $filterableColumns,$searchableColumns)
        ->paginate(10)
        ->onEachSide(2)
        ->withQueryString();

        return view('admin.user.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required','in:Administrator,Pelanggan,Mitra'],

        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;

        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;


        User::create($data);

        return redirect()->route('user.list')->with('success', 'Penambahan Data Berhasil!');
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
        $pageData['dataUser'] = User::findOrFail($param1);
        return view('admin.user.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required','in:Administrator,Pelanggan,Mitra'],

        ]);

        $id = $request->id;
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;


        $user->save();

        return redirect()->route('user.list')->with('success', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.list')->with('success', 'Penghapusan Data Berhasil');

    }
}
