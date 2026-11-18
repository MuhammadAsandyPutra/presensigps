<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hariini = date("Y-m-d");
        $bulanini = date("m") * 1;
        $tahunini = date("Y");
        $nik = Auth::guard('karyawan')->user()->nik;
        $presensihariini = DB::table('presensi')
            ->where('nik', $nik)
            ->where('tanggal_presensi', $hariini)
            ->first();
        $historibulanini = DB::table('presensi')
            ->leftJoin('jam_kerja', 'presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
            ->where('nik', $nik)
            ->whereRaw('MONTH(tanggal_presensi)="' . $bulanini . '"')
            ->whereRaw('YEAR(tanggal_presensi)="' . $tahunini . '"')
            ->orderBy('tanggal_presensi')
            ->get();

        // $rekappresensi = DB::table('presensi')
        //     ->selectRaw('COUNT(nik) as jmlhadir, SUM(IF(jam_in > "09.00",1,0)) as jmlterlambat')
        //     ->where('nik', $nik)
        //     ->whereRaw('MONTH(tanggal_presensi)="' . $bulanini . '"')
        //     ->whereRaw('YEAR(tanggal_presensi)="' . $tahunini . '"')
        //     ->first();

        $rekappresensi = DB::table('presensi')
            ->selectRaw("
        COUNT(nik) as jmlhadir,
        SUM(IF(jam_in > jam_masuk, 1, 0)) as jmlterlambat
    ")->leftJoin('jam_kerja', 'presensi.kode_jam_kerja', '=', 'jam_kerja.kode_jam_kerja')
            ->where('nik', $nik)
            ->whereMonth('tanggal_presensi', $bulanini)
            ->whereYear('tanggal_presensi', $tahunini)
            ->first();

        $leaderboard = DB::table('presensi')
            ->join('karyawan', 'presensi.nik', '=', 'karyawan.nik')
            ->where('tanggal_presensi', $hariini)
            ->orderBy('jam_in', 'asc')
            ->get();

        $namabulan = ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        $rekapizin = DB::table('pengajuan_izin')
            ->selectRaw("
        SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as jmlizin,
        SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as jmlsakit
    ")
            ->where('nik', $nik)
            ->whereMonth('tgl_izin', $bulanini)
            ->whereYear('tgl_izin', $tahunini)
            ->first();


        return view('dashboard.dashboard', compact('presensihariini', 'historibulanini', 'bulanini', 'tahunini', 'namabulan', 'rekappresensi', 'leaderboard', 'rekapizin'));
    }

    public function dashboardadmin()
    {
        $hariini = date("Y-m-d");
        $rekappresensi = DB::table('presensi')
            ->selectRaw('COUNT(nik) as jmlhadir, SUM(IF(jam_in > "09.00",1,0)) as jmlterlambat')
            ->where('tanggal_presensi', $hariini)

            ->first();

        $rekapizin = DB::table('pengajuan_izin')
            ->selectRaw('
        COUNT(CASE WHEN status = 1 THEN 1 END) AS jmlizin,
        COUNT(CASE WHEN status = 2 THEN 1 END) AS jmlsakit
    ')
            ->whereDate('tgl_izin', $hariini)
            ->first();


        return view('dashboard.dashboardadmin', compact('rekappresensi', 'rekapizin'));
    }
}
