<?php
namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{

    public function index()
    {
        $petugas     = Petugas::latest()->get();
        $akunPetugas = User::all();

        return view('admin.petugas.index', compact('petugas', 'akunPetugas'));
    }

    public function create()
    {
        $akunPetugas = User::where('role', 'Petugas')
            ->whereDoesntHave('petugas')
            ->latest()
            ->get();

        return view('admin.petugas.create', compact('akunPetugas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto'      => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'telepon'   => 'required',
            'provinsi'  => 'required',
            'kab_kota'  => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat'    => 'required',
            'user_id'   => 'required',
        ], [
            'foto.required'      => 'Foto harus diisi',
            'foto.image'         => 'File harus berupa gambar',
            'foto.mimes'         => 'Format gambar harus PNG atau JPG',
            'foto.max'           => 'Ukuran gambar tidak boleh lebih dari 2MB',
            'telepon.required'   => 'Nomor telepon harus diisi',
            'provinsi.required'  => 'Provinsi harus diisi',
            'kab_kota.required'  => 'Kab/Kota harus diisi',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kelurahan.required' => 'Kelurahan harus diisi',
            'alamat.required'    => 'Alamat lengkap harus diisi',
            'user_id.required'   => 'Akun Petugas harus diisi',
        ]);

        $path = $request->file('foto')->store('petugas', 'public');

        $petugas            = new Petugas();
        $petugas->foto      = $path;
        $petugas->telepon   = $request->telepon;
        $petugas->provinsi  = $request->provinsi;
        $petugas->kab_kota  = $request->kab_kota;
        $petugas->kecamatan = $request->kecamatan;
        $petugas->kelurahan = $request->kelurahan;
        $petugas->alamat    = $request->alamat;
        $petugas->user_id   = $request->user_id;
        $petugas->save();

        return redirect()->route('admin.petugas.index')->with('success', 'Data Berhasil Dibuat!');
    }

    public function show(Petugas $petugas)
    {
        //
    }

    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        $akunPetugas = User::where('role', 'Petugas')->latest()->get();

        return view('admin.petugas.edit', compact('petugas', 'akunPetugas'));
    }

    public function update(Request $request, Petugas $petugas)
    {
        //
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        if ($petugas->foto && Storage::disk('public')->exists($petugas->foto)) {
            Storage::disk('public')->delete($petugas->foto);
        }
        $petugas->delete();

        return redirect()->route('admin.petugas.index')->with('success', 'data berhasil dihapus!');
    }
}
