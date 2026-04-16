@extends('layout')
@section('title', 'Dashboard')
@section('content')
<div class="page-header">
  <p class="breadcrumb">KAI Express</p>
  <h1>Dash<span>board</span></h1>
  <p>Selamat datang di sistem pemesanan KAI Express</p>
</div>

<div class="stats-grid">
  <div class="stat-card">
    <div class="stat-icon" style="background:rgba(232,93,4,0.15)">🧑</div>
    <div class="stat-num">{{ $totalPenumpang }}</div>
    <div class="stat-label">Total Penumpang</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon" style="background:rgba(59,130,246,0.15)">🚂</div>
    <div class="stat-num">{{ $totalKereta }}</div>
    <div class="stat-label">Total Kereta</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon" style="background:rgba(139,92,246,0.15)">📅</div>
    <div class="stat-num">{{ $totalJadwal }}</div>
    <div class="stat-label">Total Jadwal</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon" style="background:rgba(16,185,129,0.15)">🎫</div>
    <div class="stat-num">{{ $totalPemesanan }}</div>
    <div class="stat-label">Total Pemesanan</div>
  </div>
  <div class="stat-card">
    <div class="stat-icon" style="background:rgba(232,93,4,0.15)">🎟</div>
    <div class="stat-num">{{ $totalTiket }}</div>
    <div class="stat-label">Total Tiket Terjual</div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <div class="card-title">Pemesanan Terbaru</div>
    <a href="/pemesanan" class="btn btn-secondary">Lihat Semua</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Penumpang</th>
        <th>Kereta</th>
        <th>Rute</th>
        <th>Tiket</th>
        <th>Tanggal</th>
      </tr>        
    </thead>
    <tbody>
      @foreach($pemesananTerbaru as $p)
      <tr>
        <td style="font-weight:500">{{ $p->penumpang->nama_penumpang }}</td>
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