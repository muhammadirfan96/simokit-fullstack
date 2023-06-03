<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticeModel extends Model
{
    protected $table      = 'notice';
    protected $primaryKey = 'id';
    protected $allowedFields = [];
}
