<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceRequestModel extends Model
{
    protected $table      = 'srcm';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

    public function search($keyword)
    {
        return $this->table('srcm')->like('diinput_oleh', $keyword)->orLike('tanggal', $keyword)->orLike('area', $keyword)->orLike('ket', $keyword)->orLike('unit', $keyword);
    }
}
