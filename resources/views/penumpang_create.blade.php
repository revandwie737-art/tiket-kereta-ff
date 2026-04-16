@extends('layout')
@section('title', 'Tambah Penumpang')
@section('content')
<div class="page-header">
  <p class="breadcrumb"><a href="/dashboard">KAI Express</a> › <a href="/penumpang">Penumpang</a> › Tambah</p>
  <h1>Tambah <span>Penumpang</span></h1>
</div>
<div class="card">
  <div class="card-header">
    <div class="card-title">Form Tambah Penumpang</div>
  </div>
  <form method="POST" action="/penumpang" style="padding:24px;display:flex;flex-direction:column;gap:16px;">
    @csrf
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">Nama Penumpang</label>
      <input type="text" name="nama_penumpang" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
    </div>
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">NIK</label>
      <input type="text" name="nik" required maxlength="16"
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
    </div>
    <div>
      <label style="display:block;margin-bottom:6px;color:#8b949e">No HP</label>
      <input type="text" name="no_hp" required
        style="width:100%;padding:10px;background:#161b22;border:1px solid #30363d;border-radius:6px;color:#e6edf3;">
    </div>
    <div style="display:flex;gap:12px;">
      <button type="submit"
        style="padding:10px 24px;background:#d4a017;border:none;border-radius:6px;color:#000;font-weight:600;cursor:pointer;">
        Simpan
      </button>
      <a href="/penumpang"
        style="padding:10px 24px;background:#21262d;border:1px solid #30363d;border-radius:6px;color:#e6edf3;text-decoration:none;">
        Batal
      </a>
    </div>
  </form>
</div>
@endsection