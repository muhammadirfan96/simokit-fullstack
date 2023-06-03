<?php

namespace App\Models;

use CodeIgniter\Model;

class LimasModel extends Model
{
    protected $table      = 'limas';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

    public function search($keyword)
    {
        return $this->table('limas')->like('diinput_oleh', $keyword)->orLike('tanggal', $keyword)->orLike('namaPeralatan', $keyword);
    }
}
