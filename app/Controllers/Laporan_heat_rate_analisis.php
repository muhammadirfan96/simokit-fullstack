<?php

namespace App\Controllers;

use App\Models\LaporanHeatRateAnalisisModel;

class Laporan_heat_rate_analisis extends BaseController
{
    protected $LpHeatRateAnalisisModel;

    public function __construct()
    {
        $this->LpHeatRateAnalisisModel = new LaporanHeatRateAnalisisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'input lp-heat-rate-analisis',
            'header' => ['title' => 'input lap heat rate analisis', 'kembali' => '/'],
            'validation' => \Config\Services::validation()
        ];

        return view('heatrateanalisis/index', $data);
    }

    public function save()
    {
        if (user()->signature == '') {
            session()->setFlashdata('pesanWarning', 'masukkan tanda tangan terlebih dahulu');
            return redirect()->to(base_url('/profil'));
        }

        $dataValidate = [
            'nama_file' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama file harus di isi'
                ]
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'link drive harus di isi'
                ]
            ]
        ];

        if (!$this->validate($dataValidate)) {
            return redirect()->to(base_url('/laporan_heat_rate_analisis'))->withInput();
        }

        $data = [
            "nama_file" => $this->request->getVar('nama_file'),
            "link" => $this->request->getVar('link'),
            "created_by" => user()->username,
            "created_at" => date("Y-m-d H:i:s")
        ];

        // dd($data);

        $this->LpHeatRateAnalisisModel->setAllowedFields(array_keys($data));
        $this->LpHeatRateAnalisisModel->save($data);

        session()->setFlashdata('pesanSuccess', 'Data laporan heat rate analisis berhasil ditambahkan');

        return redirect()->to(base_url('/laporan_heat_rate_analisis'));
    }
}
