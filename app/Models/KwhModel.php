<?php

namespace App\Models;

use CodeIgniter\Model;

class KwhModel extends Model
{
    protected $table      = 'kwh';
    protected $primaryKey = 'id';
    protected $allowedFields = [];
}
