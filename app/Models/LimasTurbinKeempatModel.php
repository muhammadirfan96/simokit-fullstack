<?php

namespace App\Models;

use CodeIgniter\Model;

class LimasTurbinKeempatModel extends Model
{
    protected $table      = 'limasturbinkeempat';
    protected $allowedFields = [];

    protected $peralatanTurbinKeempat = [
        "eh oil a #1",
        "eh oil a #2",
        "eh oil b #1",
        "eh oil b #2",
        "booster pump a #1",
        "booster pump a #2",
        "booster pump b #1",
        "booster pump b #2",
        "booster pump c #1",
        "booster pump c #2",
        "booster pump d #1",
        "booster pump d #2",
        "valve debris a #1",
        "valve debris a #2",
        "valve debris b #1",
        "valve debris b #2",
        "he ccwp a #1",
        "he ccwp a #2",
        "he ccwp b #1",
        "he ccwp b #2",
        "cccwp a #1",
        "cccwp a #2",
        "cccwp b #1",
        "cccwp b #2"
    ];

    public function limasTurbinKeempat()
    {
        $limasTurbinKeempat = [];
        if ($this->where(['tanggal' => date('Y-m-d')])->first() == null) {
            $limasTurbinKeempat[] = "!";
        } else {
            $rowLimasTurbinKeempat = array_values($this->where(['tanggal' => date('Y-m-d')])->first());

            for ($i = 0; $i < count($rowLimasTurbinKeempat); $i++) {
                if (!empty($rowLimasTurbinKeempat[$i + 2])) {
                    $limasTurbinKeempat[] = $this->peralatanTurbinKeempat[$i];
                }
            }
        }

        return $limasTurbinKeempat;
    }
}
