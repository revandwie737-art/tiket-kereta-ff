<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model {
    protected $table = 'penumpang';
    protected $primaryKey = 'id_penumpang';
    protected $fillable = ['nama_penumpang','nik','no_hp'];

    public function pemesanan() {
        return $this->hasMany(Pemesanan::class, 'id_penumpang');
    }
}