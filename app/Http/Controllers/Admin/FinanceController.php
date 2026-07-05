<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Athlete;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $finances = Finance::with('athlete')->orderBy('tanggal', 'desc')->orderBy('id', 'desc')->paginate(15);
        
        $totalPemasukan = Finance::where('jenis', 'pemasukan')->sum('nominal');
        $totalPengeluaran = Finance::where('jenis', 'pengeluaran')->sum('nominal');
        $saldoSekarang = $totalPemasukan - $totalPengeluaran;

        return view('admin.finances.index', compact('finances', 'totalPemasukan', 'totalPengeluaran', 'saldoSekarang'));
    }

    public function create()
    {
        // Ambil daftar atlet untuk dropdown pilihan siswa yang membayar kas
        $athletes = Athlete::orderBy('nama')->get();
        return view('admin.finances.create', compact('athletes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal'       => 'required|date',
            'jenis'         => 'required|in:pemasukan,pengeluaran',
            'kategori'      => 'required|string|max:100',
            'nominal'       => 'required|numeric|min:0',
            'keterangan'    => 'nullable|string',
            'athlete_id'    => 'nullable|exists:athletes,id',
            'bulan_tagihan' => 'nullable|string|max:50',
        ]);

        // 1. Ambil saldo akhir dari transaksi paling terakhir
        $transaksiTerakhir = Finance::orderBy('tanggal', 'desc')->orderBy('id', 'desc')->first();
        $saldoSebelumnya = $transaksiTerakhir ? $transaksiTerakhir->saldo_akhir : 0;

        // 2. Hitung saldo akhir otomatis
        if ($validated['jenis'] === 'pemasukan') {
            $validated['saldo_akhir'] = $saldoSebelumnya + $validated['nominal'];
        } else {
            $validated['saldo_akhir'] = $saldoSebelumnya - $validated['nominal'];
        }

        // 3. Jika kategori Iuran Kas Siswa, buat keterangan otomatis jika kosong
        if ($validated['athlete_id'] && empty($validated['keterangan'])) {
            $siswa = Athlete::find($validated['athlete_id']);
            $validated['keterangan'] = "Pembayaran Kas Bulan " . ($validated['bulan_tagihan'] ?? '-') . " a.n. " . ($siswa->nama ?? 'Siswa');
        }

        Finance::create($validated);

        return redirect()->route('admin.finances.index')->with('success', 'Pembayaran kas berhasil dicatat & Saldo Kas diperbarui!');
    }

    public function destroy(Finance $finance)
    {
        $finance->delete();
        return redirect()->back()->with('success', 'Riwayat transaksi berhasil dihapus!');
    }
}