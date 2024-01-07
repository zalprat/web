<?php

namespace App\Http\Controllers\Dashboard\RiwayatPesanan;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPesananController extends Controller
{
    public function index()
    {
        $data = Pesanan::with('user:id,name', 'cars:id,nama_mobil,merk_mobil')->where('user_id', Auth::user()->id)->paginate(10);
        return view('dashboard.riwayat_pesanan.index', compact('data'));
    }

    public function edit($id)
    {
        $riwayatPesanan = Pesanan::with('user:id,name', 'cars:id,nama_mobil,merk_mobil')->findOrFail($id);

        return view('dashboard.riwayat_pesanan.edit', compact('riwayatPesanan'));
    }

    public function update(Request $request, $id)
    {
        // Lakukan validasi data yang diterima dari formulir jika diperlukan
        $request->validate([
            'tgl_sewa' => 'required|date',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Temukan data pesanan berdasarkan ID
        $pesanan = Pesanan::findOrFail($id);

        // Update data pesanan berdasarkan input dari formulir
        $pesanan->tgl_sewa = $request->tgl_sewa;
        // Update properti lain sesuai kebutuhan

        // Simpan perubahan
        $pesanan->save();

        // Redirect ke halaman index atau halaman lain yang diinginkan
        return redirect()->route('riwayat-pesanan.index')->with('success', 'Data pesanan berhasil diperbarui.');
    }

    // Metode lainnya seperti create, delete, dll. sesuai kebutuhan
}
