<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;  // ← tambah ini
use App\Models\Pemesanan;
use App\Models\Penumpang;
use App\Models\Jadwal;
use App\Models\Kereta;

class PemesananController extends Controller {

    public function dashboard() {
        $totalPenumpang = Penumpang::count();
        $totalKereta = Kereta::count();
        $totalJadwal = Jadwal::count();
        $totalPemesanan = Pemesanan::count();
        $totalTiket = Pemesanan::sum('jumlah_tiket');
        $pemesananTerbaru = Pemesanan::with(['penumpang','jadwal.kereta'])->latest()->take(5)->get();
        return view('dashboard', compact('totalPenumpang','totalKereta','totalJadwal','totalPemesanan','totalTiket','pemesananTerbaru'));
    }

    public function penumpang() {
        $penumpang = Penumpang::withCount('pemesanan')->get();
        return view('penumpang', compact('penumpang'));
    }

    public function detailPenumpang($id) {
        $penumpang = Penumpang::findOrFail($id);
        $pemesanan = Pemesanan::with(['jadwal.kereta'])->where('id_penumpang', $id)->get();
        return view('detail_penumpang', compact('penumpang','pemesanan'));
    }

    public function kereta() {
        $kereta = Kereta::withCount('jadwal')->get();
        return view('kereta', compact('kereta'));
    }

    public function jadwal() {
        $jadwal = Jadwal::with('kereta')->get();
        return view('jadwal', compact('jadwal'));
    }

    public function pemesanan() {
        $pemesanan = Pemesanan::with(['penumpang','jadwal.kereta'])->get();
        return view('pemesanan', compact('pemesanan'));
    }

    public function laporan() {
        $lebihDua = Pemesanan::with(['penumpang','jadwal.kereta'])->where('jumlah_tiket','>', 2)->get();
        $keBandung = Jadwal::with('kereta')->where('stasiun_tujuan','Bandung')->get();
        $totalTiket = Penumpang::withSum('pemesanan','jumlah_tiket')->get();
        return view('laporan', compact('lebihDua','keBandung','totalTiket'));
    }

    public function createPenumpang() {
    return view('penumpang_create');
}

public function storePenumpang(Request $request) {
    Penumpang::create([
        'nama_penumpang' => $request->nama_penumpang,
        'nik' => $request->nik,
        'no_hp' => $request->no_hp,
    ]);
    return redirect('/penumpang');
}
public function editPenumpang($id) {
    $penumpang = Penumpang::findOrFail($id);
    return view('penumpang_edit', compact('penumpang'));
}

public function updatePenumpang(Request $request, $id) {
    $penumpang = Penumpang::findOrFail($id);
    $penumpang->update([
        'nama_penumpang' => $request->nama_penumpang,
        'nik' => $request->nik,
        'no_hp' => $request->no_hp,
    ]);
    return redirect('/penumpang');
}

public function hapusPenumpang($id) {
    Penumpang::findOrFail($id)->delete();
    return redirect('/penumpang');
}
public function createPemesanan() {
    $penumpang = Penumpang::all();
    $jadwal = Jadwal::with('kereta')->get();
    return view('pemesanan_create', compact('penumpang', 'jadwal'));
}

public function storePemesanan(Request $request) {
    Pemesanan::create([
        'id_penumpang' => $request->id_penumpang,
        'id_jadwal' => $request->id_jadwal,
        'tanggal_pesan' => $request->tanggal_pesan,
        'jumlah_tiket' => $request->jumlah_tiket,
    ]);
    return redirect('/pemesanan');
}
public function createJadwal() {
    $kereta = Kereta::all();
    return view('jadwal_create', compact('kereta'));
}

public function storeJadwal(Request $request) {
    Jadwal::create([
        'id_kereta' => $request->id_kereta,
        'stasiun_asal' => $request->stasiun_asal,
        'stasiun_tujuan' => $request->stasiun_tujuan,
        'tanggal_berangkat' => $request->tanggal_berangkat,
        'jam_berangkat' => $request->jam_berangkat,
    ]);
    return redirect('/jadwal');
}
public function createKereta() {
    return view('kereta_create');
}

public function storeKereta(Request $request) {
    Kereta::create([
        'nama_kereta' => $request->nama_kereta,
        'kelas' => $request->kelas,
    ]);
    return redirect('/kereta');
}
}