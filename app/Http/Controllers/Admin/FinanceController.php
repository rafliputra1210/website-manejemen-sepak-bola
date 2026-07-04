<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $finances = Finance::orderBy('tanggal', 'desc')->orderBy('id', 'desc')->paginate(15);
        
        // Menghitung ringkasan statistik keuangan
        $totalPemasukan = Finance::where('jenis', '=', 'pemasukan', 'and')->sum('nominal');
        $totalPengeluaran = Finance::where('jenis', '=', 'pengeluaran', 'and')->sum('nominal');
        $saldoSekarang = $totalPemasukan - $totalPengeluaran;

        return view('admin.finances.index', compact('finances', 'totalPemasukan', 'totalPengeluaran', 'saldoSekarang'));
    }

    public function create()
    {
        return view('admin.finances.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'kategori' => 'required|string|max:100',
            'nominal' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        // 1. Ambil saldo akhir dari transaksi paling terakhir
        $transaksiTerakhir = Finance::orderBy('tanggal', 'desc')->orderBy('id', 'desc')->first();
        $saldoSebelumnya = $transaksiTerakhir ? $transaksiTerakhir->saldo_akhir : 0;

        // 2. Kalkulasi saldo akhir baru secara otomatis
        if ($validated['jenis'] === 'pemasukan') {
            $validated['saldo_akhir'] = $saldoSebelumnya + $validated['nominal'];
        } else {
            $validated['saldo_akhir'] = $saldoSebelumnya - $validated['nominal'];
        }

        Finance::create($validated);

        return redirect()->route('admin.finances.index')->with('success', 'Transaksi berhasil dicatat! Saldo akhir telah diperbarui otomatis.');
    }

    public function destroy(Finance $finance)
    {
        Finance::destroy($finance->id);
        // Catatan: Dalam sistem akuntansi nyata, transaksi biasanya tidak dihapus melainkan dijurnal balik.
        return redirect()->back()->with('success', 'Riwayat transaksi berhasil dihapus!');
    }
}