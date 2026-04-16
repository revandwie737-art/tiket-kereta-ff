<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kereta extends Model {
    protected $table = 'kereta';
    protected $primaryKey = 'id_kereta';
    protected $fillable = ['nama_kereta','kelas'];

    public function jadwal() {
        return $this->hasMany(Jadwal::class, 'id_kereta');
    }
}