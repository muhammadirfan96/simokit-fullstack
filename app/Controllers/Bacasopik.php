<?php

namespace App\Controllers;

use App\Models\Data_Nama_Peralatan_Sopik;

class Bacasopik extends BaseController
{
    public function getData($items)
    {
        $peralatan = new Data_Nama_Peralatan_Sopik();
        $data = [];
        foreach ($items as $item) {
            $data[] = [$item, $peralatan->allValues($item - 1), 'fa-book', $peralatan->allKeys($item - 1)];
        }
        return $data;
    }

    public function index()
    {
        $items = [];
        if (user()->bidang == 'admin') {
            $items = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        } elseif (user()->bidang == 'supervisor logistic' || user()->bidang == 'logistic') {
            $items = [6, 7, 8, 9];
        } else {
            $items = [1, 2, 3, 4, 5];
        }

        $datas = [
            'title' => 'baca sop ik',
            'header' => ['title' => 'list of sop ik', 'kembali' => '/'],
            'data' => $this->getData($items)
        ];

        return view('bacasopik/index', $datas);
    }

    public function details($bagian, $namaPeralatan)
    {
        $boiler = 'https://drive.google.com/drive/folders/1Ri6UnOa206v_HF7LhovdIGanya3yzqHj?usp=sharing';
        $turbin = 'https://drive.google.com/drive/folders/1i9XLQx_WecqSBz26Hzx54nb_VqSMzHmq?usp=sharing';
        $alba = 'https://drive.google.com/drive/folders/1P5ZZjGXmFCFO8bmHGAMwHe0xDdfan2FH?usp=sharing';
        $wtp = 'https://drive.google.com/drive/folders/1sKkrZu4jjiIwVa7oluaVYGKN47IgJDIy?usp=sharing';
        $umum = 'https://drive.google.com/drive/folders/18IBMwXVj5vIsY-C38LgdcKJmUsN1xO0s?usp=sharing';
        $mutu = '';
        $sml = '';
        $k3 = '';
        $antiSuap = '';

        switch ($bagian) {
            case 'boiler':
                header("Location: $boiler");
                break;
            case 'turbin':
                header("Location: $turbin");
                break;
            case 'alba':
                header("Location: $alba");
                break;
            case 'wtp':
                header("Location: $wtp");
                break;
            case 'umum':
                header("Location: $umum");
                break;
            case 'mutu':
                header("Location: $mutu");
                break;
            case 'sml':
                header("Location: $sml");
                break;
            case 'k3':
                header("Location: $k3");
                break;
            case 'anti-suap':
                header("Location: $antiSuap");
                break;
        }

        exit;

        // $data = [
        //     'bagian' => $bagian,
        //     'namaPeralatan' => $namaPeralatan
        // ];

        // return view('bacasopik/details', $data);
    }
}
