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
        
        // Kalkulasi Statistik Keuangan
        $totalPemasukan = Finance::query()->where('jenis', 'pemasukan')->sum('nominal');
        $totalPengeluaran = Finance::query()->where('jenis', 'pengeluaran')->sum('nominal');
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

        // 2. Hitung saldo akhir baru secara otomatis
        if ($validated['jenis'] === 'pemasukan') {
            $validated['saldo_akhir'] = $saldoSebelumnya + $validated['nominal'];
        } else {
            $validated['saldo_akhir'] = $saldoSebelumnya - $validated['nominal'];
        }

        Finance::create($validated);

        return redirect()->route('admin.finances.index')->with('success', 'Transaksi berhasil dicatat & Saldo Akhir otomatis diperbarui!');
    }

    public function destroy(Finance $finance)
    {
        Finance::destroy($finance->id);
        return redirect()->back()->with('success', 'Riwayat transaksi berhasil dihapus!');
    }
}