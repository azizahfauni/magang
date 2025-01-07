<?php

namespace App\Http\Controllers;

use App\Models\InputData;
use Illuminate\Http\Request;

class InputDataController extends Controller
{
    // Fungsi untuk mendapatkan semua data input
    public function index()
    {
        $data = InputData::all(); // Mengambil semua data dari tabel input_data
        return response()->json($data); // Mengembalikan data dalam format JSON
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
