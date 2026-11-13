<form action="/panel/cabang/update" id="frmCabangEdit" method="POST">
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
                <input type="text" value="{{$cabang -> kode_cabang}}" name="kode_cabang" id="kode_cabang" class="form-control" placeholder="Kode Cabang" readonly>
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
                <input type="text" value="{{$cabang -> nama_cabang}} " name="nama_cabang" id="nama_cabang" class="form-control" placeholder="Nama Cabang">
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
                <input type="text" value="{{$cabang -> lokasi_cabang}}" name="lokasi_cabang" id="lokasi_cabang" class="form-control" placeholder="Lokasi Cabang">
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
                <input type="text" value="{{$cabang -> radius_cabang}}" name="radius_cabang" id="radius_cabang" class="form-control" placeholder="Radius Cabang">
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

<script>
    $(function() {
        $('#frmCabangEdit').submit(function() {

            var kode_cabang = $('#frmCabangEdit').find('#kode_cabang').val()
            var nama_cabang = $('#frmCabangEdit').find('#nama_cabang').val()
            var lokasi_cabang = $('#frmCabangEdit').find('#lokasi_cabang').val()
            var radius_cabang = $('#frmCabangEdit').find('#radius_cabang').val()

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