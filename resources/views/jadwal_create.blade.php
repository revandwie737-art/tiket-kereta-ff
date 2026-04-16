@extends('layout')
@section('title', 'Tambah Jadwal')
@section('content')
<div class="page-header">
  <p class="breadcrumb"><a href="/dashboard">KAI Express</a> › <a href="/jadwal">Jadwal</a> › Tambah</p>
  <h1>Tambah <span>Jadwal</span></h1>
</div>
<div class="card">
  <div class="card-header">
    <div class="card-title">Form Tambah Jadwal</div>
  </div>
  <form method="POST" action="/jadwal" style="padding:24px;display:flex;flex-direction:column;gap:16px;">
    @csrf
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">Kereta</label>
      <select name="id_kereta" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
        <option value="">-- Pilih Kereta --</option>
        @foreach($kereta as $k)
        <option value="{{ $k->id_kereta }}">{{ $k->nama_kereta }} - {{ $k->kelas }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">Stasiun Asal</label>
      <input type="text" name="stasiun_asal" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
    </div>
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">Stasiun Tujuan</label>
      <input type="text" name="stasiun_tujuan" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
    </div>
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">Tanggal Berangkat</label>
      <input type="date" name="tanggal_berangkat" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
    </div>
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">Jam Berangkat</label>
      <input type="time" name="jam_berangkat" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
    </div>
    <div style="display:flex;gap:12px;">
      <button type="submit"
        style="padding:10px 24px;background:#d4a017;border:none;border-radius:6px;color:#000;font-weight:600;cursor:pointer;">
        Simpan
      </button>
      <a href="/jadwal"
        style="padding:10px 24px;background:#21262d;border:1px solid #30363d;border-radius:6px;color:#e6edf3;text-decoration:none;">
        Batal
      </a>
    </div>
  </form>
</div>
@endsection