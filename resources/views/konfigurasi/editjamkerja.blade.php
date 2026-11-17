<form action="/panel/konfigurasi/updatejamkerja" id="frmJK" method="POST">
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
                <input type="text" value="{{$jam_kerja -> kode_jam_kerja}}" name="kode_jam_kerja" id="kode_jam_kerja" class="form-control" placeholder="Kode Jam Kerja" readonly>
            </div>
        </div>
    </div>
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
                <input type="text" value="{{$jam_kerja -> nama_jam_kerja}}" name="nama_jam_kerja" id="nama_jam_kerja" class="form-control" placeholder="Nama Jam Kerja">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alarm">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 13a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M12 10l0 3l2 0" />
                        <path d="M7 4l-2.75 2" />
                        <path d="M17 4l2.75 2" />
                    </svg>
                </span>
                <input type="text" value="{{$jam_kerja -> awal_jam_masuk}}" name="awal_jam_masuk" id="awal_jam_masuk" class="form-control" placeholder="Awal Jam Masuk">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alarm">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 13a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M12 10l0 3l2 0" />
                        <path d="M7 4l-2.75 2" />
                        <path d="M17 4l2.75 2" />
                    </svg>
                </span>
                <input type="text" value="{{$jam_kerja -> jam_masuk}}" name="jam_masuk" id="jam_masuk" class="form-control" placeholder="Jam Masuk">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alarm">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 13a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M12 10l0 3l2 0" />
                        <path d="M7 4l-2.75 2" />
                        <path d="M17 4l2.75 2" />
                    </svg>
                </span>
                <input type="text" value="{{$jam_kerja -> akhir_jam_masuk}}" name="akhir_jam_masuk" id="akhir_jam_masuk" class="form-control" placeholder="Akhir Jam Masuk">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alarm">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 13a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M12 10l0 3l2 0" />
                        <path d="M7 4l-2.75 2" />
                        <path d="M17 4l2.75 2" />
                    </svg>
                </span>
                <input type="text" value="{{$jam_kerja -> jam_pulang}}" name="jam_pulang" id="jam_pulang" class="form-control" placeholder="Jam Pulang">
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