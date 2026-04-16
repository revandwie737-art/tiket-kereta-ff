<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 5 Penumpang
        DB::table('penumpang')->insert([
            ['nama_penumpang'=>'Andi Kurniawan','nik'=>'3201010101010001','no_hp'=>'081234567890','created_at'=>now(),'updated_at'=>now()],
            ['nama_penumpang'=>'Budi Santoso','nik'=>'3201010101010002','no_hp'=>'082345678901','created_at'=>now(),'updated_at'=>now()],
            ['nama_penumpang'=>'Citra Dewi','nik'=>'3201010101010003','no_hp'=>'083456789012','created_at'=>now(),'updated_at'=>now()],
            ['nama_penumpang'=>'Dian Pratiwi','nik'=>'3201010101010004','no_hp'=>'084567890123','created_at'=>now(),'updated_at'=>now()],
            ['nama_penumpang'=>'Eko Wijaya','nik'=>'3201010101010005','no_hp'=>'085678901234','created_at'=>now(),'updated_at'=>now()],
        ]);

        // 3 Kereta
        DB::table('kereta')->insert([
            ['nama_kereta'=>'Argo Parahyangan','kelas'=>'Eksekutif','created_at'=>now(),'updated_at'=>now()],
            ['nama_kereta'=>'Lodaya','kelas'=>'Bisnis','created_at'=>now(),'updated_at'=>now()],
            ['nama_kereta'=>'Kahuripan','kelas'=>'Ekonomi','created_at'=>now(),'updated_at'=>now()],
        ]);

        // 5 Jadwal
        DB::table('jadwal')->insert([
            ['id_kereta'=>1,'stasiun_asal'=>'Jakarta','stasiun_tujuan'=>'Bandung','tanggal_berangkat'=>'2025-07-10','jam_berangkat'=>'06:00:00','created_at'=>now(),'updated_at'=>now()],
            ['id_kereta'=>2,'stasiun_asal'=>'Jakarta','stasiun_tujuan'=>'Bandung','tanggal_berangkat'=>'2025-07-10','jam_berangkat'=>'09:30:00','created_at'=>now(),'updated_at'=>now()],
            ['id_kereta'=>3,'stasiun_asal'=>'Bandung','stasiun_tujuan'=>'Yogyakarta','tanggal_berangkat'=>'2025-07-11','jam_berangkat'=>'07:00:00','created_at'=>now(),'updated_at'=>now()],
            ['id_kereta'=>1,'stasiun_asal'=>'Jakarta','stasiun_tujuan'=>'Surabaya','tanggal_berangkat'=>'2025-07-12','jam_berangkat'=>'08:00:00','created_at'=>now(),'updated_at'=>now()],
            ['id_kereta'=>2,'stasiun_asal'=>'Semarang','stasiun_tujuan'=>'Bandung','tanggal_berangkat'=>'2025-07-13','jam_berangkat'=>'10:00:00','created_at'=>now(),'updated_at'=>now()],
        ]);

        // 5 Pemesanan
        DB::table('pemesanan')->insert([
            ['id_penumpang'=>1,'id_jadwal'=>1,'tanggal_pesan'=>'2025-07-05','jumlah_tiket'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['id_penumpang'=>2,'id_jadwal'=>2,'tanggal_pesan'=>'2025-07-06','jumlah_tiket'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['id_penumpang'=>3,'id_jadwal'=>3,'tanggal_pesan'=>'2025-07-07','jumlah_tiket'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['id_penumpang'=>4,'id_jadwal'=>4,'tanggal_pesan'=>'2025-07-08','jumlah_tiket'=>4,'created_at'=>now(),'updated_at'=>now()],
            ['id_penumpang'=>5,'id_jadwal'=>5,'tanggal_pesan'=>'2025-07-09','jumlah_tiket'=>1,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}