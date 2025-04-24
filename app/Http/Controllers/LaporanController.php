<?php
namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan   = Laporan::latest()->get();
        $pengaduan = Pengaduan::all();
        $petugas   = Petugas::all();
        return view('admin.laporan.index', compact('laporan', 'pengaduan', 'petugas'));
    }

    public function create()
    {
        $pengaduan = Pengaduan::where('status', 'Baru')->latest()->get();
        $petugas   = Petugas::latest()->get();
        return view('admin.laporan.create', compact('pengaduan', 'petugas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pengaduan_id'    => 'required|exists:pengaduans,id',
            'petugas_id'      => 'required|exists:users,id',
            'bukti'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan'      => 'nullable|string',
            'tanggal_selesai' => 'nullable|date',
        ], [
            'pengaduan_id.required' => 'ID pengaduan wajib diisi.',
            'pengaduan_id.exists'   => 'ID pengaduan tidak valid.',
            'petugas_id.required'   => 'ID petugas wajib diisi.',
            'petugas_id.exists'     => 'ID petugas tidak valid.',
            'bukti.image'           => 'File bukti harus berupa gambar.',
            'bukti.mimes'           => 'Format gambar harus JPG atau PNG.',
            'bukti.max'             => 'Ukuran file tidak boleh lebih dari 2MB.',
            'tanggal_selesai.date'  => 'Tanggal selesai harus berupa tanggal yang valid.',
        ]);

        $path = null;
        if ($request->hasFile('bukti')) {
            $path = $request->file('bukti')->store('bukti_laporan', 'public');
        }

        $laporan                  = new Laporan();
        $laporan->pengaduan_id    = $request->pengaduan_id;
        $laporan->petugas_id      = $request->petugas_id;
        $laporan->bukti           = $path;
        $laporan->keterangan      = $request->keterangan;
        $laporan->tanggal_selesai = $request->tanggal_selesai;
        $laporan->save();

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $laporan   = Laporan::findOrFail($id);
        $pengaduan = Pengaduan::where('status', 'Baru')->latest()->get();
        $petugas   = Petugas::latest()->get();
        return view('admin.laporan.edit', compact('laporan', 'pengaduan', 'petugas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pengaduan_id'    => 'required|exists:pengaduans,id',
            'petugas_id'      => 'required|exists:users,id',
            'bukti'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan'      => 'nullable|string',
            'tanggal_selesai' => 'nullable|date',
        ], [
            'pengaduan_id.required' => 'ID pengaduan wajib diisi.',
            'pengaduan_id.exists'   => 'ID pengaduan tidak valid.',
            'petugas_id.required'   => 'ID petugas wajib diisi.',
            'petugas_id.exists'     => 'ID petugas tidak valid.',
            'bukti.image'           => 'File bukti harus berupa gambar.',
            'bukti.mimes'           => 'Format gambar harus JPG atau PNG.',
            'bukti.max'             => 'Ukuran file tidak boleh lebih dari 2MB.',
            'tanggal_selesai.date'  => 'Tanggal selesai harus berupa tanggal yang valid.',
        ]);

        $laporan                  = Laporan::findOrFail($id);
        $laporan->pengaduan_id    = $request->pengaduan_id;
        $laporan->petugas_id      = $request->petugas_id;
        $laporan->keterangan      = $request->keterangan;
        $laporan->tanggal_selesai = $request->tanggal_selesai;

        if ($request->hasFile('bukti')) {
            if ($laporan->bukti && Storage::disk('public')->exists($laporan->bukti)) {
                Storage::disk('public')->delete($laporan->bukti);
            }
            $path           = $request->file('bukti')->store('bukti_laporan', 'public');
            $laporan->bukti = $path;
        }
        $laporan->save();

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        if ($laporan->file && Storage::disk('public')->exists($laporan->file)) {
            Storage::disk('public')->delete($laporan->file);
        }
        $laporan->delete();

        return redirect()->route('admin.laporan.index')->with('success', 'Data laporan berhasil dihapus!');
    }

}
