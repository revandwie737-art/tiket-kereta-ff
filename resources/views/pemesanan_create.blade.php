@extends('layout')
@section('title', 'Tambah Pemesanan')
@section('content')
<div class="page-header">
  <p class="breadcrumb"><a href="/dashboard">KAI Express</a> › <a href="/pemesanan">Pemesanan</a> › Tambah</p>
  <h1>Tambah <span>Pemesanan</span></h1>
</div>
<div class="card">
  <div class="card-header">
    <div class="card-title">Form Tambah Pemesanan</div>
  </div>
  <form method="POST" action="/pemesanan" style="padding:24px;display:flex;flex-direction:column;gap:16px;">
    @csrf
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">Penumpang</label>
      <select name="id_penumpang" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
        <option value="">-- Pilih Penumpang --</option>
        @foreach($penumpang as $p)
        <option value="{{ $p->id_penumpang }}">{{ $p->nama_penumpang }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">Jadwal Kereta</label>
      <select name="id_jadwal" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
        <option value="">-- Pilih Jadwal --</option>
        @foreach($jadwal as $j)
        <option value="{{ $j->id_jadwal }}">{{ $j->kereta->nama_kereta }} | {{ $j->stasiun_asal }} → {{ $j->stasiun_tujuan }} | {{ $j->tanggal_berangkat }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">Tanggal Pesan</label>
      <input type="date" name="tanggal_pesan" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
    </div>
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">Jumlah Tiket</label>
      <input type="number" name="jumlah_tiket" min="1" max="10" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
    </div>
    <div style="display:flex;gap:12px;">
      <button type="submit"
        style="padding:10px 24px;background:#d4a017;border:none;border-radius:6px;color:#000;font-weight:600;cursor:pointer;">
        Simpan
      </button>
      <a href="/pemesanan"
        style="padding:10px 24px;background:#21262d;border:1px solid #30363d;border-radius:6px;color:#e6edf3;text-decoration:none;">
        Batal
      </a>
    </div>
  </form>
</div>
@endsection