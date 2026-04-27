@extends('layouts.admin.app')

@section('content')
    {{-- breadcrumb start --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item"><a href="#"><svg class="icon icon-xxs" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> <a
                            href="{{ route('pesanan.list') }}">pesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit data</li>
                </ol>
            </nav>
            <h2 class="h4">Edit pesanan</h2>
            <p class="mb-0">Form Perubahan Data pesanan.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0"><a href="{{ route('pesanan.list') }}"
                class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                kembali
            </a>
            {{-- <div class="btn-group ms-2 ms-lg-3"><button type="button"
                    class="btn btn-sm btn-outline-gray-600">Share</button> <button type="button"
                    class="btn btn-sm btn-outline-gray-600">Export</button></div> --}}
        </div>
    </div>
    {{-- breadcrumb end --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- form start --}}
    <div class="card card-body border-0 shadow mb-4">
        <form action="{{ route('pesanan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input class="form-control" id="nama_pelanggan" name="nama_pelanggan" type="text"
                            value="{{ $dataPesanan->nama_pelanggan }}" placeholder="Enter your pelanggan name" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="pesanan_item">Pesanan</label>
                        <input class="form-control" id="pesanan_item" name="pesanan_item" type="text"
                            value="{{ $dataPesanan->pesanan_item }}" placeholder="pesanan_item" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input class="form-control" id="harga" name="harga" type="number"
                            value="{{ $dataPesanan->harga }}" placeholder="0000" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tgl_pesan">Tanggal Pesan</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </span>
                        <input data-datepicker="" class="form-control datepicker-input" id="tgl_pesan" name="tgl_pesan"
                            type="date" value="{{ $dataPesanan->tgl_pesan }}" placeholder="D-F-Y" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="pembayaran">Metode Pembayaran</label>
                    <select class="form-select mb-0" id="pembayaran" name="pembayaran" aria-label="pembayaran">
                        <option selected="selected">Metode Pembayaran</option>
                        <option value="Transfer" {{ $dataPesanan->pembayaran == 'Transfer' ? 'selected' : '' }}>
                            Transfer</option>
                        <option value="Tunai" {{ $dataPesanan->pembayaran == 'Tunai' ? 'selected' : '' }}>Tunai
                        </option>
                        <option value="E-Wallet" {{ $dataPesanan->pembayaran == 'E-Wallet' ? 'selected' : '' }}>
                            E-Wallet</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status">Status Pembayaran</label>
                    <select class="form-select mb-0" id="status" name="status" aria-label="status">
                        <option selected="selected">Status Pembayaran</option>
                        <option value="Belum_bayar" {{ $dataPesanan->status == 'Belum_bayar' ? 'selected' : '' }}>
                            Belum Bayar</option>
                        <option value="Selesai" {{ $dataPesanan->status == 'Selesai' ? 'selected' : '' }}>Selesai
                        </option>
                    </select>
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Simpan Perubahan</button>
            </div>

            <input type="hidden" name="pesanan_id" value="{{ $dataPesanan->pesanan_id }}" />
        </form>
    </div>
    {{-- form end --}}
@endsection
