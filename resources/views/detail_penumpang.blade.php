@extends('layout')
@section('title', 'Detail Penumpang')
@section('content')
<div class="page-header">
  <p class="breadcrumb"><a href="/dashboard">KAI Express</a> › <a href="/penumpang">Penumpang</a> › Detail</p>
  <h1>Detail <span>Penumpang</span></h1>
  <p>{{ $penumpang->nama_penumpang }}</p>
</div>

<div style="display:grid;grid-template-columns:1fr 1.5fr;gap:20px">
  <div class="detail-card">
    <div class="avatar">{{ strtoupper(substr($penumpang->nama_penumpang, 0, 1)) }}</div>
    <div class="detail-name">{{ $penumpang->nama_penumpang }}</div>
    <div class="detail-id">ID #{{ $penumpang->id_penumpang }}</div>
    <div class="detail-info">
      <div class="info-item">
        <label>NIK</label>
        <span>{{ $penumpang->nik }}</span>
      </div>
      <div class="info-item">
        <label>No HP</label>
        <span>{{ $penumpang->no_hp }}</span>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-title">Riwayat Pemesanan</div>
    </div>
    @if($pemesanan->count() > 0)
    <table class="table">
      <thead>
        <tr>
          <th>Kereta</th>
          <th>Rute</th>
          <th>Tiket</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pemesanan as $p)
        <tr>
          <td>
            <div style="font-weight:500">{{ $p->jadwal->kereta->nama_kereta }}</div>
            <span class="badge badge-{{ strtolower($p->jadwal->kereta->kelas) }}">{{ $p->jadwal->kereta->kelas }}</span>
          </td>
          <td style="color:#8b949e">{{ $p->jadwal->stasiun_asal }} → {{ $p->jadwal->stasiun_tujuan }}</td>
          <td><span class="badge {{ $p->jumlah_tiket > 2 ? 'badge-banyak' : 'badge-ok' }}">{{ $p->jumlah_tiket }} tiket</span></td>
          <td style="color:#8b949e">{{ $p->tanggal_pesan }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <div class="empty">Belum ada riwayat pemesanan</div>
    @endif
  </div>
</div>

<a href="/penumpang" class="btn btn-secondary" style="margin-top:8px">← Kembali</a>
@endsection