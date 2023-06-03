<?php

namespace App\Models;

use CodeIgniter\Model;

class LimasTurbinPertamaModel extends Model
{
    protected $table      = 'limasturbinpertama';
    protected $allowedFields = [];

    protected $peralatanTurbinPertama = [
        "ball pump A + panel #1",
        "ball pump A + panel #2",
        "ball pump B + panel #1",
        "ball pump B + panel #2",
        "bfp 1a",
        "bfp 2a",
        "bfp 1b",
        "bfp 2b",
        "bfp 1c",
        "bfp 2c",
        "vacuum chamber pump a #1",
        "vacuum chamber pump a #2",
        "vacuum chamber pump b #1",
        "vacuum chamber pump b #2",
        "vacuum pump a #1",
        "vacuum pump a #2",
        "vacuum pump b #1",
        "vacuum pump b #2",
        "hp pump #1",
        "hp pump #2",
        "he lube oil a #1",
        "he lube oil a #2",
        "he lube oil b #1",
        "he lube oil b #2",
        "jo pump a #1",
        "jo pump a #2",
        "jo pump b #1",
        "jo pump b #2"
    ];

    public function limasTurbinPertama()
    {
        $limasTurbinPertama = [];
        if ($this->where(['tanggal' => date('Y-m-d')])->first() == null) {
            $limasTurbinPertama[] = "!";
        } else {
            $rowLimasTurbinPertama = array_values($this->where(['tanggal' => date('Y-m-d')])->first());
            for ($i = 0; $i < count($rowLimasTurbinPertama); $i++) {
                if (!empty($rowLimasTurbinPertama[$i + 2])) {
                    $limasTurbinPertama[] = $this->peralatanTurbinPertama[$i];
                }
            }
        }

        return $limasTurbinPertama;
    }
}
