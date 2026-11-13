@extends('layouts.admin.tabler')
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">Overview</div>

                <h1 class="page-title">Data Cabang</h1>
            </div>

            <div class="col-auto ms-auto d-print-none">

            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
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
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <a href="#" class="btn btn-primary" id="btnTambahCabang">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="/panel/cabang" method="GET">
                                    <div class="row">
                                        <div class="col-10">
                                            <select name="kode_cabang" class="form-select" id="">
                                                <option value="">Semua Cabang</option>
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                        <path d="M21 21l-6 -6" />
                                                    </svg>
                                                    Cari
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Cabang</th>
                                            <th>Nama Cabang</th>
                                            <th>Lokasi</th>
                                            <th>Radius</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cabang as $d )
                                        <tr>
                                            <td>
                                                {{$loop -> iteration}}
                                            </td>
                                            <td>
                                                {{$d -> kode_cabang}}
                                            </td>
                                            <td>
                                                {{$d -> nama_cabang}}
                                            </td>
                                            <td>
                                                {{$d -> lokasi_cabang}}
                                            </td>
                                            <td>
                                                {{$d -> radius_cabang}} Meter
                                            </td>
                                            <td>
                                                <div class="btn-group gap-2">
                                                    <a href="#" class="edit btn btn-info btn-sm" kode_cabang="{{ $d->kode_cabang }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                    </a>

                                                    <form action="/panel/cabang/{{ $d->kode_cabang }}/delete" method="POST" class="m-0">
                                                        @csrf
                                                        <a href="#" type="submit" class="btn btn-danger btn-sm delete-confirm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M4 7l16 0" />
                                                                <path d="M10 11l0 6" />
                                                                <path d="M14 11l0 6" />
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                        </a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-inputcabang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Cabang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/panel/cabang/store" id="frmCabang" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-zoom-scan">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                        <path d="M16 16l-2.5 -2.5" />
                                        <path d="M3 7v-2a2 2 0 0 1 2 -2h2" />
                                        <path d="M3 17v2a2 2 0 0 0 2 2h2" />
                                        <path d="M17 3h2a2 2 0 0 1 2 2v2" />
                                        <path d="M17 21h2a2 2 0 0 0 2 -2v-2" />
                                    </svg>
                                </span>
                                <input type="text" value="" name="kode_cabang" id="kode_cabang" class="form-control" placeholder="Kode Cabang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-id-badge-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 12h3v4h-3l0 -4" />
                                        <path d="M10 6h-6a1 1 0 0 0 -1 1v12a1 1 0 0 0 1 1h16a1 1 0 0 0 1 -1v-12a1 1 0 0 0 -1 -1h-6" />
                                        <path d="M10 4a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1l0 -3" />
                                        <path d="M14 16h2" />
                                        <path d="M14 12h4" />
                                    </svg>
                                </span>
                                <input type="text" value="" name="nama_cabang" id="nama_cabang" class="form-control" placeholder="Nama Cabang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7" />
                                        <path d="M9 4v13" />
                                        <path d="M15 7v5" />
                                        <path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879" />
                                        <path d="M19 18v.01" />
                                    </svg>
                                </span>
                                <input type="text" value="" name="lokasi_cabang" id="lokasi_cabang" class="form-control" placeholder="Lokasi Cabang">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-radar">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M21 12h-8a1 1 0 1 0 -1 1v8a9 9 0 0 0 9 -9" />
                                        <path d="M16 9a5 5 0 1 0 -7 7" />
                                        <path d="M20.486 9a9 9 0 1 0 -11.482 11.495" />
                                    </svg>
                                </span>
                                <input type="text" value="" name="radius_cabang" id="radius_cabang" class="form-control" placeholder="Radius Cabang">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary w-100"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-send">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 14l11 -11" />
                                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                    </svg>
                                    Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL'S EDIT -->

<div class="modal modal-blur fade" id="modal-editcabang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Data Cabang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="loadeditform">

            </div>
        </div>
    </div>
</div>
@endsection

@push('myscript')
<script>
    $(function() {
        $('#btnTambahCabang').click(function() {
            $('#modal-inputcabang').modal("show");
        })

        $('.edit').click(function() {
            var kode_cabang = $(this).attr('kode_cabang');
            $.ajax({
                type: 'POST',
                url: '/panel/cabang/edit',
                cache: false,
                data: {
                    _token: "{{ csrf_token(); }}",
                    kode_cabang: kode_cabang,
                },
                success: function(respond) {
                    $('#loadeditform').html(respond);
                }
            })
            $('#modal-editcabang').modal("show");
        })

        $('.delete-confirm').click(function(e) {
            e.preventDefault();

            var form = $(this).closest('form');

            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Data Cabang yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batalkan"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        $('#frmCabang').submit(function() {

            var kode_cabang = $('#kode_cabang').val()
            var nama_cabang = $('#nama_cabang').val()
            var lokasi_cabang = $('#lokasi_cabang').val()
            var radius_cabang = $('#radius_cabang').val()

            if (kode_cabang == "") {
                Swal.fire({
                    title: "Ooops...!",
                    text: "Kode Cabang Harus Diisi !",
                    icon: "warning",
                    confirmButtonText: "Kembali"
                }).then((result) => {
                    $('#kode_cabang').focus();
                });
                return false;

            } else if (nama_cabang == "") {
                Swal.fire({
                    title: "Ooops...!",
                    text: "Nama Cabang Harus Diisi !",
                    icon: "warning",
                    confirmButtonText: "Kembali"
                }).then((result) => {
                    $('#nama_cabang').focus();
                });
                return false;

            } else if (lokasi_cabang == "") {
                Swal.fire({
                    title: "Ooops...!",
                    text: "Lokasi Cabang Harus Diisi !",
                    icon: "warning",
                    confirmButtonText: "Kembali"
                }).then((result) => {
                    $('#lokasi_cabang').focus();
                });
                return false;

            } else if (radius_cabang == "") {
                Swal.fire({
                    title: "Ooops...!",
                    text: "Radius Cabang Harus Diisi !",
                    icon: "warning",
                    confirmButtonText: "Kembali"
                }).then((result) => {
                    $('#radius_cabang').focus();
                });
                return false;

            }
        })
    })
</script>
@endpush