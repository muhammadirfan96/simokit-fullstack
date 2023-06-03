<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiLimasModel extends Model
{
    protected $table      = 'nilailimas';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

    protected $checkItem = ["Makanan", "Komponen/Peralatan", "Order/Dokumen", "Pengumuman", "Pengendalian Visual", "Garis Pembagi", "Label Rak", "Jig/Peralatan", "B3", "Akses Darurat", "Lantai", "Mesin/Peralatan", "Tempat Sampah", "Peralatan Kebersihan", "Jadwal Kebersihan", "Pengisian Logsheet/Patrol Check/Logbook", "Berpakaian", "Kondisi Lingkungan", "Visual Display", "Safety Patrol", "Peraturan Perusahaan", "Berpakaian", "Hub. Antar Manusia", "Pemisahan Sampah", "Penilaian Umum"];
}
