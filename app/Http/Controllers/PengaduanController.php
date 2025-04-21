<?php
namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::where('status', 'Baru')->latest()->get();

        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function create()
    {
        $masyarakat        = User::where('role', 'masyarakat')->latest()->get();
        $kategoriPengaduan = KategoriPengaduan::latest()->get();
        return view('admin.pengaduan.create', compact('masyarakat', 'kategoriPengaduan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'masyarakat_id' => 'required|exists:users,id',
            'telepon'       => 'required|string|max:20',
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'required|string',
            'prioritas'     => 'required|in:Rendah,Sedang,Tinggi',
            'kategori_id'   => 'required|exists:kategori_pengaduans,id',
            'bukti'         => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'lokasi'        => 'required|string',
            // 'status'        => 'required|in:Baru,Proses,Selesai',
        ], [
            'nama.required'          => 'Nama harus diisi',
            'masyarakat_id.required' => 'Masyarakat harus diisi',
            'masyarakat_id.exists'   => 'Masyarakat tidak valid',
            'telepon.required'       => 'Nomor telepon harus diisi',
            'judul.required'         => 'Judul harus diisi',
            'deskripsi.required'     => 'Deskripsi harus diisi',
            'prioritas.required'     => 'Prioritas harus dipilih',
            'prioritas.in'           => 'Prioritas harus valid',
            'kategori_id.required'   => 'Kategori harus diisi',
            'kategori_id.exists'     => 'Kategori tidak valid',
            'bukti.image'            => 'File bukti harus berupa gambar',
            'bukti.mimes'            => 'Format bukti harus PNG atau JPG',
            'bukti.max'              => 'Ukuran bukti tidak boleh lebih dari 2MB',
            'lokasi.required'        => 'Lokasi harus diisi',
            // 'status.required'        => 'Status harus dipilih',
            // 'status.in'              => 'Status harus valid',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('pengaduan', 'public');
        }

        $pengaduan                = new Pengaduan();
        $pengaduan->nama          = $request->nama;
        $pengaduan->masyarakat_id = $request->masyarakat_id;
        $pengaduan->telepon       = $request->telepon;
        $pengaduan->judul         = $request->judul;
        $pengaduan->deskripsi     = $request->deskripsi;
        $pengaduan->prioritas     = $request->prioritas;
        $pengaduan->kategori_id   = $request->kategori_id;
        $pengaduan->bukti         = $buktiPath;
        $pengaduan->lokasi        = $request->lokasi;
        $pengaduan->status        = "Baru";
        $pengaduan->save();

        return redirect()->route('admin.pengaduan.index')->with('success', 'Data Pengaduan Berhasil Dibuat!');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'masyarakat_id' => 'required|exists:users,id',
            'telepon'       => 'required|string|max:20',
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'required|string',
            'prioritas'     => 'required|in:Rendah,Sedang,Tinggi',
            'kategori_id'   => 'required|exists:kategori_pengaduans,id',
            'bukti'         => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'lokasi'        => 'required|string',
            // 'status'        => 'required|in:Baru,Proses,Selesai',
        ], [
            'nama.required'          => 'Nama harus diisi',
            'masyarakat_id.required' => 'Masyarakat harus diisi',
            'masyarakat_id.exists'   => 'Masyarakat tidak valid',
            'telepon.required'       => 'Nomor telepon harus diisi',
            'judul.required'         => 'Judul harus diisi',
            'deskripsi.required'     => 'Deskripsi harus diisi',
            'prioritas.required'     => 'Prioritas harus dipilih',
            'prioritas.in'           => 'Prioritas harus valid',
            'kategori_id.required'   => 'Kategori harus diisi',
            'kategori_id.exists'     => 'Kategori tidak valid',
            'bukti.image'            => 'File bukti harus berupa gambar',
            'bukti.mimes'            => 'Format bukti harus PNG atau JPG',
            'bukti.max'              => 'Ukuran bukti tidak boleh lebih dari 2MB',
            'lokasi.required'        => 'Lokasi harus diisi',
            // 'status.required'        => 'Status harus dipilih',
            // 'status.in'              => 'Status harus valid',
        ]);

        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('pengaduan', 'public');
        }

        $pengaduan                = new Pengaduan();
        $pengaduan->nama          = $request->nama;
        $pengaduan->masyarakat_id = $request->masyarakat_id;
        $pengaduan->telepon       = $request->telepon;
        $pengaduan->judul         = $request->judul;
        $pengaduan->deskripsi     = $request->deskripsi;
        $pengaduan->prioritas     = $request->prioritas;
        $pengaduan->kategori_id   = $request->kategori_id;
        $pengaduan->bukti         = $buktiPath;
        $pengaduan->lokasi        = $request->lokasi;
        $pengaduan->status        = "Baru";
        $pengaduan->save();

        return redirect()->route('home')->with('success', 'Data Pengaduan Berhasil Dibuat!');
    }

    public function show(Pengaduan $pengaduan)
    {
        //
    }

    public function edit($id)
    {
        $pengaduan         = Pengaduan::findOrFail($id);
        $masyarakat        = User::where('role', 'masyarakat')->latest()->get();
        $kategoriPengaduan = KategoriPengaduan::latest()->get();
        return view('admin.pengaduan.edit', compact('pengaduan', 'masyarakat', 'kategoriPengaduan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'masyarakat_id' => 'required|exists:users,id',
            'telepon'       => 'required|string|max:20',
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'required|string',
            'prioritas'     => 'required|in:Rendah,Sedang,Tinggi',
            'kategori_id'   => 'required|exists:kategori_pengaduans,id',
            'bukti'         => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'lokasi'        => 'required|string',
            // 'status'        => 'required|in:Baru,Proses,Selesai',
        ], [
            'nama.required'          => 'Nama harus diisi',
            'masyarakat_id.required' => 'Masyarakat harus diisi',
            'masyarakat_id.exists'   => 'Masyarakat tidak valid',
            'telepon.required'       => 'Nomor telepon harus diisi',
            'judul.required'         => 'Judul harus diisi',
            'deskripsi.required'     => 'Deskripsi harus diisi',
            'prioritas.required'     => 'Prioritas harus dipilih',
            'prioritas.in'           => 'Prioritas harus valid',
            'kategori_id.required'   => 'Kategori harus diisi',
            'kategori_id.exists'     => 'Kategori tidak valid',
            'bukti.image'            => 'File bukti harus berupa gambar',
            'bukti.mimes'            => 'Format bukti harus PNG atau JPG',
            'bukti.max'              => 'Ukuran bukti tidak boleh lebih dari 2MB',
            'lokasi.required'        => 'Lokasi harus diisi',
            // 'status.required'        => 'Status harus dipilih',
            // 'status.in'              => 'Status harus valid',
        ]);

        $pengaduan                = Pengaduan::findOrFail($id);
        $pengaduan->nama          = $request->nama;
        $pengaduan->masyarakat_id = $request->masyarakat_id;
        $pengaduan->telepon       = $request->telepon;
        $pengaduan->judul         = $request->judul;
        $pengaduan->deskripsi     = $request->deskripsi;
        $pengaduan->prioritas     = $request->prioritas;
        $pengaduan->kategori_id   = $request->kategori_id;
        if ($request->hasFile('bukti')) {
            if ($pengaduan->bukti && Storage::disk('public')->exists($pengaduan->bukti)) {
                Storage::disk('public')->delete($pengaduan->bukti);
            }
            $path             = $request->file('bukti')->store('pengaduan', 'public');
            $pengaduan->bukti = $path;
        } elseif ($pengaduan->bukti === null) {
            $pengaduan->bukti = null;
        }
        $pengaduan->lokasi = $request->lokasi;
        $pengaduan->status = "Baru";
        $pengaduan->save();

        return redirect()->route('admin.pengaduan.index')->with('success', 'Data Pengaduan Berhasil Diubah!');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
