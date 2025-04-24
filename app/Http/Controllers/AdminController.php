<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Petugas;
use App\Models\Pengaduan;

class AdminController extends Controller
{

    public function index()
    {
        $user = User::firstOrFail();
        $petugas = Petugas::count();
        $masyarakat = User::where('role', 'Masyarakat')->count();
        $pengaduan = Pengaduan::count();

        return view('admin.dashboard', compact('user', 'petugas', 'masyarakat', 'pengaduan'));
    }
}
