<?php
namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use Illuminate\Http\Request;
use Str;

class KategoriPengaduanController extends Controller
{

    public function index()
    {
        $kategoriPengaduan = KategoriPengaduan::latest()->get();

        return view('admin.kategoriPengaduan.index', compact('kategoriPengaduan'));
    }

    public function create()
    {
        return view('admin.kategoriPengaduan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategori_pengaduans',
            'deskripsi'     => 'nullable',
        ], [
            'nama_kategori.required' => 'Nama Kategori harus diisi',
            'nama_kategori.unique'   => 'Nama Kategori sudah ada',
        ]);

        $kategoriPengaduan                = new KategoriPengaduan();
        $kategoriPengaduan->nama_kategori = $request->nama_kategori;

        $slug = Str::slug($request->nama_kategori);
        do {
            $randomString = Str::random(5);
            $uniqueSlug   = $slug . '-' . $randomString;
        } while (KategoriPengaduan::where('slug', $uniqueSlug)->exists());
        $kategoriPengaduan->slug = $uniqueSlug;

        $kategoriPengaduan->deskripsi = $request->deskripsi;
        $kategoriPengaduan->save();

        return redirect()->route('admin.kategoriPengaduan.index')->with('success', 'Data Berhasil Dibuat!');
    }

    public function edit($slug)
    {
        $kategoriPengaduan = KategoriPengaduan::where('slug', $slug)->firstOrFail();
        return view('admin.kategoriPengaduan.edit', compact('kategoriPengaduan'));
    }

    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required',
            'deskripsi'     => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori harus diisi',
            'deskripsi.required'     => 'Deskripsi harus diisi',
        ]);

        $kategoriPengaduan                = KategoriPengaduan::where('slug', $slug)->firstOrFail();
        $kategoriPengaduan->nama_kategori = $request->nama_kategori;

        $slug = Str::slug($request->nama_kategori);
        do {
            $randomString = Str::random(5);
            $uniqueSlug   = $slug . '-' . $randomString;
        } while (KategoriPengaduan::where('slug', $uniqueSlug)->exists());
        $kategoriPengaduan->slug = $uniqueSlug;

        $kategoriPengaduan->deskripsi = $request->deskripsi;
        $kategoriPengaduan->save();

        return redirect()->route('admin.kategoriPengaduan.index')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $kategoriPengaduan = KategoriPengaduan::findOrFail($id);
        $kategoriPengaduan->delete();
        return redirect()->route('admin.kategoriPengaduan.index')->with('success', 'Data berhasil dihapus!');
    }
}
