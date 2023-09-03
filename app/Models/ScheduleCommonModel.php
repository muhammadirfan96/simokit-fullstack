<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleCommonModel extends Model
{
    protected $table      = 'schedulecommon';
    protected $primaryKey = 'id';
    protected $allowedFields = [];
    protected $tools = [
        "air compressor instrument & service a",
        "air compressor instrument & service b",
        "air compressor instrument & service c",
        "air compressor conveying a",
        "air compressor conveying b",
        "air compressor conveying c",
        "AC central equipment 1 a",
        "AC central equipment 1 b",
        "AC central equipment 2 a",
        "AC central equipment 2 b",
        "AC central ccr a",
        "AC central ccr b",
        "warming up edg",
        "warming up auxilliary boiler",
        "warming up pltg",
        "pengoperasian AC standing CCR",
        "pengoperasian purifier MOT",
    ];

    public function data()
    {
        $dataHariIni = $this->where(['tanggal' => date('Y-m-d')])->first();
        $dataHariKemarin = $this->where(['tanggal' => date('Y-m-d', strtotime("-1 day", strtotime(date('Y-m-d'))))])->first();
        $data = [$dataHariIni, $dataHariKemarin];
        return $data;
    }

    public function coDuaPeralatan($keyA, $keyB, $pesan1, $pesan2)
    {
        $changeOver = null;
        if ($this->data()[0]["$keyA"] !== $this->data()[1]["$keyA"] || $this->data()[0]["$keyB"] !== $this->data()[1]["$keyB"]) {
            $changeOver = "C.O. ";
            if (!empty($this->data()[0]["$keyA"])) {
                $changeOver .= " $pesan1";
            } else {
                $changeOver .= " $pesan2";
            }
        }
        return $changeOver;
    }

    public function coTigaPeralatan($keyA, $keyB, $keyC, $pesan1, $pesan2, $pesan3, $pesan4, $pesan5, $pesan6)
    {
        $changeOver = null;
        if ($this->data()[0]["$keyA"] !== $this->data()[1]["$keyA"] || $this->data()[0]["$keyB"] !== $this->data()[1]["$keyB"] || $this->data()[0]["$keyC"] !== $this->data()[1]["$keyC"]) {
            $changeOver = "C.O. ";
            if ($this->data()[0]["$keyA"] === $this->data()[1]["$keyA"]) {
                if (!empty($this->data()[0]["$keyB"])) {
                    $changeOver .= $pesan1;
                } else {
                    $changeOver .= $pesan2;
                }
            }

            if ($this->data()[0]["$keyB"] === $this->data()[1]["$keyB"]) {
                if (!empty($this->data()[0]["$keyA"])) {
                    $changeOver .= $pesan3;
                } else {
                    $changeOver .= $pesan4;
                }
            }

            if ($this->data()[0]["$keyC"] === $this->data()[1]["$keyC"]) {
                if (!empty($this->data()[0]["$keyA"])) {
                    $changeOver .= $pesan5;
                } else {
                    $changeOver .= $pesan6;
                }
            }
        }
        return $changeOver;
    }

    public function warmingUp($key, $pesan)
    {
        $changeOver = null;
        if (!empty($this->data()[0]["$key"])) {
            $changeOver = $pesan;
        }
        return $changeOver;
    }

    public function scheduleCommon()
    {
        $listCO = [];
        if ($this->data()[0] == null) {
            $listCO[] = "!";
        } elseif ($this->data()[1] == null) {
            $listCO[] = "?";
        } else {
            $listCO[] = $this->coTigaPeralatan(
                "compressorinstrumentservicea",
                "compressorinstrumentserviceb",
                "compressorinstrumentservicec",
                "COMPRESSOR INSTRUMENT & SERVICE C ke B",
                "COMPRESSOR INSTRUMENT & SERVICE B ke C",
                "COMPRESSOR INSTRUMENT & SERVICE C ke A",
                "COMPRESSOR INSTRUMENT & SERVICE A ke C",
                "COMPRESSOR INSTRUMENT & SERVICE B ke A",
                "COMPRESSOR INSTRUMENT & SERVICE A ke B"
            );
            $listCO[] = $this->coTigaPeralatan(
                "compressorconveyinga",
                "compressorconveyingb",
                "compressorconveyingc",
                "COMPRESSOR CONVEYING C ke B",
                "COMPRESSOR CONVEYING B ke C",
                "COMPRESSOR CONVEYING C ke A",
                "COMPRESSOR CONVEYING A ke C",
                "COMPRESSOR CONVEYING B ke A",
                "COMPRESSOR CONVEYING A ke B"
            );
            $listCO[] = $this->coDuaPeralatan(
                'ACcentralequipment1a',
                'ACcentralequipment1b',
                'AC CENTRAL EQUIPMENT 1 B ke A',
                'AC CENTRAL EQUIPMENT 1 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'ACcentralequipment2a',
                'ACcentralequipment2b',
                'AC CENTRAL EQUIPMENT 2 B ke A',
                'AC CENTRAL EQUIPMENT 2 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'ACcentralccra',
                'ACcentralccrb',
                'AC CENTRAL CCR B ke A',
                'AC CENTRAL CCR A ke B'
            );
            $listCO[] = $this->warmingUp(
                'warmingupedg',
                'WARMING UP EDG'
            );
            $listCO[] = $this->warmingUp(
                'warmingupauxboiler',
                'WARMING UP AUX BOILER'
            );
            $listCO[] = $this->warmingUp(
                'warminguppltg',
                'WARMING UP PLTG'
            );
            $listCO[] = $this->warmingUp(
                'acstandingccr',
                'PENGOPERASIAN AC STANDING CCR'
            );
            $listCO[] = $this->warmingUp(
                'purifiermot',
                'PENGOPERASIAN PURIFIER MOT'
            );
        }
        return $listCO;
    }
}
