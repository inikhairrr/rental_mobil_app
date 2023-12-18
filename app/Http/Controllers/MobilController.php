<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\DataMobil;
use App\Models\DataRental;
use Carbon\Carbon;

class MobilController extends Controller
{
    public function addMobil()
    {
        return view('tambah_mobil');
    }

    public function storeMobil(Request $request)
    {
        $data = $request->validate([
            'merek' => 'required|string',
            'model' => 'required|string',
            'nomor_plat' => 'required|string',
            'tarif_sewa' => 'required|numeric',
        ]);

        DataMobil::create($data);

        return redirect()->route('mobil.storeMobil')->with('success', 'Mobil berhasil ditambahkan!');
    }

    public function listMobil()
    {
        $mobil = DataMobil::all();
        return view('daftar_mobil', compact('mobil'));
    }

    public function searchMobil(Request $request)
    {
        $keyword = $request->input('keyword');
        $mobil = DataMobil::where('merek', 'like', "%$keyword%")
            ->orWhere('model', 'like', "%$keyword%")
            ->Where('tersedia', true)
            ->get();

        return view('cari_mobil', compact('mobil'));
    }

    public function formRental($mobilId)
    {
        $mobil = DataMobil::findOrFail($mobilId);
        return view('form_rental', compact('mobil'));
    }

    public function storeRental(Request $request, $mobilId)
    {
        $data = $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
        ]);

        $user = $request->nomor_sim;
        
        $mobil = DataMobil::findOrFail($mobilId);
        $isAvailable = !$mobil->rentals()
            ->where(function ($query) use ($data) {
                $query->whereBetween('tanggal_mulai', [$data['tanggal_mulai'], $data['tanggal_selesai']])
                      ->orWhereBetween('tanggal_selesai', [$data['tanggal_mulai'], $data['tanggal_selesai']]);
            })
            ->exists();

        if (!$isAvailable) {
            return redirect()->back()->with('error', 'Mobil tidak tersedia pada tanggal yang diminta.');
        }
        
        DataRental::create([
            'user_id' => $user,
            'mobil_id' => $mobilId,
            'tanggal_mulai' => $data['tanggal_mulai'],
            'tanggal_selesai' => $data['tanggal_selesai'],
            'status' => 0, 
        ]);

        $update_mobil = DataMobil::find($mobilId);
        $update_mobil->tersedia = 0;        
        $update_mobil->update();

        return redirect()->route('mobil.daftarRental')->with('success', 'Peminjaman berhasil!');
    }

    public function daftarRental()
    {
        
        $rentals = DataRental::where('status', false)->get();

        return view('daftar_rental', compact('rentals'));
    }

    
    public function formPengembalian()
    {
        return view('pengembalian');
    }

    public function prosesPengembalian(Request $request)
    {
        $data = $request->validate([
            'nomor_sim' => 'required',
            'nomor_plat' => 'required|exists:data_mobil,nomor_plat',
        ]);

        $user = $request->nomor_sim;
        $mobil = DataMobil::where('nomor_plat', $data['nomor_plat'])->first();
        
        $rental = DataRental::where('user_id', $user)
            ->where('mobil_id', $mobil->id)
            ->where('status', 0) 
            ->latest()
            ->first();

        if (!$rental) {
            return redirect()->back()->with('error', 'Anda tidak sedang menyewa mobil ini.');
        }
       
        $tanggalMulai = Carbon::parse($rental->tanggal_mulai);
        $tanggalKembali = Carbon::now();
        
        $durasiSewa = $tanggalMulai->diffInDays($tanggalKembali);
        
        $biayaSewa = $durasiSewa * $mobil->tarif_sewa;
        
        $rental->update([
            'status' => 1, 
        ]);

        $mobil->update([
            'tersedia' => 1, 
        ]);

        return redirect()->route('mobil.listMobil')->with('success', 'Mobil berhasil dikembalikan. Biaya sewa: Rp ' . number_format($biayaSewa) . ' untuk durasi selama ' . $durasiSewa . ' hari.');
    }

    
}
