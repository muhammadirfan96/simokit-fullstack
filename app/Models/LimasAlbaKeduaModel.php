<?php

namespace App\Models;

use CodeIgniter\Model;

class LimasAlbaKeduaModel extends Model
{
    protected $table      = 'limasalbakedua';
    protected $allowedFields = [];

    protected $peralatanAlbaKedua = [
        "compressor generator",
        "EDG",
        "panel EDG",
        "EDG & battery room pltg Alsthom",
        "panel pltg (elcon)",
        "mesin Alsthom (turbin & generator)",
        "switch gear room 400 v #1",
        "switch gear room 400 v #2"
    ];

    public function limasAlbaKedua()
    {
        $limasAlbaKedua = [];
        if ($this->where(['tanggal' => date('Y-m-d')])->first() == null) {
            $limasAlbaKedua[] = "!";
        } else {
            $rowLimasAlbaKedua = array_values($this->where(['tanggal' => date('Y-m-d')])->first());

            for ($i = 0; $i < count($rowLimasAlbaKedua); $i++) {
                if (!empty($rowLimasAlbaKedua[$i + 2])) {
                    $limasAlbaKedua[] = $this->peralatanAlbaKedua[$i];
                }
            }
        }
        return $limasAlbaKedua;
    }
}
