<?php

namespace App\Models;

use CodeIgniter\Model;

class ChecklistModel extends Model
{
    protected $table      = 'checklist';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

    public function search($keyword)
    {
        return $this->table('checklist')->like('diinput_oleh', $keyword)->orLike('tanggal', $keyword)->orLike('namaPeralatan', $keyword);
    }
}
