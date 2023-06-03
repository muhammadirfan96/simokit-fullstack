<?php

namespace App\Controllers;

class Approved_home extends BaseController
{
    public function index()
    {
        $data = [
            ['approved_servicerequest', 'fa-file-signature', 'service request'],
            ['approved_limas', 'fa-file-signature', 'kegiatan 5s'],
            ['approved_checklist', 'fa-file-signature', 'checklist sop']
        ];

        if (in_groups('logistic')) {
            unset($data[0]);
            unset($data[2]);
        }

        $datas = [
            'title' => 'approved | home',
            'header' => ['title' => 'my data', 'kembali' => '/'],
            'data' => $data,
        ];

        return view('approved_home/index', $datas);
    }
}
