@extends('layout')
@section('title', 'Jadwal')
@section('content')
<div class="page-header">
  <p class="breadcrumb"><a href="/dashboard">KAI Express</a> › Jadwal</p>
  <h1>Data <span>Jadwal</span></h1>
  <p>Daftar seluruh jadwal kereta</p>
</div>

<div class="card">
  <div class="card-header" style="display:flex;justify-content:space-between;align-items:center;">
    <div class="card-title">Daftar Jadwal</div>
    <a href="/jadwal/create"
       style="padding:8px 16px;background:#d4a017;border-radius:6px;color:#000;font-weight:600;text-decoration:none;">
        + Tambah Jadwal
    </a>
</div>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Kereta</th>
        <th>Kelas</th>
        <th>Asal</th>
        <th>Tujuan</th>
        <th>Tanggal</th>
        <th>Jam</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jadwal as $i => $j)
      <tr>
        <td style="color:#8b949e">{{ $i + 1 }}</td>
        <td style="font-weight:500">{{ $j->kereta->nama_kereta }}</td>
        <td><span class="badge badge-{{ strtolower($j->kereta->kelas) }}">{{ $j->kereta->kelas }}</span></td>
        <td>{{ $j->stasiun_asal }}</td>
        <td>{{ $j->stasiun_tujuan }}</td>
        <td style="color:#8b949e">{{ $j->tanggal_berangkat }}</td>
        <td style="color:#8b949e">{{ $j->jam_berangkat }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection