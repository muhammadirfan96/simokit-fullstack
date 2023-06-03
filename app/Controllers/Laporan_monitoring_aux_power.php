<?php

namespace App\Controllers;

use App\Models\LaporanMonitoringAuxPowerModel;

class Laporan_monitoring_aux_power extends BaseController
{
    protected $LpMonitoringAuxPowerModel;

    public function __construct()
    {
        $this->LpMonitoringAuxPowerModel = new LaporanMonitoringAuxPowerModel();
    }

    public function index()
    {
        $data = [
            'title' => 'input lp-mntring-aux-power',
            'header' => ['title' => 'input lap mntring aux power', 'kembali' => '/'],
            'validation' => \Config\Services::validation()
        ];

        return view('monitoringauxpower/index', $data);
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
            return redirect()->to(base_url('/laporan_monitoring_aux_power'))->withInput();
        }

        $data = [
            "nama_file" => $this->request->getVar('nama_file'),
            "link" => $this->request->getVar('link'),
            "created_by" => user()->username,
            "created_at" => date("Y-m-d H:i:s")
        ];

        // dd($data);

        $this->LpMonitoringAuxPowerModel->setAllowedFields(array_keys($data));
        $this->LpMonitoringAuxPowerModel->save($data);

        session()->setFlashdata('pesanSuccess', 'Data laporan monitoring aux power berhasil ditambahkan');

        return redirect()->to(base_url('/laporan_monitoring_aux_power'));
    }
}
