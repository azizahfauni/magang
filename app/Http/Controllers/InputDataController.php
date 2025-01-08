<?php

namespace App\Http\Controllers;

use App\Models\InputData;
use Illuminate\Http\Request;

class InputDataController extends Controller
{
    // Fungsi untuk mendapatkan semua data input
    public function index(Request $request)
    {
        // Mulai query dengan model InputData
        $query = InputData::query();

        // Filter bidang jika ada
        if ($request->has('bidang') && $request->bidang !== '') {
            $query->where('bidang', $request->bidang);
        }

        // Filter kategori jika ada
        if ($request->has('kategori') && $request->kategori !== '') {
            $query->where('kategori', $request->kategori);
        }

        // Filter tahun jika ada
        if ($request->has('tahun') && $request->tahun !== '') {
            $query->where('tahun', $request->tahun);
        }

        // Pencarian umum (search)
        if ($request->has('search') && $request->search !== '') {
            $query->where('nama_perusahaan', 'like', '%' . $request->search . '%');
        }

        // Eksekusi query dan ambil hasil
        $data = $query->get();

        // Kembalikan hasil dalam format JSON
        return response()->json($data);
    }

    // Fungsi untuk mendapatkan data berdasarkan bidang tertentu
    public function filterByBidang($bidang)
    {
        $data = InputData::where('bidang', $bidang)->get();
        return response()->json($data); // Mengembalikan data yang difilter
    }

    // Fungsi untuk mencari data berdasarkan tahun
    public function filterByYear($tahun)
    {
        $data = InputData::where('tahun', $tahun)->get();
        return response()->json($data); // Mengembalikan data yang difilter
    }
}
