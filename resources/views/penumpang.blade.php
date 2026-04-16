@extends('layout')
@section('title', 'Penumpang')
@section('content')
<div class="page-header">
  <p class="breadcrumb"><a href="/dashboard">KAI Express</a> › Penumpang</p>
  <h1>Data <span>Penumpang</span></h1>
  <p>Daftar seluruh penumpang terdaftar</p>
</div>

<div class="card">
  <div class="card-header" style="display:flex;justify-content:space-between;align-items:center;">
    <div class="card-title">Daftar Penumpang</div>
    <a href="/penumpang/create" 
       style="padding:8px 16px;background:#d4a017;border-radius:6px;color:#000;font-weight:600;text-decoration:none;">
        + Tambah Penumpang
    </a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIK</th>
        <th>No HP</th>
        <th>Total Pemesanan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($penumpang as $i => $p)
      <tr>
        <td style="color:#8b949e">{{ $i + 1 }}</td>
        <td style="font-weight:500">{{ $p->nama_penumpang }}</td>
        <td style="color:#8b949e;font-family:monospace">{{ $p->nik }}</td>
        <td style="color:#8b949e">{{ $p->no_hp }}</td>
        <td><span class="badge badge-ok">{{ $p->pemesanan_count }} pesanan</span></td>
        <td style="display:flex;gap:8px;">
  <a href="/penumpang/{{ $p->id_penumpang }}" class="btn btn-secondary">Detail</a>
  <a href="/penumpang/{{ $p->id_penumpang }}/edit" 
     style="padding:6px 12px;background:#1f6feb;border-radius:6px;color:#fff;text-decoration:none;font-size:13px;">Edit</a>
  <a href="/penumpang/{{ $p->id_penumpang }}/hapus"
     onclick="return confirm('Yakin hapus penumpang ini?')"
     style="padding:6px 12px;background:#da3633;border-radius:6px;color:#fff;text-decoration:none;font-size:13px;">Hapus</a>
</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection