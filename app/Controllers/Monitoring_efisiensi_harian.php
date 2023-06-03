<?php

namespace App\Controllers;

use App\Models\MonitoringEfisiensiHarianModel;

class Monitoring_efisiensi_harian extends BaseController
{
    protected $MonitoringEfisiensiHarianModel;

    public function __construct()
    {
        $this->MonitoringEfisiensiHarianModel = new MonitoringEfisiensiHarianModel();
    }

    public function index()
    {
        $data = [
            'title' => 'input monitoring-efisiensi-harian',
            'header' => ['title' => 'input mntring efsnsi harian', 'kembali' => '/'],
            'validation' => \Config\Services::validation()
        ];

        return view('monitoringefisiensiharian/index', $data);
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
            return redirect()->to(base_url('/monitoring_efisiensi_harian'))->withInput();
        }

        $data = [
            "nama_file" => $this->request->getVar('nama_file'),
            "link" => $this->request->getVar('link'),
            "created_by" => user()->username,
            "created_at" => date("Y-m-d H:i:s")
        ];

        // dd($data);

        $this->MonitoringEfisiensiHarianModel->setAllowedFields(array_keys($data));
        $this->MonitoringEfisiensiHarianModel->save($data);

        session()->setFlashdata('pesanSuccess', 'Data monitoring efisiensi harian berhasil ditambahkan');

        return redirect()->to(base_url('/monitoring_efisiensi_harian'));
    }
}
