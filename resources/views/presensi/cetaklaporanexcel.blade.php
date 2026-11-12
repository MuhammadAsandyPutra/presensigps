<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Presensi Karyawan</title>

    <!-- Normalize CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Paper CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #222;
            background: #eee;
        }

        .sheet {
            padding: 15mm;
        }

        /* KOP PERUSAHAAN */
        .kop-surat {
            width: 100%;
            border-collapse: collapse;
        }

        .kop-surat td {
            vertical-align: middle;
        }

        .logo {
            width: 105px;
            text-align: center;
        }

        .logo img {
            width: 85px;
            height: 85px;
            object-fit: contain;
        }

        .identitas {
            text-align: center;
            padding-right: 80px;
        }

        .identitas h2 {
            font-size: 19px;
            font-weight: bold;
            margin: 0 0 6px;
            text-transform: uppercase;
        }

        .identitas h3 {
            font-size: 16px;
            margin: 0 0 5px;
            font-weight: bold;
        }

        .identitas p {
            font-size: 11px;
            margin: 0;
            line-height: 1.5;
        }

        .garis-kop {
            border: none;
            border-top: 3px solid #222;
            margin: 12px 0 2px;
        }

        .garis-kop-tipis {
            border: none;
            border-top: 1px solid #222;
            margin: 0 0 25px;
        }

        /* JUDUL LAPORAN */
        .judul-laporan {
            text-align: center;
            margin-bottom: 25px;
        }

        .judul-laporan h3 {
            font-size: 16px;
            margin: 0 0 8px;
            text-transform: uppercase;
        }

        .judul-laporan p {
            font-size: 12px;
            margin: 0;
        }

        /* IDENTITAS KARYAWAN */
        .subjudul-data {
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 8px;
            padding-bottom: 6px;
            border-bottom: 1px solid #333;
        }

        .tabeldatakaryawan {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            font-size: 12px;
        }

        .tabeldatakaryawan td {
            padding: 5px 8px;
            vertical-align: top;
        }

        .tabeldatakaryawan td:first-child {
            width: 120px;
            font-weight: bold;
        }

        .tabeldatakaryawan td:nth-child(2) {
            width: 15px;
            text-align: center;
        }

        .tabeldatakaryawan td:nth-child(3) {
            font-weight: 500;
        }

        /* IDENTITAS DAN FOTO KARYAWAN */
        .identitas-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 25px;
        }

        .identitas-info {
            flex: 1;
        }

        .foto-karyawan {
            width: 110px;
            text-align: center;
        }

        .foto-karyawan img {
            width: 100px;
            height: 130px;
            object-fit: cover;
            border: 1px solid #333;
            padding: 3px;
        }

        .foto-karyawan p {
            font-size: 10px;
            margin-top: 5px;
            color: #555;
        }

        /* TABEL REKAP PRESENSI */
        #tabelpresensi {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
            margin-top: 10px;
            color: #222;
        }

        #tabelpresensi th {
            background-color: #2c8447;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 9px 5px;
            border: 1px solid #265a4f;
            vertical-align: middle;
        }

        #tabelpresensi td {
            padding: 7px 5px;
            border: 1px solid #bbb;
            text-align: center;
            vertical-align: middle;
        }

        #tabelpresensi tbody tr:nth-child(even) {
            background-color: #f5f7fa;
        }

        #tabelpresensi tbody tr {
            page-break-inside: avoid;
        }

        #tabelpresensi img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 4px;
        }

        #tabelpresensi .keterangan {
            font-weight: bold;
            white-space: nowrap;
        }

        #tabelpresensi .tepat-waktu {
            color: #198754;
        }

        #tabelpresensi .terlambat {
            color: #dc3545;
        }

        #tabelpresensi .belum-pulang {
            color: #d97706;
        }

        /* TANDA TANGAN HRD */
        .ttd-wrapper {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-top: 45px;
            page-break-inside: avoid;
        }

        .ttd-hrd {
            width: 220px;
            text-align: center;
            font-size: 12px;
            line-height: 1.5;
        }

        .ttd-hrd .tanggal {
            margin-bottom: 5px;
        }

        .ttd-hrd .jabatan {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .ttd-hrd .ruang-ttd {
            height: 75px;
        }

        .ttd-hrd .nama {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 2px;
        }

        .ttd-hrd .posisi {
            font-size: 11px;
            color: #444;
        }

        @media print {
            #tabelpresensi th {
                background-color: #263b5a !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            #tabelpresensi tbody tr:nth-child(even) {
                background-color: #f5f7fa !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        /* PRINT */
        @media print {
            body {
                background: white;
            }

            .sheet {
                box-shadow: none;
            }
        }
    </style>
</head>

<body class="A4">

    <?php
    function selisih($jam_masuk, $jam_keluar)
    {
        list($h, $m, $s) = explode(":", $jam_masuk);
        $dtAwal = mktime($h, $m, $s, "1", "1", "1");
        list($h, $m, $s) = explode(":", $jam_keluar);
        $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
        $dtSelisih = $dtAkhir - $dtAwal;
        $totalmenit = $dtSelisih / 60;
        $jam = explode(".", $totalmenit / 60);
        $sisamenit = ($totalmenit / 60) - $jam[0];
        $sisamenit2 = $sisamenit * 60;
        $jml_jam = $jam[0];
        return $jml_jam . ":" . round($sisamenit2);
    }
    ?>

    <section class="sheet">

        <!-- KOP LAPORAN -->
        <table class="kop-surat">
            <tr>
                <td class="logo">
                    <img src="{{ asset('assets/img/logo_bprs.jpeg') }}"
                        alt="Logo BPRS">
                </td>

                <td class="identitas">
                    <h2>PT. BPRS Barkah Gemadana</h2>
                    <h3>Banjarmasin</h3>
                    <p>
                        Lembaga Keuangan Perbankan Syariah<br>
                        Jl. A. Yani Km 6,8 RT 10, Kertak Hanyar,
                        Kab. Banjar, Kalimantan Selatan 70654
                    </p>
                </td>
            </tr>
        </table>

        <hr class="garis-kop">
        <hr class="garis-kop-tipis">

        <!-- IDENTITAS KARYAWAN -->
        <div class="subjudul-data">
            Identitas Karyawan
        </div>

        <div class="identitas-wrapper">

            <!-- INFORMASI KARYAWAN -->
            <div class="identitas-info">
                <table class="tabeldatakaryawan">
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{ $karyawan->nik }}</td>
                    </tr>
                    <tr>
                        <td>Nama Karyawan</td>
                        <td>:</td>
                        <td>{{ $karyawan->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ $karyawan->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Departemen</td>
                        <td>:</td>
                        <td>{{ $karyawan->kode_dept }}</td>
                    </tr>
                    <tr>
                        <td>No. HP</td>
                        <td>:</td>
                        <td>{{ $karyawan->no_hp }}</td>
                    </tr>
                </table>
            </div>

        </div>
        <!-- REKAP PRESENSI -->
        <div class="subjudul-data">
            Rekapitulasi Presensi
        </div>

        <!-- Tambahkan tabel rekap presensi di bagian ini -->

        <table id="tabelpresensi">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>NIK</th>
                <th>Jam Masuk</th>

                <th>Jam Pulang</th>

                <th>Keterangan</th>
                <th>TWH</th>
            </tr>
            @foreach ( $presensi as $d)
            @php
            $jamterlambat = selisih('09:00:00', $d -> jam_in)
            @endphp
            <tr>
                <td>{{$loop -> iteration}}</td>
                <td>{{ date("d-m-Y", strtotime($d -> tanggal_presensi)) }}</td>
                <td>{{$d -> nik}}</td>
                <td>{{$d -> jam_in}}</td>
                <td>
                    {{$d -> jam_out != null ? $d-> jam_out : "Belum Absen"}}
                </td>


                <td>@if ($d -> jam_in > '09:00')
                    Terlambat {{$jamterlambat}}
                    @else
                    Tepat Waktu
                    @endif</td>
                <td>
                    @if ($d -> jam_out != null)
                    @php
                    $jmljamkerja = selisih($d->jam_in, $d->jam_out);
                    @endphp
                    @else
                    @php
                    $jmljamkerja = 0;

                    @endphp
                    @endif

                    {{$jmljamkerja}}
                </td>
            </tr>
            @endforeach
        </table>

        <div class="ttd-wrapper">
            <div class="ttd-hrd">

                <p class="tanggal">
                    Banjarmasin, {{ date('d F Y') }}
                </p>

                <p class="jabatan">
                    Mengetahui,
                    <br>HRD Manager
                </p>

                <div class="ruang-ttd"></div>

                <p class="nama">
                    Nama HRD
                </p>

                <p class="posisi">
                    HRD Manager
                </p>

            </div>
        </div>
    </section>

</body>

</html>