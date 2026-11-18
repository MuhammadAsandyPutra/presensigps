@extends('layouts.presensi')
@section('content')

<style>
    .logout {
        position: absolute;
        top: 18px;
        right: 18px;

        width: 42px;
        height: 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: rgba(255, 255, 255, 0.18);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;

        color: #fff;
        font-size: 22px;
        text-decoration: none;

        transition: all 0.2s ease;
    }

    .logout:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.05);
    }

    #user-section {
        position: relative;
        padding: 25px 20px;
        background: linear-gradient(135deg, #e5e16e, #44d18d);
        border-radius: 0 0 25px 25px;
        margin-top: -1px;
    }

    #user-detail {
        display: flex;
        align-items: center;
        gap: 15px;
        padding-top: 10px;
    }

    #user-detail .avatar {
        width: 65px;
        height: 65px;
        flex-shrink: 0;
        border: 3px solid rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        overflow: hidden;
    }

    #user-detail .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #user-info {
        display: flex;
        flex-direction: column;
        gap: 5px;
        padding-right: 35px;
    }

    #user-name {
        color: white;
        font-size: 17px;
        font-weight: 700;
        margin: 0;
        line-height: 1.4;
    }

    #user-role {
        color: rgba(255, 255, 255, 0.85);
        font-size: 12px;
        font-weight: 400;
    }

    .logout {
        position: absolute;
        top: 20px;
        right: 18px;
        color: white;
        font-size: 24px;
        text-decoration: none;
        z-index: 999;
    }
</style>
<!-- App Capsule -->
<div id="appCapsule">
    <div class="section" id="user-section">

        <a href="/proseslogout" class="logout">
            <ion-icon name="log-out-outline"></ion-icon>
        </a>

        <div id="user-detail">

            <div class="avatar">
                @if(!empty(Auth::guard('karyawan')->user()->foto))
                @php
                $path = Storage::url('/uploads/karyawan/' . Auth::guard('karyawan')->user()->foto);
                @endphp

                <img src="{{ url($path) }}" alt="Foto Profil">
                @else
                <img src="{{ asset('assets/img/sample/avatar/avatar1.jpg') }}" alt="Foto Profil">
                @endif
            </div>

            <div id="user-info">
                <h2 id="user-name">
                    {{ Auth::guard('karyawan')->user()->nama_lengkap }}
                </h2>

                <span id="user-role">
                    {{ Auth::guard('karyawan')->user()->jabatan }}
                </span>
                <br>
                <br>
                <span id="user-role">({{ Auth::guard('karyawan')->user()->kode_cabang }})
                </span>
            </div>

        </div>
    </div>

    <div class="section" id="menu-section" style="margin-top: 10px;">
        <div class="card">
            <div class="card-body text-center">
                <div class="list-menu">
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/editprofile" class="green" style="font-size: 40px;">
                                <ion-icon name="person-sharp"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Profil</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/presensi/izin" class="danger" style="font-size: 40px;">
                                <ion-icon name="calendar-number"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Cuti</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/presensi/histori" class="warning" style="font-size: 40px;">
                                <ion-icon name="document-text"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Histori</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="" class="orange" style="font-size: 40px;">
                                <ion-icon name="location"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            Lokasi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-2" id="presence-section">
        <div class="todaypresence">
            <div class="row">

                <div class="col-6">
                    <div class="card presensi-card card-masuk">
                        <div class="card-body">
                            <div class="presensi-header">
                                <div class="presensi-icon">
                                    <ion-icon name="log-in-outline"></ion-icon>
                                </div>
                                <span>MASUK</span>
                            </div>

                            <div class="presensi-foto">
                                @if($presensihariini != null)
                                <img src="{{ Storage::url('uploads/absensi/'.$presensihariini->foto_in) }}" alt="Foto Masuk">
                                @else
                                <ion-icon name="camera-outline"></ion-icon>
                                @endif
                            </div>

                            <div class="presensi-info">
                                <h4>
                                    {{ $presensihariini != null ? $presensihariini->jam_in : '--:--' }}
                                </h4>
                                <span>
                                    {{ $presensihariini != null ? 'Sudah Presensi' : 'Belum Presensi' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card presensi-card card-pulang">
                        <div class="card-body">
                            <div class="presensi-header">
                                <div class="presensi-icon">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <span>PULANG</span>
                            </div>

                            <div class="presensi-foto">
                                @if($presensihariini != null && $presensihariini->jam_out != null)
                                <img src="{{ Storage::url('uploads/absensi/'.$presensihariini->foto_out) }}" alt="Foto Pulang">
                                @else
                                <ion-icon name="camera-outline"></ion-icon>
                                @endif
                            </div>

                            <div class="presensi-info">
                                <h4>
                                    {{ $presensihariini != null && $presensihariini->jam_out != null ? $presensihariini->jam_out : '--:--' }}
                                </h4>
                                <span>
                                    {{ $presensihariini != null && $presensihariini->jam_out != null ? 'Sudah Presensi' : 'Belum Presensi' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-6">
                    <div class="card gradasigreen">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    @if( $presensihariini != null )
                                    @php
                                    $path = Storage::url('/uploads/absensi/'.$presensihariini->foto_in)
                                    @endphp
                                    <img src="{{ url($path) }}" alt="" class="imaged w64">
                                    @else
                                    <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Masuk</h4>
                                    <span>{{$presensihariini != null ? $presensihariini->jam_in : "Belum Presensi"}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card gradasired">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    @if( $presensihariini != null && $presensihariini->jam_out != null )
                                    @php
                                    $path = Storage::url('/uploads/absensi/'.$presensihariini->foto_out)
                                    @endphp
                                    <img src="{{ url($path) }}" alt="" class="imaged w64">
                                    @else
                                    <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Pulang</h4>
                                    <span>{{$presensihariini != null && $presensihariini->jam_out != null ? $presensihariini->jam_out : "Belum Presensi"}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

        <div id="rekappresensi">
            <h3>Rekap Presensi {{ $namabulan[$bulanini]}} Tahun {{$tahunini}}</h3>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 16px 12px !important; line-height:0.8rem">
                            <span class="badge bg-danger" style="position: absolute; top:3px; left:45px; font-size: 0.5rem; z-index: 999;">{{ $rekappresensi -> jmlhadir}}</span>
                            <ion-icon name="accessibility-outline" style="font-size: 1.6rem;" class="text-primary"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500;">Hadir</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 16px 12px !important; line-height:0.8rem">
                            <span class="badge bg-danger" style="position: absolute; top:3px; left:45px; font-size: 0.5rem; z-index: 999;">{{$rekapizin -> jmlizin}}</span>
                            <ion-icon name="newspaper-outline" style="font-size: 1.6rem;" class="text-success"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500;">Izin</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 16px 12px !important; line-height:0.8rem">
                            <span class="badge bg-danger" style="position: absolute; top:3px; left:45px; font-size: 0.5rem; z-index: 999;">{{$rekapizin -> jmlsakit}}</span>
                            <ion-icon name="medkit-outline" style="font-size: 1.6rem;" class="text-warning"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500;">Sakit</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 16px 12px !important; line-height:0.8rem">
                            <span class="badge bg-danger" style="position: absolute; top:3px; left:45px; font-size: 0.5rem; z-index: 999;">{{ $rekappresensi -> jmlterlambat}}</span>
                            <ion-icon name="alarm-outline" style="font-size: 1.6rem;" class="text-danger"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500;">Telat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="presencetab mt-2">
            <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                            Bulan Ini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                            Leaderboard
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-2" style="margin-bottom:100px;">
                <div class="tab-pane fade show active" id="home" role="tabpanel">
                    <!-- <ul class="listview image-listview">
                        @foreach($historibulanini as $d)
                        @php
                        $path = Storage::url('/uploads/absensi/'.$d->foto_in);
                        @endphp
                        <li>
                            <div class="item">
                                <div class="histori-icon">
                                    <ion-icon name="finger-print-outline"></ion-icon>
                                </div>

                                <div class="in histori-content">
                                    <div class="histori-tanggal">
                                        <strong>{{ date("d-m-Y", strtotime($d->tanggal_presensi)) }}</strong>
                                        <span class="text-muted">Presensi Harian</span>
                                    </div>

                                    <div class="histori-jam">
                                        <span class="jam-masuk">
                                            <ion-icon name="log-in-outline"></ion-icon>
                                            {{ $d->jam_in }}
                                        </span>

                                        <span class="jam-pulang">
                                            <ion-icon name="log-out-outline"></ion-icon>
                                            {{ $d->jam_out ?? 'Belum Pulang' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>



                        <li>
                            <div class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="finger-print-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>{{ date("d-m-Y" ,strtotime($d->tanggal_presensi)) }}</div>
                                    <span class="badge badge-success">{{ $d->jam_in }}</span>
                                    <span class="badge badge-danger">{{ $d->jam_out }}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul> -->
                    <style>
                        .historicontent {
                            display: flex;
                        }

                        .datapresensi {
                            margin-left: 10px;

                        }
                    </style>
                    @foreach ($historibulanini as $d )
                    <div class="card">
                        <div class="card-body">
                            <div class="historicontent">
                                <div class="iconpresensi">
                                    <ion-icon name="finger-print-outline" style="font-size: 48px;" class="text-success"></ion-icon>
                                </div>
                                <div class="datapresensi">
                                    <h3 style="line-height:3px;">{{$d -> nama_jam_kerja}}</h3>
                                    <h4 style="margin:0px !important">{{date("d-m-Y", strtotime($d->tanggal_presensi))}}</h4>
                                    <span>
                                        {!! $d -> jam_in != null ? date('H:i', strtotime($d -> jam_in)) : '<span class="text-danger">Belum Presensi</span>' !!}
                                    </span>
                                    <span>
                                        {!! $d -> jam_out != null ? "-" . date('H:i', strtotime($d -> jam_out)) : '<span class="text-danger">- Belum Pulang</span>' !!}
                                    </span>

                                    <div class="keterangan mt-2">
                                        @if(!empty($d->jam_in) && !empty($d->jam_masuk))

                                        @php
                                        // Waktu jadwal masuk
                                        $jadwalMasuk = strtotime(
                                        $d->tanggal_presensi . ' ' . $d->jam_masuk
                                        );

                                        // Waktu aktual presensi masuk
                                        $presensiMasuk = strtotime(
                                        $d->tanggal_presensi . ' ' . $d->jam_in
                                        );

                                        // Hitung selisih dalam detik
                                        $selisihDetik = max(0, $presensiMasuk - $jadwalMasuk);

                                        // Konversi menjadi jam dan menit
                                        $jamTerlambat = intdiv($selisihDetik, 3600);
                                        $menitTerlambat = intdiv($selisihDetik % 3600, 60);
                                        @endphp

                                        @if($selisihDetik > 0)
                                        <span class="text-danger">
                                            <ion-icon name="time-outline"></ion-icon>
                                            Terlambat

                                            @if($jamTerlambat > 0)
                                            {{ $jamTerlambat }} jam
                                            @endif

                                            @if($menitTerlambat > 0)
                                            {{ $menitTerlambat }} menit
                                            @endif
                                        </span>
                                        @else
                                        <span class="text-success">
                                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                                            Tepat Waktu
                                        </span>
                                        @endif

                                        @else
                                        <span class="text-muted">Data jadwal atau presensi belum tersedia</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel">
                    <ul class="listview image-listview">
                        @foreach ($leaderboard as $d)
                        <li>
                            <div class="item">
                                <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        <b> {{ $d -> nama_lengkap}} </b>
                                        <br>
                                        <small class="text-muted">{{$d -> jabatan}}</small>
                                    </div>

                                    <span class="badge {{ $d -> jam_in < "09.00" ? 'bg-success' : 'bg-danger'}}">
                                        {{ $d -> jam_in}}
                                    </span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- * App Capsule -->


@endsection