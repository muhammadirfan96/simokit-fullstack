<?php

namespace App\Models;

use CodeIgniter\Model;

class LimasAlbaPertamaModel extends Model
{
    protected $table      = 'limasalbapertama';
    protected $allowedFields = [];

    protected $peralatanAlbaPertama = [
        "compressor conveying A + drayer",
        "compressor conveying B + drayer",
        "compressor conveying C + drayer",
        "mcc area cwp",
        "CO2 room",
        "switch gear 6 kv A #1",
        "switch gear 6 kv A #2",
        "switch gear 6 kv B #1",
        "switch gear 6 kv B #2",
        "switch gear room common #1",
        "switch gear room common #2",
        "electronic equipment room #1",
        "electronic equipment room #2",
        "ccr",
        "sampling room #1",
        "sampling room #2",
        "compressor instrument A",
        "compressor instrument B + drayer",
        "compressor instrument C + drayer",
        "DC & UPS room #1",
        "DC & UPS room #2",
        "battery room",
        "plant comunication room",
        "main trafo & trafo PS room #1",
        "main trafo & trafo PS room #2",
        "trafo PS room #1",
        "trafo PS room #2",
        "outlet room"
    ];

    public function limasAlbaPertama()
    {
        $limasAlbaPertama = [];
        if ($this->where(['tanggal' => date('Y-m-d')])->first() == null) {
            $limasAlbaPertama[] = "!";
        } else {
            $rowLimasAlbaPertama = array_values($this->where(['tanggal' => date('Y-m-d')])->first());

            for ($i = 0; $i < count($rowLimasAlbaPertama); $i++) {
                if (!empty($rowLimasAlbaPertama[$i + 2])) {
                    $limasAlbaPertama[] = $this->peralatanAlbaPertama[$i];
                }
            }
        }

        return $limasAlbaPertama;
    }
}
