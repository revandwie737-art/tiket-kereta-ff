<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RailNusa - @yield('title')</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{background:#0e0e0e;color:#c8bfa8;font-family:'Jost',sans-serif;display:flex;min-height:100vh}
.sidebar{width:230px;background:#111008;border-right:1px solid #2a2418;padding:0;position:fixed;height:100vh;overflow-y:auto}
.sb-logo{padding:24px 20px;border-bottom:1px solid #2a2418;margin-bottom:8px}
.sb-logo-box{display:flex;align-items:center;gap:10px}
.sb-icon{width:36px;height:36px;background:#c9a84c;border-radius:8px;display:flex;align-items:center;justify-content:center;font-family:'Cormorant Garamond',serif;font-weight:700;font-size:12px;color:#0e0e0e}
.sb-name{font-family:'Cormorant Garamond',serif;font-size:17px;font-weight:700;color:#f0e6c8}
.sb-sub{font-size:9px;color:#6b5e3a;text-transform:uppercase;letter-spacing:1.5px}
.sb-section{padding:12px 12px 4px}
.sb-label{font-size:9px;color:#6b5e3a;text-transform:uppercase;letter-spacing:1.5px;padding:0 8px;margin-bottom:6px}
.sb-item{display:flex;align-items:center;gap:8px;padding:9px 10px;border-radius:8px;font-size:13px;font-weight:500;color:#6b5e3a;text-decoration:none;margin-bottom:2px;transition:all 0.2s}
.sb-item:hover{color:#c9a84c;background:#1a1608}
.sb-item.active{background:#1e1a0e;color:#c9a84c;border:1px solid #3a3018}
.sb-item svg{width:15px;height:15px;flex-shrink:0}
.sb-dot{width:6px;height:6px;border-radius:50%;background:#c9a84c;margin-left:auto}
.main{margin-left:230px;flex:1;padding:28px;min-height:100vh}
.page-header{margin-bottom:24px}
.breadcrumb{font-size:11px;color:#6b5e3a;margin-bottom:8px}
.breadcrumb a{color:#6b5e3a;text-decoration:none}
.breadcrumb a:hover{color:#c9a84c}
.page-header h1{font-family:'Cormorant Garamond',serif;font-size:28px;font-weight:700;color:#f0e6c8;line-height:1;margin-bottom:4px}
.page-header h1 span{color:#c9a84c}
.page-header p{font-size:12px;color:#6b5e3a}
.gold-line{width:32px;height:2px;background:#c9a84c;margin:8px 0}
.stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:14px;margin-bottom:24px}
.stat-card{background:#151208;border:1px solid #2a2418;border-radius:12px;padding:16px;position:relative;overflow:hidden}
.stat-accent{position:absolute;top:0;left:0;width:3px;height:100%;background:#c9a84c}
.stat-icon{font-size:18px;margin-bottom:10px}
.stat-num{font-family:'Cormorant Garamond',serif;font-size:28px;font-weight:700;color:#c9a84c;line-height:1;margin-bottom:4px}
.stat-label{font-size:10px;color:#6b5e3a;text-transform:uppercase;letter-spacing:0.8px}
.card{background:#151208;border:1px solid #2a2418;border-radius:12px;overflow:hidden;margin-bottom:20px}
.card-header{padding:14px 18px;border-bottom:1px solid #2a2418;display:flex;justify-content:space-between;align-items:center}
.card-title{font-family:'Cormorant Garamond',serif;font-size:17px;font-weight:700;color:#f0e6c8}
.table{width:100%;border-collapse:collapse}
.table th{padding:11px 16px;text-align:left;font-size:9px;color:#6b5e3a;text-transform:uppercase;letter-spacing:1px;background:#111008;border-bottom:1px solid #2a2418}
.table td{padding:13px 16px;font-size:13px;border-bottom:1px solid #1e1a0e;color:#c8bfa8}
.table tr:last-child td{border-bottom:none}
.table tr:hover td{background:#1a1608}
.badge{font-size:10px;font-weight:500;padding:3px 10px;border-radius:99px;display:inline-block}
.badge-ekonomi{background:rgba(59,125,216,0.15);color:#6ab0f5;border:1px solid rgba(59,125,216,0.3)}
.badge-bisnis{background:rgba(124,77,204,0.15);color:#b48cf5;border:1px solid rgba(124,77,204,0.3)}
.badge-eksekutif{background:rgba(201,168,76,0.15);color:#c9a84c;border:1px solid rgba(201,168,76,0.3)}
.badge-ok{background:rgba(46,158,107,0.15);color:#5ecb99;border:1px solid rgba(46,158,107,0.3)}
.badge-banyak{background:rgba(201,168,76,0.15);color:#c9a84c;border:1px solid rgba(201,168,76,0.3)}
.avatar{width:30px;height:30px;border-radius:50%;background:#1e1a0e;display:inline-flex;align-items:center;justify-content:center;font-size:11px;font-weight:600;color:#c9a84c;border:1px solid #3a3018;margin-right:8px;vertical-align:middle}
.btn{display:inline-flex;align-items:center;gap:6px;padding:7px 16px;border-radius:8px;font-size:12px;font-weight:500;text-decoration:none;border:none;cursor:pointer;font-family:'Jost',sans-serif;transition:all 0.2s}
.btn-gold{background:#c9a84c;color:#0e0e0e;font-weight:600}
.btn-gold:hover{background:#d4b560}
.btn-outline{background:transparent;color:#c9a84c;border:1px solid #3a3018}
.btn-outline:hover{background:#1e1a0e}
.empty{text-align:center;padding:40px;color:#6b5e3a;font-size:13px}
.detail-grid{display:grid;grid-template-columns:1fr 1.8fr;gap:20px}
.detail-card{background:#151208;border:1px solid #2a2418;border-radius:12px;padding:24px;text-align:center}
.big-avatar{width:80px;height:80px;border-radius:50%;background:#1e1a0e;display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:700;color:#c9a84c;border:2px solid #3a3018;margin:0 auto 14px;font-family:'Cormorant Garamond',serif}
.detail-name{font-family:'Cormorant Garamond',serif;font-size:20px;font-weight:700;color:#f0e6c8;margin-bottom:4px}
.detail-id{font-size:11px;color:#6b5e3a;margin-bottom:20px}
.detail-info{display:grid;grid-template-columns:1fr 1fr;gap:12px;text-align:left}
.info-item label{font-size:10px;color:#6b5e3a;text-transform:uppercase;letter-spacing:0.8px;display:block;margin-bottom:4px}
.info-item span{font-size:13px;color:#c8bfa8;font-weight:500}
</style>
</head>
<body>
<div class="sidebar">
  <div class="sb-logo">
    <div class="sb-logo-box">
      <div class="sb-icon">RN</div>
      <div><div class="sb-name">RailNusa</div><div class="sb-sub">Sistem Pemesanan</div></div>
    </div>
  </div>
  <div class="sb-section">
    <div class="sb-label">Utama</div>
    <a href="/dashboard" class="sb-item {{ request()->is('dashboard') || request()->is('/') ? 'active' : '' }}">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1" stroke-width="2"/><rect x="14" y="3" width="7" height="7" rx="1" stroke-width="2"/><rect x="3" y="14" width="7" height="7" rx="1" stroke-width="2"/><rect x="14" y="14" width="7" height="7" rx="1" stroke-width="2"/></svg>
      Dashboard @if(request()->is('dashboard') || request()->is('/')) <div class="sb-dot"></div> @endif
    </a>
  </div>
  <div class="sb-section">
    <div class="sb-label">Data Master</div>
    <a href="/penumpang" class="sb-item {{ request()->is('penumpang*') ? 'active' : '' }}">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4" stroke-width="2"/></svg>
      Penumpang
    </a>
    <a href="/kereta" class="sb-item {{ request()->is('kereta') ? 'active' : '' }}">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="13" rx="2" stroke-width="2"/><path stroke-width="2" d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/></svg>
      Kereta
    </a>
    <a href="/jadwal" class="sb-item {{ request()->is('jadwal') ? 'active' : '' }}">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" stroke-width="2"/><path stroke-width="2" d="M16 2v4M8 2v4M3 10h18"/></svg>
      Jadwal
    </a>
  </div>
  <div class="sb-section">
    <div class="sb-label">Transaksi</div>
    <a href="/pemesanan" class="sb-item {{ request()->is('pemesanan') ? 'active' : '' }}">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
      Pemesanan
    </a>
    <a href="/laporan" class="sb-item {{ request()->is('laporan') ? 'active' : '' }}">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
      Laporan
    </a>
  </div>
</div>
<div class="main">
  @yield('content')
</div>
</body>
</html>