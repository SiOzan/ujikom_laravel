<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'Petugas')->latest()->get();

        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required'     => 'Nama harus diisi',
            'email.required'    => 'Email harus diisi',
            'email.unique'      => 'Email sudah ada. Silakan masukkan email yang berbeda.',
            'password.required' => 'Password harus diisi',
        ]);

        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->role     = "Petugas";
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Akun petugas berhasil dibuat');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required'  => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
        ]);

        $user        = User::findOrFail($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $user->role = "Petugas";
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Akun petugas berhasil diubah!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->id != $user->id) {
            $user->delete(); // Menghapus data user
            return redirect()->route('admin.user.index')->with('success', 'Data berhasil dihapus!');
        }

        return redirect()->route('user.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
    }
}
