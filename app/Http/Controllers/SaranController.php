<?php
namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function index()
    {
        $saran = Saran::latest()->get();
        $notifSaran = Saran::latest()->take(1)->get();

        return view('admin.saran.index', compact('saran', 'notifSaran'));
    }

    public function create()
    {
        return view('admin.saran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required',
            'email'     => 'required',
            'judul'     => 'required',
            'deskripsi' => 'required',
        ], [
            'nama.required'      => 'Nama harus diisi',
            'email.required'     => 'Email harus diisi',
            'judul.required'     => 'Judul laporan harus diisi',
            'deskripsi.required' => 'Deskripsi laporan harus diisi',
        ]);

        $saran            = new Saran();
        $saran->nama      = $request->nama;
        $saran->email     = $request->email;
        $saran->judul     = $request->judul;
        $saran->deskripsi = $request->deskripsi;
        $saran->save();

        return redirect()->route('admin.saran.index')->with('success', 'Data Berhasil Dibuat!');
    }

    public function show(Saran $saran)
    {
        //
    }

    public function edit(Saran $saran)
    {
        //
    }

    public function update(Request $request, Saran $saran)
    {
        //
    }

    public function destroy($id)
    {
        $saran = Saran::findOrFail($id);
        $saran->delete();
        return redirect()->route('admin.saran.index')->with('success', 'Data berhasil dihapus!');
    }
    
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required',
            'email'     => 'required',
            'judul'     => 'required',
            'deskripsi' => 'required',
        ], [
            'nama.required'      => 'Nama harus diisi',
            'email.required'     => 'Email harus diisi',
            'judul.required'     => 'Judul laporan harus diisi',
            'deskripsi.required' => 'Deskripsi laporan harus diisi',
        ]);

        $saran            = new Saran();
        $saran->nama      = $request->nama;
        $saran->email     = $request->email;
        $saran->judul     = $request->judul;
        $saran->deskripsi = $request->deskripsi;
        $saran->save();

        return redirect('/')->with('success', 'Data Berhasil Dibuat!');
    }

    public function indexFlutter()
    {
        try {
            $data = Saran::latest()->get();

            return response()->json([
                'success' => true,
                'message' => 'Data saran berhasil diambil.',
                'data'    => $data,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function storeFlutter(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required',
            'email'     => 'required|email',
            'judul'     => 'required',
            'deskripsi' => 'required',
        ], [
            'nama.required'      => 'Nama harus diisi.',
            'email.required'     => 'Email harus diisi.',
            'email.email'        => 'Email tidak valid.',
            'judul.required'     => 'Judul laporan harus diisi.',
            'deskripsi.required' => 'Deskripsi laporan harus diisi.',
        ]);

        try {
            $saran            = new Saran();
            $saran->nama      = $request->nama;
            $saran->email     = $request->email;
            $saran->judul     = $request->judul;
            $saran->deskripsi = $request->deskripsi;
            $saran->save();

            return response()->json([
                'success' => true,
                'message' => 'Data saran berhasil dibuat.',
                'data'    => $saran,
            ], 201); // 201 adalah status code untuk "Created"

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error'   => $e->getMessage(),
            ], 500); // 500 adalah status code untuk "Server Error"
        }
    }
}
