@extends('layouts.admin.app')

@section('content')
    {{-- breadcrum --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.list') }}">User</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                </ol>
            </nav>
            <h2 class="h4"> Tambah User </h2>
            <p class="mb-0">Form Tambah User Baru</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('user.list') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                Kembali
            </a>
            {{-- <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button> --}}
        </div>
    </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <div class="card card-body border-0 shadow mb-4">

        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}"
                            placeholder="Enter your first name" required="">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-select mb-0" id="role" name="role" aria-label="role select example">
                            <option selected="selected">Role</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Pelanggan">Pelanggan</option>
                            <option value="Mitra">Mitra</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" value="{{ old('email') }}" name="email" type="email"
                            placeholder="name@company.com" required="">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" value="{{ old('password') }}" name="password"
                            type="password" placeholder="password" required="">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
            </div>
        </form>
    </div>
@endsection
