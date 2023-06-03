<?php

namespace App\Controllers;

use App\Models\WorkPlanEfisiensiModel;

class Work_plan_efisiensi extends BaseController
{
    protected $WpefisiensiModel;

    public function __construct()
    {
        $this->WpefisiensiModel = new WorkPlanEfisiensiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'input wp-efisiensi',
            'header' => ['title' => 'input work plan efisiensi', 'kembali' => '/'],
            'validation' => \Config\Services::validation()
        ];

        return view('workplanefisiensi/index', $data);
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
            return redirect()->to(base_url('/work_plan_efisiensi'))->withInput();
        }

        $data = [
            "nama_file" => $this->request->getVar('nama_file'),
            "link" => $this->request->getVar('link'),
            "created_by" => user()->username,
            "created_at" => date("Y-m-d H:i:s")
        ];

        $this->WpefisiensiModel->setAllowedFields(array_keys($data));
        $this->WpefisiensiModel->save($data);

        session()->setFlashdata('pesanSuccess', 'Data work plan efisiensi berhasil ditambahkan');

        return redirect()->to(base_url('/work_plan_efisiensi'));
    }
}
