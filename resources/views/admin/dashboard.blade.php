@extends('layouts.admin.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div>
            <h2 class="h4">Dashboard</h2>
            <p class="mb-0">Selamat datang di dashboard Calafa Food.</p>
        </div>
    </div>

    {{-- Ringkasan Statistik --}}
    <div class="row">
        <div class="col-md-9 mb-4">
            <div class="row">
                {{-- <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total Pelanggan</h5>
                            <h2>{{ $totalPelanggan }}</h2>
                            <a href="{{ route('pelanggan.list') }}" class="btn btn-primary btn-sm mt-2">See All</a>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total Mitra</h5>
                            <h2>{{ $totalMitra }}</h2>
                            <a href="{{ route('mitra.list') }}" class="btn btn-primary btn-sm mt-2">See All</a>
                        </div>
                    </div>
                </div> --}}

                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total User</h5>
                            <h2>{{ $totalUser }}</h2>
                            <a href="{{ route('user.list') }}" class="btn btn-primary btn-sm mt-2">See All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total Katalog</h5>
                            <h2>{{ $totalKatalog }}</h2>
                            <a href="{{ route('katalog.list') }}" class="btn btn-primary btn-sm mt-2">See All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-3">
            <div class="col-12 px-0 mb-4"> <!-- Margin bawah ditambah untuk memberikan ruang -->
                <div class="card shadow border-0 text-center p-0">
                    {{-- <div class="profile-cover rounded-top"
                        style="background: url(http://placehold.it/226x200); height: 110px; background-size: cover;"></div> --}}
                    <div class="card-body pb-3 pt-3"> <!-- Padding body diperkecil -->
                        {{-- <img src="{{ asset('assets-admin/img/brand/logocalafa.png') }}"
                            class="avatar-xl rounded-circle mx-auto mt-n6 mb-3" alt="Data User"> <!-- Ukuran avatar lebih kecil --> --}}
                        <h4 class="h6">{{ Auth::check() ? Auth::user()->name : '' }}</h4>
                        <!-- Ukuran font disesuaikan -->
                        <h5 class="fw-normal fs-7">{{ Auth::check() ? Auth::user()->role : '' }}</h5>
                        <p class="text-gray fs-8 mb-2">{{ Auth::check() ? Auth::user()->email : '' }}</p>
                        {{-- <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center" href="#">
                            Edit Profil
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Top 3 Pelanggan Baru --}}
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h5>Top 3 User Baru</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($topUserBaru as $user)
                            <li class="list-group-item">
                                <strong>{{ $user->name }} {{ $user->role }}</strong> -
                                Mendaftar pada {{ $user->created_at->format('d M Y') }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Navigasi Data --}}
    {{-- <div class="card border-0 shadow">
        <div class="card-header d-flex justify-content-between">
            <h5>Manajemen Data</h5>
            <div>
                <a href="{{ route('pelanggan.list') }}" class="btn btn-sm btn-primary">Pelanggan</a>
                <a href="{{ route('mitra.list') }}" class="btn btn-sm btn-success">Mitra</a>
                <a href="{{ route('user.list') }}" class="btn btn-sm btn-info">User</a>
            </div>
        </div>
        <div class="card-body">
            <p>Pilih kategori data untuk melihat detail atau mengelola informasi terkait.</p>
        </div>
    </div> --}}
@endsection
