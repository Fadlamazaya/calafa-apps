<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Katalog;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // if (Auth::check()) {
            // Hitung total data
            $totalPelanggan = Pelanggan::count();
            $totalMitra = Mitra::count();
            $totalUser = User::count();
            $totalKatalog = Katalog::count();

             // Top 3 pelanggan yang baru mendaftar
           $topUserBaru = User::latest()->take(3)->get();

            // Kirim data ke view
            return view('admin.dashboard', compact('totalPelanggan', 'totalMitra', 'totalUser', 'totalKatalog',
            'topUserBaru'));
           // return view('admin.dashboard');

    //    }else if (!Auth::check()) {
    //        return redirect()->route('auth');
    //    }
        // return view('admin.dashboard');
    }
}
