<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model {
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['id_kereta','stasiun_asal','stasiun_tujuan','tanggal_berangkat','jam_berangkat'];

    public function kereta() {
        return $this->belongsTo(Kereta::class, 'id_kereta');
    }
    public function pemesanan() {
        return $this->hasMany(Pemesanan::class, 'id_jadwal');
    }
}