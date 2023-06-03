<?php

namespace App\Models;

use CodeIgniter\Model;

class LimasTurbinKetigaModel extends Model
{
    protected $table      = 'limasturbinketiga';
    protected $allowedFields = [];

    protected $peralatanTurbinKetiga = [
        "plat he ccw a #1",
        "plat he ccw a #2",
        "plat he ccw b #1",
        "plat he ccw b #2",
        "cep a #1",
        "cep a #2",
        "cep b #1",
        "cep b #2",
        "cwp a #1",
        "cwp a #2",
        "cwp b #1",
        "cwp b #2",
        "travelling screen a #1",
        "travelling screen a #2",
        "travelling screen b #1",
        "travelling screen b #2",
        "travelling screen c #1",
        "travelling screen c #2",
        "travelling screen d #1",
        "travelling screen d #2",
        "lube oil a #1",
        "lube oil a #2",
        "lube oil b #1",
        "lube oil b #2",
        "auxilliary steam deader #1",
        "auxilliary steam deader #2"
    ];

    public function limasTurbinKetiga()
    {
        $limasTurbinKetiga = [];
        if ($this->where(['tanggal' => date('Y-m-d')])->first() == null) {
            $limasTurbinKetiga[] = "!";
        } else {
            $rowLimasTurbinKetiga = array_values($this->where(['tanggal' => date('Y-m-d')])->first());

            for ($i = 0; $i < count($rowLimasTurbinKetiga); $i++) {
                if (!empty($rowLimasTurbinKetiga[$i + 2])) {
                    $limasTurbinKetiga[] = $this->peralatanTurbinKetiga[$i];
                }
            }
        }

        return $limasTurbinKetiga;
    }
}
