<?php

namespace App\Http\Controllers\backend;

use App\Helpers\VisitorCounter;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $jumlahkategori = Kategori::count();
        $jumlahlayanan = Layanan::count();
        $statistik = VisitorCounter::count();
        return view('backend.dashboard', compact('jumlahkategori','jumlahlayanan','statistik'));
    }
}
