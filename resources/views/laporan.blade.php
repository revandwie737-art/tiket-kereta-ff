@extends('layout')
@section('title', 'Laporan')
@section('content')
<div class="page-header">
  <p class="breadcrumb"><a href="/dashboard">KAI Express</a> › Laporan</p>
  <h1>Data <span>Laporan</span></h1>
  <p>Hasil query laporan sistem pemesanan</p>
</div>

<div class="card">
  <div class="card-header">
    <div class="card-title">Pemesanan dengan Jumlah Tiket &gt; 2</div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Penumpang</th>
        <th>Kereta</th>
        <th>Rute</th>
        <th>Jumlah Tiket</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      @foreach($lebihDua as $i => $p)
      <tr>
        <td style="color:#8b949e">{{ $i + 1 }}</td>
        <td style="font-weight:500">{{ $p->penumpang->nama_penumpang }}</td>
        <td>{{ $p->jadwal->kereta->nama_kereta }}</td>
        <td style="color:#8b949e">{{ $p->jadwal->stasiun_asal }} → {{ $p->jadwal->stasiun_tujuan }}</td>
        <td><span class="badge badge-banyak">{{ $p->jumlah_tiket }} tiket</span></td>
        <td style="color:#8b949e">{{ $p->tanggal_pesan }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="card">
  <div class="card-header">
    <div class="card-title">Jadwal Kereta Tujuan Bandung</div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Kereta</th>
        <th>Kelas</th>
        <th>Asal</th>
        <th>Tujuan</th>
        <th>Jam</th>
      </tr>
    </thead>
    <tbody>
      @foreach($keBandung as $i => $j)
      <tr>
        <td style="color:#8b949e">{{ $i + 1 }}</td>
        <td style="font-weight:500">{{ $j->kereta->nama_kereta }}</td>
        <td><span class="badge badge-{{ strtolower($j->kereta->kelas) }}">{{ $j->kereta->kelas }}</span></td>
        <td>{{ $j->stasiun_asal }}</td>
        <td>{{ $j->stasiun_tujuan }}</td>
        <td style="color:#8b949e">{{ $j->jam_berangkat }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="card">
  <div class="card-header">
    <div class="card-title">Total Tiket per Penumpang</div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Penumpang</th>
        <th>Total Tiket</th>
      </tr>
    </thead>
    <tbody>
      @foreach($totalTiket as $i => $p)
      <tr>
        <td style="color:#8b949e">{{ $i + 1 }}</td>
        <td style="font-weight:500">{{ $p->nama_penumpang }}</td>
        <td><span class="badge badge-ok">{{ $p->pemesanan_sum_jumlah_tiket }} tiket</span></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection