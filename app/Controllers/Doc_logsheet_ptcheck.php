<?php

namespace App\Controllers;

use App\Models\DocLogsheetPtcheckModel;

class Doc_logsheet_ptcheck extends BaseController
{
    protected $DocLogsheetPtcheckModel;

    public function __construct()
    {
        $this->DocLogsheetPtcheckModel = new DocLogsheetPtcheckModel();
    }

    public function index()
    {
        $data = [
            'title' => 'input doc-logsheet-patrolcheck',
            'header' => ['title' => 'input doc logsheet patrolcheck', 'kembali' => '/'],
            'validation' => \Config\Services::validation()
        ];

        return view('doclogsheetptcheck/index', $data);
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
            return redirect()->to(base_url('/doc_logsheet_ptcheck'))->withInput();
        }

        $data = [
            "nama_file" => $this->request->getVar('nama_file'),
            "link" => $this->request->getVar('link'),
            "created_by" => user()->username,
            "created_at" => date("Y-m-d H:i:s")
        ];

        // dd($data);

        $this->DocLogsheetPtcheckModel->setAllowedFields(array_keys($data));
        $this->DocLogsheetPtcheckModel->save($data);

        session()->setFlashdata('pesanSuccess', 'Data doc logsheet dan patrolcheck berhasil ditambahkan');

        return redirect()->to(base_url('/doc_logsheet_ptcheck'));
    }
}
