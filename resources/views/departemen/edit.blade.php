<form action="/panel/departemen/{{ $departemen->kode_dept }}/update" id="frmDepartemen" method="POST">
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
                <input type="text" value="{{$departemen->kode_dept}}" name="kode_dept" id="kode_dept" class="form-control" placeholder="Kode Departemen" readonly>
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
                <input type="text" value="{{ $departemen -> nama_dept }}" name="nama_dept" id="nama_dept" class="form-control" placeholder="Nama Departemen">
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