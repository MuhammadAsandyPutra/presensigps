 <form action="/panel/karyawan/{{ $karyawan -> nik }}/update" id="frmKaryawan" method="POST" enctype="multipart/form-data">
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
                 <input type="text" readonly value="{{ $karyawan -> nik }}" name="nik" id="nik" class="form-control" placeholder="NIK">
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
                 <input type="text" value="{{ $karyawan -> nama_lengkap}}" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Karyawan">
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-12">
             <div class="input-icon mb-3">
                 <span class="input-icon-addon">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-briefcase-2">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                         <path d="M3 9a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9" />
                         <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                     </svg>
                 </span>
                 <input type="text" value="{{ $karyawan -> jabatan}}" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan">
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-12">
             <div class="input-icon mb-3">
                 <span class="input-icon-addon">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-phone-plus">
                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                         <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                         <path d="M15 6h6m-3 -3v6" />
                     </svg>
                 </span>
                 <input type="text" value="{{$karyawan -> no_hp}}" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Hp">
             </div>
         </div>
     </div>
     <div class="row mt-2">
         <div class="col-12">
             <div class="mb-3">
                 <div class="form-label">Foto Karyawan</div>
                 <input type="file" name="foto" class="form-control">
                 <input type="hidden" name="old_foto" value="{{$karyawan -> foto}}">
             </div>
         </div>
     </div>

     <div class="row">
         <div class="col-12">
             <select name="kode_dept" id="kode_dept" class="form-select">
                 <option value="">Departemen</option>
                 @foreach ( $departemen as $d)
                 <option {{ $karyawan->kode_dept == $d ->kode_dept ? 'selected' : ""}} value="{{ $d -> kode_dept}}">{{ $d -> nama_dept}}</option>
                 @endforeach
             </select>
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