<?php

namespace App\Controllers;

use App\Models\LaporanPerformanceTestModel;

class Laporan_performance_test extends BaseController
{
    protected $LaporanPT;

    public function __construct()
    {
        $this->LaporanPT = new LaporanPerformanceTestModel();
    }

    public function index()
    {
        $data = [
            'title' => 'input laporan-pt',
            'header' => ['title' => 'input laporan pt', 'kembali' => '/'],
            'validation' => \Config\Services::validation()
        ];

        return view('laporanpt/index', $data);
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
            return redirect()->to(base_url('/laporan_performance_test'))->withInput();
        }

        $data = [
            "nama_file" => $this->request->getVar('nama_file'),
            "link" => $this->request->getVar('link'),
            "created_by" => user()->username,
            "created_at" => date("Y-m-d H:i:s")
        ];

        // dd($data);

        $this->LaporanPT->setAllowedFields(array_keys($data));
        $this->LaporanPT->save($data);

        session()->setFlashdata('pesanSuccess', 'Data laporan performance test berhasil ditambahkan');

        return redirect()->to(base_url('/laporan_performance_test'));
    }
}
