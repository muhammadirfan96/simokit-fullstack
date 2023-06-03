<?php

namespace App\Controllers;

use App\Models\KwhModel;

class Input_kwh extends BaseController
{
    protected $KwhModel;

    public function __construct()
    {
        $this->KwhModel = new KwhModel();
    }

    public function index()
    {

        $data = [
            'title' => 'input kwh',
            'header' => ['title' => 'input data kwh', 'kembali' => '/'],
            'validation' => \Config\Services::validation()
        ];

        return view('input_kwh/index', $data);
    }

    public function save()
    {
        d($this->request->getVar());
        $dataLama = $this->KwhModel
            ->where([
                'waktu' => $this->request->getVar('waktu'),
            ])
            ->first();

        $pesan = 'tidak ada data yang sama';
        if ($dataLama != null) {
            $this->KwhModel->delete($dataLama['id']);
            $pesan = 'data yang sama dihapus';
        }
        // die;
        $dataValidate = [
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'waktu harus di isi'
                ]
            ],
            'kit1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nilai tidak boleh kosong'
                ]
            ],
            'kit2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nilai tidak boleh kosong'
                ]
            ],
            'ps1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nilai tidak boleh kosong'
                ]
            ],
            'ps2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nilai tidak boleh kosong'
                ]
            ],
            'et1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nilai tidak boleh kosong'
                ]
            ],
            'et2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nilai tidak boleh kosong'
                ]
            ],
        ];
        if (!$this->validate($dataValidate)) {
            return redirect()->to(base_url('/input_kwh'))->withInput();
        }

        $data = [
            'diinput' => user_id() . ' | ' . date('Y-m-d H:i:s'),
            'waktu' => $this->request->getVar('waktu'),
            'kit1' => $this->request->getVar('kit1'),
            'kit2' => $this->request->getVar('kit2'),
            'ps1' => $this->request->getVar('ps1'),
            'ps2' => $this->request->getVar('ps2'),
            'et1' => $this->request->getVar('et1'),
            'et2' => $this->request->getVar('et2'),
        ];

        $this->KwhModel->setAllowedFields(array_keys($data));
        $this->KwhModel->save($data);

        session()->setFlashdata('pesanSuccess', 'data kwh berhasil ditambahkan' . $pesan);
        return redirect()->to(base_url('/input_kwh'));
    }
}
