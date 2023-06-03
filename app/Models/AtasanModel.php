<?php

namespace App\Models;

use CodeIgniter\Model;

class AtasanModel extends Model
{
    protected $table      = 'atasan';
    protected $primaryKey = 'bawahan';
    protected $allowedFields = [];
}
