@extends('layout')
@section('title', 'Pemesanan')
@section('content')
<div class="page-header">
  <p class="breadcrumb"><a href="/dashboard">KAI Express</a> › Pemesanan</p>
  <h1>Data <span>Pemesanan</span></h1>
  <p>Daftar seluruh transaksi pemesanan tiket</p>
</div>

<div class="stats-grid">
  <div class="stat-card">
    <div class="stat-icon" style="background:rgba(16,185,129,0.15)">🎫</div>
    <div class="stat-num">{{ $pemesanan->count() }}</div>
    <div class="stat-label">Total Pemesanan</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon" style="background:rgba(232,93,4,0.15)">🎟</div>
    <div class="stat-num">{{ $pemesanan->sum('jumlah_tiket') }}</div>
    <div class="stat-label">Total Tiket</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon" style="background:rgba(139,92,246,0.15)">📊</div>
    <div class="stat-num">{{ $pemesanan->where('jumlah_tiket','>', 2)->count() }}</div>
    <div class="stat-label">Pesan &gt; 2 Tiket</div>
  </div>
</div>

<div class="card">
  <div class="card-header" style="display:flex;justify-content:space-between;align-items:center;">
    <div class="card-title">Daftar Pemesanan</div>
    <a href="/pemesanan/create"
       style="padding:8px 16px;background:#d4a017;border-radius:6px;color:#000;font-weight:600;text-decoration:none;">
        + Tambah Pemesanan
    </a>
</div>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Penumpang</th>
        <th>Kereta</th>
        <th>Rute</th>
        <th>Jumlah Tiket</th>
        <th>Tanggal Pesan</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pemesanan as $i => $p)
      <tr>
        <td style="color:#8b949e">{{ $i + 1 }}</td>
        <td>
          <a href="/penumpang/{{ $p->id_penumpang }}" style="color:#e85d04;text-decoration:none;font-weight:500">
            {{ $p->penumpang->nama_penumpang }}
          </a>
        </td>
        <td>{{ $p->jadwal->kereta->nama_kereta }}</td>
        <td style="color:#8b949e">{{ $p->jadwal->stasiun_asal }} → {{ $p->jadwal->stasiun_tujuan }}</td>
        <td><span class="badge {{ $p->jumlah_tiket > 2 ? 'badge-banyak' : 'badge-ok' }}">{{ $p->jumlah_tiket }} tiket</span></td>
        <td style="color:#8b949e">{{ $p->tanggal_pesan }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection