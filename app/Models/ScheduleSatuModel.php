<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleSatuModel extends Model
{
    protected $table      = 'schedulesatu';
    protected $primaryKey = 'id';
    protected $allowedFields = [];
    protected $tools = [
        "cwp c booster pump a",
        "cwp c booster pump b",
        "cwp d booster pump a",
        "cwp d booster pump b",
        "ccwp 1a",
        "ccwp 1b",
        "cep 1a",
        "cep 1b",
        "vacuum pump 1a",
        "vacuum pump 1b",
        "bfp 1a",
        "bfp 1b",
        "bfp 1c",
        "eh oil pump 1a",
        "eh oil pump 1b",
        "gland seal fan 1a",
        "gland seal fan 1b",
        "hpff 1a",
        "hpff 1b",
        "hpff 1c",
        "oge fan 1a",
        "oge fan 1b",
        "cooling fan 1a",
        "cooling fan 1b",
        "ball cleaning #1",
        "pengoperasian purifier eh oil #1"
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

    public function scheduleUnitSatu()
    {
        $listCO = [];
        if ($this->data()[0] == null) {
            $listCO[] = "!";
        } elseif ($this->data()[1] == null) {
            $listCO[] = "?";
        } else {
            $listCO[] = $this->coDuaPeralatan(
                'cwpcboosterpumpa',
                'cwpcboosterpumpb',
                'CWP C BOOSTER PUMP B ke A',
                'CWP C BOOSTER PUMP A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'cwpdboosterpumpa',
                'cwpdboosterpumpb',
                'CWP D BOOSTER PUMP B ke A',
                'CWP D BOOSTER PUMP A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'ccwp1a',
                'ccwp1b',
                'CCWP 1 B ke A',
                'CCWP 1 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'cep1a',
                'cep1b',
                'CEP 1 B ke A',
                'CEP 1 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'vacuumpump1a',
                'vacuumpump1b',
                'VACUUM PUMP 1 B ke A',
                'VACUUM PUMP 1 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'glandsealfan1a',
                'glandsealfan1b',
                'GLAND SEAL FAN 1 B ke A',
                'GLAND SEAL FAN 1 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'ogefan1a',
                'ogefan1b',
                'OIL GAS EXTRACTOR FAN 1 B ke A',
                'OIL GAS EXTRACTOR FAN 1 A ke B'
            );
            $listCO[] = $this->coDuaPeralatan(
                'coolingfan1a',
                'coolingfan1b',
                'COOLING FAN 1 B ke A',
                'COOLING FAN 1 A ke B'
            );
            $listCO[] = $this->coTigaPeralatan(
                "bfp1a",
                "bfp1b",
                "bfp1c",
                "FEED WATER PUMP 1 C ke B",
                "FEED WATER PUMP 1 B ke C",
                "FEED WATER PUMP 1 C ke A",
                "FEED WATER PUMP 1 A ke C",
                "FEED WATER PUMP 1 B ke A",
                "FEED WATER PUMP 1 A ke B"
            );
            $listCO[] = $this->coTigaPeralatan(
                "hpff1a",
                "hpff1b",
                "hpff1c",
                "HPFF 1 C ke B",
                "HPFF 1 B ke C",
                "HPFF 1 C ke A",
                "HPFF 1 A ke C",
                "HPFF 1 B ke A",
                "HPFF 1 A ke B"
            );
            $listCO[] = $this->ehOil(
                'ehoilpump1a',
                'ehoilpump1b',
                'WARMING UP EH OIL PUMP 1 B',
                'WARMING UP EH OIL PUMP 1 A'
            );
            $listCO[] = $this->warmingUp(
                'ballcleaning1',
                'PENGOPERASIAN BALL CLEANING #1'
            );
            $listCO[] = $this->warmingUp(
                'purifierehoil1',
                'PENGOPERASIAN PURIFIER EH OIL #1'
            );
        }
        return $listCO;
    }
}
