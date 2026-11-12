<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {

        $query = Karyawan::query();
        $query->select('karyawan.*', 'nama_dept');
        $query->join('departemen', 'karyawan.kode_dept', '=', 'departemen.kode_dept');
        $query->orderBy('nama_lengkap');

        if (!empty($request->nama_karyawan)) {
            $query->where('nama_lengkap', 'like', '%' . $request->nama_karyawan . '%');
        }

        if (!empty($request->kode_dept)) {
            $query->where('karyawan.kode_dept', $request->kode_dept);
        }

        $karyawan = $query->paginate(5);


        $departemen = DB::table('departemen')
            ->get();
        return view('karyawan.index', compact('karyawan', 'departemen'));
    }

    public function store(Request $request)
    {
        $nik = $request->nik;
        $nama_lengkap = $request->nama_lengkap;
        $jabatan = $request->jabatan;
        $no_hp = $request->no_hp;
        $kode_dept = $request->kode_dept;
        $password = Hash::make('12345');

        if ($request->hasFile('foto')) {
            $foto = $nik . '.' . $request->file('foto')->getClientOriginalExtension();

            $request->file('foto')->storeAs(
                'uploads/karyawan',
                $foto,
                'public'
            );

            $data['foto'] = $foto;
        } else {
            $foto = null;
        }

        try {
            $data = [
                'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'jabatan' => $jabatan,
                'no_hp' => $no_hp,
                'kode_dept' => $kode_dept,
                'foto' => $foto,
                'password' => $password,
            ];

            $simpan = DB::table('karyawan')
                ->insert($data);

            if ($simpan) {
                if ($request->hasFile('foto')) {
                    $foto = $nik . '.' . $request->file('foto')->getClientOriginalExtension();

                    $request->file('foto')->storeAs(
                        'uploads/karyawan',
                        $foto,
                        'public'
                    );

                    $data['foto'] = $foto;
                }
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Throwable $e) {
            if ($e->getCode() == 23000) {

                $message = " Data dengan NIK " . $nik . " Sudah Ada";
            }
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan ' . $message]);
        }
    }

    public function edit(Request $request)
    {

        $nik = $request->nik;
        $departemen = DB::table('departemen')
            ->get();
        $karyawan = DB::table('karyawan')->where('nik', $nik)->first();
        return view('karyawan.edit', compact('departemen', 'karyawan'));
    }

    // public function update($nik, Request $request)
    // {
    //     $nik = $request->nik;
    //     $nama_lengkap = $request->nama_lengkap;
    //     $jabatan = $request->jabatan;
    //     $no_hp = $request->no_hp;
    //     $kode_dept = $request->kode_dept;
    //     $password = Hash::make('12345');
    //     $old_foto = $request->old_foto;

    //     if ($request->hasFile('foto')) {
    //         $foto = $nik . '.' . $request->file('foto')->getClientOriginalExtension();

    //         $request->file('foto')->storeAs(
    //             'uploads/karyawan',
    //             $foto,
    //             'public'
    //         );

    //         $data['foto'] = $foto;
    //     } else {
    //         $foto = $old_foto;
    //     }

    //     try {
    //         $data = [
    //             'nama_lengkap' => $nama_lengkap,
    //             'jabatan' => $jabatan,
    //             'no_hp' => $no_hp,
    //             'kode_dept' => $kode_dept,
    //             'foto' => $foto,
    //             'password' => $password,
    //         ];

    //         $update = DB::table('karyawan')
    //             ->where('nik', $nik)
    //             ->update($data);

    //         if ($update) {

    //             if ($request->hasFile('foto')) {
    //                 $foto = $nik . '.' . $request->file('foto')->getClientOriginalExtension();

    //                 $request->file('foto')->storeAs(
    //                     'uploads/karyawan',
    //                     $foto,
    //                     'public'
    //                 );

    //                 $data['foto'] = $foto;
    //             }
    //             return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
    //         }
    //     } catch (\Throwable $e) {
    //         return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
    //     }
    // }

    public function update($nik, Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'kode_dept' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ambil data karyawan lama
        $karyawan = DB::table('karyawan')
            ->where('nik', $nik)
            ->first();

        if (!$karyawan) {
            return Redirect::back()->with([
                'warning' => 'Data Karyawan Tidak Ditemukan'
            ]);
        }

        $fotoLama = $karyawan->foto;
        $fotoBaru = $fotoLama;

        try {

            // Jika ada foto baru yang diupload
            if ($request->hasFile('foto')) {

                $file = $request->file('foto');

                $fotoBaru = $nik . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Simpan foto baru
                $file->storeAs(
                    'uploads/karyawan',
                    $fotoBaru,
                    'public'
                );
            }

            // Data yang akan diupdate
            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'jabatan' => $request->jabatan,
                'no_hp' => $request->no_hp,
                'kode_dept' => $request->kode_dept,
                'foto' => $fotoBaru,
            ];

            // Update database
            DB::table('karyawan')
                ->where('nik', $nik)
                ->update($data);

            // Jika foto baru berhasil disimpan dan database diperbarui,
            // hapus foto lama dari storage

            if ($request->hasFile('foto')) {

                $file = $request->file('foto');

                $fotoBaru = $nik . '.' . $file->getClientOriginalExtension();

                // Hapus foto lama jika ekstensinya berbeda
                if (!empty($fotoLama)) {
                    Storage::disk('public')->delete(
                        'uploads/karyawan/' . $fotoLama
                    );
                }

                // Simpan foto baru
                $file->storeAs(
                    'uploads/karyawan',
                    $fotoBaru,
                    'public'
                );
            }

            return Redirect::back()->with([
                'success' => 'Data Berhasil Diupdate'
            ]);
        } catch (\Throwable $e) {

            // Jika proses gagal, hapus foto baru agar tidak menjadi sampah
            if ($request->hasFile('foto') && $fotoBaru !== $fotoLama) {
                Storage::disk('public')->delete(
                    'uploads/karyawan/' . $fotoBaru
                );
            }

            return Redirect::back()->with([
                'warning' => 'Data Gagal Diupdate: ' . $e->getMessage()
            ]);
        }
    }

    public function delete($nik)
    {
        $delete = DB::table('karyawan')->where('nik', $nik)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus !']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus !']);
        }
    }
}
