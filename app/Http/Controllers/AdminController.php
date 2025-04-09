<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

    public function index()
    {
        $user = User::firstOrFail();

        return view('admin.dashboard', compact('user'));
    }
}
