<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPelanggan;

class RegistrasiPenggunaController extends Controller
{
    public function addPelanggan()
    {
        return view('registrasi_pelanggan');
    }

    public function storePelanggan(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string',
            'nomor_sim' => 'required|string',
        ]);

        DataPelanggan::create($data);       

        return redirect()->route('login_pelanggan.formLogin')->with('success', 'Registrasi berhasil.');
    }

    public function formLogin()
    {
        return view('login_pelanggan');
    }
    
    public function prosesLogin(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nomor_sim' => 'required',
        ]);

        $pelanggan = DataPelanggan::where('nama', $data['nama'])
            ->where('nomor_sim', $data['nomor_sim'])
            ->first();

        if (!$pelanggan) {
            return redirect()->back()->with('error', 'Nama atau nomor SIM tidak valid.');
        }
        
        $request->session()->put('nama', $pelanggan->nama);
        $request->session()->put('nomor_sim', $pelanggan->nomor_sim);

        return redirect()->route('mobil.listMobil')->with('success', 'Login berhasil.');
    }

    public function prosesLogout(Request $request)
    {        
        $request->session()->forget(['nama', 'nomor_sim']);
        
        return redirect()->route('login_pelanggan.formLogin')->with('success', 'Logout berhasil.');
    }
    

   
}
