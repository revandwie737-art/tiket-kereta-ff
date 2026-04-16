<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RailNusa - Tiket Kereta</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{background:#0a0f1e;color:#f1f5f9;font-family:'Segoe UI',sans-serif;min-height:100vh}
.app{max-width:960px;margin:0 auto;padding:20px 16px 40px}
nav{display:flex;align-items:center;justify-content:space-between;padding:0 0 28px}
.logo{font-size:22px;font-weight:700;color:#f1f5f9}.logo span{color:#e8b86d}
.tabs{display:flex;gap:4px;background:#111827;border-radius:12px;padding:4px;margin-bottom:24px}
.tab{padding:8px 18px;border-radius:8px;font-size:13px;font-weight:500;cursor:pointer;color:#94a3b8;border:none;background:none;text-decoration:none;display:inline-block}
.tab.active,.tab:hover{background:#e8b86d;color:#0a0f1e}
.section-title{font-size:13px;color:#94a3b8;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:16px}
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:32px}
.stat-card{background:#111827;border:1px solid rgba(255,255,255,0.08);border-radius:14px;padding:16px;text-align:center}
.stat-num{font-size:28px;font-weight:700;color:#e8b86d;margin-bottom:4px}
.stat-label{font-size:12px;color:#94a3b8}
.card{background:#111827;border:1px solid rgba(255,255,255,0.08);border-radius:16px;overflow:hidden;margin-bottom:24px}
.table-header{display:grid;grid-template-columns:2fr 2fr 1fr 1fr;padding:12px 20px;background:#1a2332;font-size:11px;color:#94a3b8;text-transform:uppercase;letter-spacing:0.6px}
.table-row{display:grid;grid-template-columns:2fr 2fr 1fr 1fr;padding:14px 20px;border-top:1px solid rgba(255,255,255,0.08);font-size:13px;align-items:center}
.table-row:hover{background:rgba(255,255,255,0.02)}
.badge{font-size:11px;font-weight:600;padding:3px 10px;border-radius:99px}
.ekonomi{background:rgba(59,130,246,0.15);color:#60a5fa;border:1px solid rgba(59,130,246,0.3)}
.bisnis{background:rgba(139,92,246,0.15);color:#a78bfa;border:1px solid rgba(139,92,246,0.3)}
.eksekutif{background:rgba(232,184,109,0.15);color:#e8b86d;border:1px solid rgba(232,184,109,0.3)}
.tiket-ok{background:rgba(16,185,129,0.15);color:#34d399;border:1px solid rgba(16,185,129,0.3)}
.tiket-banyak{background:rgba(232,184,109,0.15);color:#e8b86d;border:1px solid rgba(232,184,109,0.3)}
.query-card{background:#111827;border:1px solid rgba(255,255,255,0.08);border-radius:14px;padding:18px;margin-bottom:16px}
.query-title{font-size:13px;font-weight:600;color:#e8b86d;margin-bottom:12px}
.query-row{display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.08);font-size:13px}
.hero{text-align:center;padding:40px 0 32px}
.hero h1{font-size:40px;font-weight:700;margin-bottom:12px}
.hero h1 span{color:#e8b86d}
.hero p{color:#94a3b8;font-size:15px;margin-bottom:28px}
.train-card{background:#111827;border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:20px;margin-bottom:12px}
.train-name{font-weight:600;font-size:15px}
.route-row{display:flex;align-items:center;gap:12px;margin:16px 0}
.station-time{font-size:22px;font-weight:700;color:#f1f5f9}
.station-name{font-size:12px;color:#94a3b8;margin-top:2px}
.line{flex:1;height:1px;background:rgba(255,255,255,0.1)}
.duration{font-size:11px;color:#94a3b8;padding:4px 10px;background:#1a2332;border-radius:99px;border:1px solid rgba(255,255,255,0.08)}
.price{font-size:20px;font-weight:700;color:#e8b86d}
.muted{color:#94a3b8;font-size:12px}
</style>
</head>
<body>
<div class="app">
  <nav>
    <div class="logo">Rail<span>Nusa</span></div>
  </nav>

  <div class="tabs">
    <a href="#beranda" class="tab active" onclick="showTab('beranda',this)">Beranda</a>
    <a href="#pemesanan" class="tab" onclick="showTab('pemesanan',this)">Pemesanan</a>
    <a href="#laporan" class="tab" onclick="showTab('laporan',this)">Laporan</a>
  </div>

  {{-- TAB BERANDA --}}
  <div id="beranda">
    <div class="hero">
      <h1>Perjalanan Nyaman,<br>Tiket <span>Mudah</span></h1>
      <p>Pesan tiket kereta api ke seluruh Indonesia</p>
    </div>
    <div class="section-title">Semua Jadwal Kereta</div>
    @foreach($jadwal as $j)
    <div class="train-card">
      <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
        <div class="train-name">{{ $j->kereta->nama_kereta }}</div>
        <span class="badge {{ strtolower($j->kereta->kelas) }}">{{ $j->kereta->kelas }}</span>
      </div>
      <div class="route-row">
        <div><div class="station-time">{{ $j->jam_berangkat }}</div><div class="station-name">{{ $j->stasiun_asal }}</div></div>
        <div class="line"></div>
        <div class="duration">Langsung</div>
        <div class="line"></div>
        <div style="text-align:right"><div class="station-time">—</div><div class="station-name">{{ $j->stasiun_tujuan }}</div></div>
      </div>
      <div class="muted">{{ $j->tanggal_berangkat }}</div>
    </div>
    @endforeach
  </div>

  {{-- TAB PEMESANAN --}}
  <div id="pemesanan" style="display:none">
    <div class="stats-grid">
      <div class="stat-card"><div class="stat-num">{{ $pemesanan->count() }}</div><div class="stat-label">Total Pemesanan</div></div>
      <div class="stat-card"><div class="stat-num">{{ $pemesanan->sum('jumlah_tiket') }}</div><div class="stat-label">Total Tiket</div></div>
      <div class="stat-card"><div class="stat-num">{{ $pemesanan->where('jumlah_tiket','>',2)->count() }}</div><div class="stat-label">Pesan &gt; 2 Tiket</div></div>
    </div>
    <div class="section-title">Data Pemesanan</div>
    <div class="card">
      <div class="table-header"><span>Penumpang</span><span>Jadwal</span><span>Tiket</span><span>Tanggal</span></div>
      @foreach($pemesanan as $p)
      <div class="table-row">
        <span style="font-weight:500">{{ $p->penumpang->nama_penumpang }}</span>
        <span class="muted">{{ $p->jadwal->kereta->nama_kereta }} · {{ $p->jadwal->stasiun_asal }}→{{ $p->jadwal->stasiun_tujuan }}</span>
        <span><span class="badge {{ $p->jumlah_tiket > 2 ? 'tiket-banyak' : 'tiket-ok' }}">{{ $p->jumlah_tiket }} tiket</span></span>
        <span class="muted">{{ $p->tanggal_pesan }}</span>
      </div>
      @endforeach
    </div>
  </div>

  {{-- TAB LAPORAN --}}
  <div id="laporan" style="display:none">
    <div class="section-title">Laporan & Query</div>
    <div class="query-card">
      <div class="query-title">Pemesanan dengan jumlah tiket &gt; 2</div>
      @foreach($lebihDua as $p)
      <div class="query-row"><span>{{ $p->penumpang->nama_penumpang }}</span><span style="color:#e8b86d">{{ $p->jumlah_tiket }} tiket</span></div>
      @endforeach
    </div>
    <div class="query-card">
      <div class="query-title">Jadwal kereta tujuan Bandung</div>
      @foreach($keBandung as $j)
      <div class="query-row"><span>{{ $j->kereta->nama_kereta }} · {{ $j->stasiun_asal }} → {{ $j->stasiun_tujuan }}</span><span class="muted">{{ $j->jam_berangkat }}</span></div>
      @endforeach
    </div>
    <div class="query-card">
      <div class="query-title">Total tiket per penumpang</div>
      @foreach($totalTiket as $p)
      <div class="query-row"><span>{{ $p->nama_penumpang }}</span><span style="color:#34d399">{{ $p->pemesanan_sum_jumlah_tiket }} tiket</span></div>
      @endforeach
    </div>
  </div>

</div>
<script>
function showTab(tab, el) {
  event.preventDefault();
  document.getElementById('beranda').style.display='none';
  document.getElementById('pemesanan').style.display='none';
  document.getElementById('laporan').style.display='none';
  document.getElementById(tab).style.display='block';
  document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
  el.classList.add('active');
}
</script>
</body>
</html>