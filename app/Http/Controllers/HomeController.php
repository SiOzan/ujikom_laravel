<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $masyarakat        = User::where('role', 'masyarakat')->latest()->get();
        $kategoriPengaduan = KategoriPengaduan::latest()->get();
        return view('home', compact('masyarakat', 'kategoriPengaduan'));
    }
}
