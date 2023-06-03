<?php

namespace App\Models;

use CodeIgniter\Model;

class LimasTurbinKeduaModel extends Model
{
    protected $table      = 'limasturbinkedua';
    protected $allowedFields = [];

    protected $peralatanTurbinKedua = [
        "ac oil pump",
        "dc oil pump",
        "gland seal fan #1",
        "gland seal fan #2",
        "oge fan #1",
        "oge fan #2",
        "turning gear #1",
        "turning gear #2",
        "lp heater drain pump a #1",
        "lp heater drain pump a #2",
        "lp heater drain pump b #1",
        "lp heater drain pump b #2",
        "lp heater 7 #1",
        "lp heater 7 #2",
        "lp heater 6 #1",
        "lp heater 6 #2",
        "lp heater 5 #1",
        "lp heater 5 #2",
        "lp heater 4 #1",
        "lp heater 4 #2",
        "hp heater a #1",
        "hp heater a #2",
        "hp heater b #1",
        "hp heater b #2",
        "gland steam condensor #1",
        "gland steam condensor #2",
        "valve daearator #1",
        "valve daearator #2"
    ];

    public function limasTurbinKedua()
    {
        $limasTurbinKedua = [];
        if ($this->where(['tanggal' => date('Y-m-d')])->first() == null) {
            $limasTurbinKedua[] = "!";
        } else {
            $rowLimasTurbinKedua = array_values($this->where(['tanggal' => date('Y-m-d')])->first());

            for ($i = 0; $i < count($rowLimasTurbinKedua); $i++) {
                if (!empty($rowLimasTurbinKedua[$i + 2])) {
                    $limasTurbinKedua[] = $this->peralatanTurbinKedua[$i];
                }
            }
        }

        return $limasTurbinKedua;
    }
}
