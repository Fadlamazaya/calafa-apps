@extends('layouts.admin.app')

@section('content')
        {{-- breadcrumb start --}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="#"><svg class="icon icon-xxs" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <a
                                href="{{ route('mitra.list') }}">mitra</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit data</li>
                    </ol>
                </nav>
                <h2 class="h4">Edit mitra</h2>
                <p class="mb-0">Form Perubahan Data mitra.</p>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0"><a href="{{ route('mitra.list') }}"
                    class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
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
            <form action="{{ route('mitra.update') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_mitra">Nama Mitra</label>
                        <input class="form-control" id="first_name" name="nama_mitra" type="text"
                               value="{{ $dataMitra->nama_mitra }}" placeholder="Enter your mitra name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" type="text"
                               value="{{ $dataMitra->alamat }}" placeholder="Alamat" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email"
                               value="{{ $dataMitra->email }}" placeholder="name@company.com" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="telepon">Telepon</label>
                        <input class="form-control" id="telepon" name="telepon" type="number"
                               value="{{ $dataMitra->telepon }}" placeholder="+12-345 678 910" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kemitraan">Kemitraan</label>
                        <select class="form-select mb-0" id="kemitraan" name="kemitraan" aria-label="Memilih kemitraan">
                            <option selected="selected">Kemitraan</option>
                            <option value="platinum" {{ $dataMitra->kemitraan == 'platinum' ? 'selected' : '' }}>Platinum</option>
                            <option value="gold" {{ $dataMitra->kemitraan == 'gold' ? 'selected' : '' }}>Gold</option>
                            <option value="silver" {{ $dataMitra->kemitraan == 'silver' ? 'selected' : '' }}>Silver</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="bergabung">Tanggal Bergabung</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input data-datepicker="" class="form-control datepicker-input" id="bergabung" name="bergabung"
                                   type="date" value="{{ $dataMitra->bergabung }}" placeholder="dd/mm/yyyy" required>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
                </div>

                <input type="hidden" name="mitra_id" value="{{ $dataMitra->mitra_id }}" />
            </form>
        </div>
        {{-- form end --}}
        @endsection
