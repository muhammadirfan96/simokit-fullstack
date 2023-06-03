<?php

namespace App\Models;

use CodeIgniter\Model;

class LimasBoilerKeduaModel extends Model
{
    protected $table      = 'limasboilerkedua';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

    protected $peralatanBoilerKedua = [
        "sootblower C1,C2,C3,C4 #1",
        "sootblower C1,C2,C3,C4 #2",
        "sootblower C5,C6,C7,C8 #1",
        "sootblower C5,C6,C7,C8 #2",
        "sootblower B1,B2,B3,B4 #1",
        "sootblower B1,B2,B3,B4 #2",
        "sootblower B5,B6,B7,B8 #1",
        "sootblower B5,B6,B7,B8 #2",
        "sootblower B9,B10,B11,B12 #1",
        "sootblower B9,B10,B11,B12 #2",
        "sootblower B13,B14,B15,B16 #1",
        "sootblower B13,B14,B15,B16 #2",
        "sootblower B17,B18,B19,B20 #1",
        "sootblower B17,B18,B19,B20 #2",
        "sootblower B21,B22,B23,B24 #1",
        "sootblower B21,B22,B23,B24 #2",
        "sootblower B25,B26,B27,B28 #1",
        "sootblower B25,B26,B27,B28 #2",
        "paf 1a",
        "paf 2a",
        "paf 1b",
        "paf 2b",
        "saf 1a",
        "saf 2a",
        "saf 1b",
        "saf 2b"
    ];

    public function limasBoilerKedua()
    {
        $limasBoilerKedua = [];
        if ($this->where(['tanggal' => date('Y-m-d')])->first() == null) {
            $limasBoilerKedua[] = "!";
        } else {
            $rowLimasBoilerKedua = array_values($this->where(['tanggal' => date('Y-m-d')])->first());
            for ($i = 0; $i < count($rowLimasBoilerKedua); $i++) {
                if (!empty($rowLimasBoilerKedua[$i + 2])) {
                    $limasBoilerKedua[] = $this->peralatanBoilerKedua[$i];
                }
            }
        }

        return $limasBoilerKedua;
    }
}
