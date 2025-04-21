<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleDuaModel extends Model
{
    protected $table      = 'scheduledua';
    protected $primaryKey = 'id';
    protected $allowedFields = [];
    protected $tools = [
        "cwp a booster pump a",
        "cwp a booster pump b",
        "cwp b booster pump a",
        "cwp b booster pump b",
        "ccwp 2a",
        "ccwp 2b",
        "cep 2a",
        "cep 2b",
        "vacuum pump 2a",
        "vacuum pump 2b",
        "bfp 2a",
        "bfp 2b",
        "bfp 2c",
        "eh oil pump 2a",
        "eh oil pump 2b",
        "gland seal fan 2a",
        "gland seal fan 2b",
        "hpff 2a",
        "hpff 2b",
        "hpff 2c",
        "oge fan 2a",
        "oge fan 2b",
        "cooling fan 2a",
        "cooling fan 2b",
        "ball cleaning #2",
        "pengoperasian purifier eh oil #2"
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

    public function ehOil($keyA, $keyB, $pesan1, $pesan2)
    {
        $changeOver = null;
        if (!empty($this->data()[0]["$keyA"]) && !empty($this->data()[1]["$keyA"])) {
            if (!empty($this->data()[0]["$keyB"])) {
                $changeOver = $pesan1;
            }
        } elseif (!empty($this->data()[0]["$keyB"]) && !empty($this->data()[1]["$keyB"])) {
            if (!empty($this->data()[0]["$keyA"])) {
                $changeOver = $pesan2;
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

    public function scheduleUnitDua()
    {
        $listCO = [];
        if ($this->data()[0] == null) {
            $listCO[] = "!";
        } elseif ($this->data()[1] == null) {
            $listCO[] = "?";
        } else {
            $listCO[] = $this->coDuaPeralatan(
                'cwpaboosterpumpa',
                'cwpaboosterpumpb',
                'CWP A BOOSTER PUMP B ke A',
                'CWP A BOOSTER PUMP A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'cwpbboosterpumpa',
                'cwpbboosterpumpb',
                'CWP B BOOSTER PUMP B ke A',
                'CWP B BOOSTER PUMP A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'ccwp2a',
                'ccwp2b',
                'CCWP 2 B ke A',
                'CCWP 2 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'cep2a',
                'cep2b',
                'CEP 2 B ke A',
                'CEP 2 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'vacuumpump2a',
                'vacuumpump2b',
                'VACUUM PUMP 2 B ke A',
                'VACUUM PUMP 2 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'glandsealfan2a',
                'glandsealfan2b',
                'GLAND SEAL FAN 2 B ke A',
                'GLAND SEAL FAN 2 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'ogefan2a',
                'ogefan2b',
                'OIL GAS EXTRACTOR FAN 2 B ke A',
                'OIL GAS EXTRACTOR FAN 2 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'coolingfan2a',
                'coolingfan2b',
                'COOLING FAN 2 B ke A',
                'COOLING FAN 2 A ke B'
            );
            $listCO[] = $this->coTigaPeralatan(
                "bfp2a",
                "bfp2b",
                "bfp2c",
                "FEED WATER PUMP 2 C ke B",
                "FEED WATER PUMP 2 B ke C",
                "FEED WATER PUMP 2 C ke A",
                "FEED WATER PUMP 2 A ke C",
                "FEED WATER PUMP 2 B ke A",
                "FEED WATER PUMP 2 A ke B"
            );
            $listCO[] = $this->coTigaPeralatan(
                "hpff2a",
                "hpff2b",
                "hpff2c",
                "HPFF 2 C ke B",
                "HPFF 2 B ke C",
                "HPFF 2 C ke A",
                "HPFF 2 A ke C",
                "HPFF 2 B ke A",
                "HPFF 2 A ke B"
            );
            $listCO[] = $this->ehOil(
                'ehoilpump2a',
                'ehoilpump2b',
                'WARMING UP EH OIL PUMP 2 B',
                'WARMING UP EH OIL PUMP 2 A'
            );
            $listCO[] = $this->warmingUp(
                'ballcleaning2',
                'PENGOPERASIAN BALL CLEANING #2'
            );
            $listCO[] = $this->warmingUp(
                'purifierehoil2',
                'PENGOPERASIAN PURIFIER EH OIL #2'
            );
        }
        return $listCO;
    }
}
