<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersKpiModel extends Model
{
    protected $table      = 'users_kpi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'kpi_id', 'approve', 'evidence'];
}
