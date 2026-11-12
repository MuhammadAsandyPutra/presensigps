@extends('layouts.admin.tabler')

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">Overview</div>

                <h1 class="page-title">Konfigurasi Lokasi</h1>
            </div>

            <div class="col-auto ms-auto d-print-none">

            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        @if (Session::get('warning'))
                        <div class="alert alert-warning">
                            {{ Session::get('warning') }}
                        </div>
                        @endif
                        <form action="/panel/konfigurasi/updatelokasikantor" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-icon mb-3">
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pinned">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M14.828 10.828a4 4 0 1 0 -5.656 0l2.828 2.829l2.828 -2.829" />
                                                <path d="M12 8v.01" />
                                                <path d="M6 12h-.142a2 2 0 0 0 -1.923 1.45l-.858 3a2 2 0 0 0 1.924 2.55h13.999a2 2 0 0 0 1.923 -2.55l-.857 -3a2 2 0 0 0 -1.923 -1.45h-.143" />
                                            </svg>
                                        </span>
                                        <input type="text" value="{{$lok_kantor -> lokasi_kantor}}" name="lokasi_kantor" id="lokasi_kantor" class="form-control" placeholder="Lokasi Kantor">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-icon mb-3">
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-radar-2">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                <path d="M15.51 15.56a5 5 0 1 0 -3.51 1.44" />
                                                <path d="M18.832 17.86a9 9 0 1 0 -6.832 3.14" />
                                                <path d="M12 12v9" />
                                            </svg>
                                        </span>
                                        <input type="text" value="{{$lok_kantor -> radius}}" name="radius" id="radius" class="form-control" placeholder="Radius">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><button class="btn btn-primary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-refresh">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                        </svg>
                                        Update</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection