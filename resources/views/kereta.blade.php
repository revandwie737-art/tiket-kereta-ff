@extends('layout')
@section('title', 'Kereta')
@section('content')
<div class="page-header">
  <p class="breadcrumb"><a href="/dashboard">KAI Express</a> › Kereta</p>
  <h1>Data <span>Kereta</span></h1>
  <p>Daftar seluruh kereta yang tersedia</p>
</div>

<div class="card">
  <div class="card-header" style="display:flex;justify-content:space-between;align-items:center;">
    <div class="card-title">Daftar Kereta</div>
    <a href="/kereta/create"
       style="padding:8px 16px;background:#d4a017;border-radius:6px;color:#000;font-weight:600;text-decoration:none;">
        + Tambah Kereta
    </a>
</div>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Kereta</th>
        <th>Kelas</th>
        <th>Total Jadwal</th>
      </tr>
    </thead>
    <tbody>
      @foreach($kereta as $i => $k)
      <tr>
        <td style="color:#8b949e">{{ $i + 1 }}</td>
        <td style="font-weight:500">{{ $k->nama_kereta }}</td>
        <td><span class="badge badge-{{ strtolower($k->kelas) }}">{{ $k->kelas }}</span></td>
        <td><span class="badge badge-ok">{{ $k->jadwal_count }} jadwal</span></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection