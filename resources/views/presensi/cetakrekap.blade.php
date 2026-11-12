<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekap Presensi Karyawan</title>

    <style>
        /* ==============================
           PENGATURAN KERTAS
        ============================== */

        @page {
            size: A4 landscape;
            margin: 8mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #222;
            background: #eee;
            margin: 0;
            padding: 0;
        }

        .sheet {
            width: 100%;
            background: white;
            padding: 10mm;
            margin: 20px auto;
            min-height: 190mm;
        }

        /* ==============================
           KOP PERUSAHAAN
        ============================== */

        .kop-surat {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        .kop-surat td {
            vertical-align: middle;
        }

        .logo {
            width: 100px;
            text-align: center;
        }

        .logo img {
            width: 75px;
            height: 75px;
            object-fit: contain;
        }

        .identitas {
            text-align: center;
            padding-right: 100px;
        }

        .identitas h2 {
            font-size: 19px;
            font-weight: bold;
            margin: 0 0 5px;
            text-transform: uppercase;
        }

        .identitas h3 {
            font-size: 15px;
            margin: 0 0 5px;
        }

        .identitas p {
            font-size: 10px;
            line-height: 1.5;
            margin: 0;
        }

        .garis-kop {
            border: none;
            border-top: 3px solid #222;
            margin: 8px 0 2px;
        }

        .garis-kop-tipis {
            border: none;
            border-top: 1px solid #222;
            margin: 0 0 15px;
        }

        /* ==============================
           JUDUL LAPORAN
        ============================== */

        .judul-laporan {
            text-align: center;
            margin-bottom: 15px;
        }

        .judul-laporan h3 {
            font-size: 15px;
            text-transform: uppercase;
            margin: 0 0 5px;
        }

        .judul-laporan p {
            font-size: 11px;
            margin: 0;
        }

        /* ==============================
           TABEL REKAP PRESENSI
        ============================== */

        #tabelpresensi {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            font-size: 8px;
            color: #222;
        }

        #tabelpresensi th,
        #tabelpresensi td {
            border: 1px solid #222;
            text-align: center;
            vertical-align: middle;
            padding: 2px 1px;
        }

        #tabelpresensi thead th {
            background: #fff;
            color: #222;
            font-weight: bold;
        }

        /* Header utama */

        #tabelpresensi thead tr:first-child th {
            height: 27px;
            font-size: 9px;
        }

        /* Header nomor tanggal */

        #tabelpresensi thead tr:nth-child(2) th {
            height: 20px;
            font-size: 8px;
            padding: 2px 0;
        }

        /* Kolom NIK dan Nama */

        #tabelpresensi .kolom-nik {
            width: 17mm;
        }

        #tabelpresensi .kolom-nama {
            width: 36mm;
        }

        /* Kolom tanggal */

        #tabelpresensi .kolom-tanggal {
            width: 5mm;
        }

        /* Kolom total */

        #tabelpresensi .kolom-total-hadir {
            width: 30mm;
        }

        #tabelpresensi .kolom-total-terlambat {
            width: 39mm;
        }

        /* Baris data karyawan */

        #tabelpresensi tbody td {
            height: 11mm;
            font-size: 7px;
        }

        #tabelpresensi tbody td.nik {
            font-size: 8px;
            white-space: nowrap;
        }

        #tabelpresensi tbody td.nama {
            text-align: left;
            padding-left: 4px;
            font-size: 8px;
            overflow-wrap: anywhere;
        }

        /* Isi tanggal: jam masuk dan pulang */

        #tabelpresensi td.data-tanggal {
            padding: 1px 0;
            font-size: 5px;
            line-height: 1.5;
            white-space: nowrap;
        }

        .jam-masuk {
            display: block;
        }

        .jam-pulang {
            display: block;
        }

        /* Kolom total */

        #tabelpresensi td.total {
            font-size: 8px;
            font-weight: bold;
        }

        /* Baris kosong */

        .kosong {
            color: #bbb;
        }

        /* ==============================
           TANDA TANGAN HRD
        ============================== */

        .ttd-wrapper {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-top: 25px;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .ttd-hrd {
            width: 190px;
            text-align: center;
            font-size: 10px;
            line-height: 1.5;
        }

        .ttd-hrd p {
            margin: 0;
        }

        .ttd-hrd .tanggal {
            margin-bottom: 5px;
        }

        .ttd-hrd .jabatan {
            font-weight: bold;
        }

        .ttd-hrd .ruang-ttd {
            height: 65px;
        }

        .ttd-hrd .nama {
            font-weight: bold;
            text-decoration: underline;
        }

        /* ==============================
           TOMBOL CETAK
        ============================== */

        .tombol-cetak {
            display: block;
            width: 120px;
            margin: 15px auto;
            padding: 10px;
            background: #263b5a;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
        }

        /* ==============================
           PENGATURAN PRINT
        ============================== */

        @media print {

            body {
                background: white;
                margin: 0;
                padding: 0;
            }

            .sheet {
                width: 100%;
                min-height: 0;
                margin: 0;
                padding: 0;
                box-shadow: none;
            }

            .tombol-cetak {
                display: none;
            }

            #tabelpresensi {
                page-break-inside: auto;
            }

            #tabelpresensi thead {
                display: table-header-group;
            }

            #tabelpresensi tr {
                page-break-inside: avoid;
                break-inside: avoid;
            }

            #tabelpresensi th,
            #tabelpresensi td {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .ttd-wrapper {
                page-break-inside: avoid;
                break-inside: avoid;
            }
        }

        .jam-masuk.terlambat {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>

<body>

    @php
    $namaBulan = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
    ];
    @endphp

    <button class="tombol-cetak" onclick="window.print()">
        Cetak Laporan
    </button>

    <section class="sheet">

        <!-- KOP PERUSAHAAN -->

        <table class="kop-surat">
            <tr>
                <td class="logo">
                    <img src="{{ asset('assets/img/logo_bprs.jpeg') }}" alt="Logo BPRS">
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

        <!-- JUDUL LAPORAN -->

        <div class="judul-laporan">
            <h3>Rekapitulasi Presensi Seluruh Karyawan</h3>

            <p>
                Periode:
                {{ $namaBulan[(int) $bulan] ?? $bulan }}
                {{ $tahun }}
            </p>
        </div>

        <!-- TABEL REKAP -->

        <table id="tabelpresensi">

            <!-- PENGATURAN LEBAR KOLOM -->

            <colgroup>
                <col class="kolom-nik">
                <col class="kolom-nama">

                @for ($i = 1; $i <= 31; $i++)
                    <col class="kolom-tanggal">
                    @endfor

                    <col class="kolom-total-hadir">
                    <col class="kolom-total-terlambat">
            </colgroup>

            <thead>

                <!-- HEADER UTAMA -->

                <tr>
                    <th rowspan="2">NIK</th>

                    <th rowspan="2">
                        Nama Karyawan
                    </th>

                    <th colspan="31">
                        Tanggal
                    </th>

                    <th rowspan="2">
                        Total Kehadiran
                    </th>

                    <th rowspan="2">
                        Total Keterlambatan
                    </th>
                </tr>

                <!-- NOMOR TANGGAL -->

                <tr>
                    @for ($i = 1; $i <= 31; $i++)
                        <th>{{ $i }}</th>
                        @endfor
                </tr>

            </thead>

            <tbody>

                @forelse ($rekap as $d)

                @php
                $totalHadir = 0;
                $totalTerlambat = 0;
                @endphp

                <tr>

                    <!-- NIK -->

                    <td class="nik">
                        {{ $d->nik }}
                    </td>

                    <!-- NAMA KARYAWAN -->

                    <td class="nama">
                        {{ $d->nama_lengkap }}
                    </td>

                    <!-- DATA TANGGAL 1-31 -->

                    @for ($hari = 1; $hari <= 31; $hari++)

                        @php
                        $kolom='tgl_' . $hari;
                        $nilai=$d->$kolom ?? '';

                        $jamMasuk = '';
                        $jamPulang = '';

                        if (!empty($nilai)) {

                        $totalHadir++;

                        $pecahan = explode('-', $nilai, 2);

                        $jamMasuk = trim($pecahan[0] ?? '');
                        $jamPulang = trim($pecahan[1] ?? '');

                        // Hitung keterlambatan
                        if (
                        !empty($jamMasuk) &&
                        $jamMasuk > '09:00:00'
                        ) {
                        $totalTerlambat++;
                        }
                        }
                        @endphp

                        <td class="data-tanggal">

                            @if (!empty($nilai))

                            <span class="jam-masuk {{ $jamMasuk > '09:00:00' ? 'terlambat' : '' }}">
                                {{ substr($jamMasuk, 0, 5) }}
                            </span>

                            <span class="jam-pulang">
                                @if ($jamPulang && $jamPulang != '00:00:00')
                                {{ substr($jamPulang, 0, 5) }}
                                @else
                                -
                                @endif
                            </span>

                            @else

                            <span class="kosong">-</span>

                            @endif

                        </td>

                        @endfor

                        <!-- TOTAL KEHADIRAN -->

                        <td class="total">
                            {{ $totalHadir }} Hari
                        </td>

                        <!-- TOTAL KETERLAMBATAN -->

                        <td class="total">
                            {{ $totalTerlambat }} Kali
                        </td>

                </tr>

                @empty

                <tr>
                    <td colspan="35">
                        Tidak ada data presensi pada periode ini.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

        <!-- TANDA TANGAN HRD -->

        <div class="ttd-wrapper">

            <div class="ttd-hrd">

                <p class="tanggal">
                    Banjarmasin,
                    {{ date('d') }}
                    {{ $namaBulan[(int) date('n')] }}
                    {{ date('Y') }}
                </p>

                <p class="jabatan">
                    Mengetahui,<br>
                    HRD Manager
                </p>

                <div class="ruang-ttd"></div>

                <p class="nama">
                    Nama HRD
                </p>

                <p>
                    HRD Manager
                </p>

            </div>

        </div>

    </section>

</body>

</html>