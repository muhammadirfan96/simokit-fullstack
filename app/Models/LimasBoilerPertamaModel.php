<?php

namespace App\Models;

use CodeIgniter\Model;

class LimasBoilerPertamaModel extends Model
{
    protected $table      = 'limasboilerpertama';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

    protected $peralatanBoilerPertama = [
        "oil burner cooling fan #1",
        "oil burner cooling fan #2",
        "coal feeder 1a",
        "coal feeder 2a",
        "coal feeder 1b",
        "coal feeder 2b",
        "coal feeder 1c",
        "coal feeder 2c",
        "coal feeder 1d",
        "coal feeder 2d",
        "coal feeder 1e",
        "coal feeder 2e",
        "coal feeder 1f",
        "coal feeder 2f",
        "idf 1a",
        "idf 2a",
        "idf 1b",
        "idf 2b",
        "cooling fan 1a",
        "cooling fan 2a",
        "cooling fan 1b",
        "cooling fan 2b",
        "valve drain + sampling #1",
        "valve drain + sampling #2",
        "feeding mat bed #1",
        "feeding mat bed #2"
    ];

    public function limasBoilerPertama()
    {
        $limasBoilerPertama = [];
        if ($this->where(['tanggal' => date('Y-m-d')])->first() == null) {
            $limasBoilerPertama[] = "!";
        } else {
            $rowLimasBoilerPertama = array_values($this->where(['tanggal' => date('Y-m-d')])->first());
            for ($i = 0; $i < count($rowLimasBoilerPertama); $i++) {
                if (!empty($rowLimasBoilerPertama[$i + 2])) {
                    $limasBoilerPertama[] = $this->peralatanBoilerPertama[$i];
                }
            }
        }

        return $limasBoilerPertama;
    }
}
