<?php

namespace App\Controllers;

use App\Models\NoticeModel;

class Make_notice extends BaseController
{
    protected $noticeModel;

    public function __construct()
    {
        $this->noticeModel = new NoticeModel();
    }

    public function notifyTo($bidang)
    {
        $data = [];
        $abcd = ['a', 'b', 'c', 'd'];

        if ($bidang == 'admin' || $bidang == 'manager bagian operasi') {
            foreach ($abcd as $shift) {
                $data[] = ['operator shift ' . $shift . ' ', 'shift' . strtoupper($shift)];
                $data[] = ['supervisor operasi shift ' . $shift, 'SpvShift' . strtoupper($shift)];
            }
            return $data;
        }

        $bid = explode(' ', $bidang);
        $shift = end($bid);
        $data[] = ['operator shift ' . $shift . ' ', 'shift' . strtoupper($shift)];

        return $data;
    }

    public function index()
    {
        $data = [
            'title' => 'make notice',
            'header' => ['title' => 'make notice', 'kembali' => '/'],
            'notifyTo' => $this->notifyTo(user()->bidang),
            'validation' => \Config\Services::validation()
        ];

        return view('make_notice/index', $data);
    }
    public function post()
    {
        $dataValidate = [
            'start_time' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus di isi'
                ]
            ],
            'end_time' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus di isi'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi notifikasi tidak boleh kosong'
                ]
            ]
        ];

        if (!$this->validate($dataValidate)) {
            return redirect()->to(base_url('/make_notice'))->withInput();
        }

        $notifyTo =  $this->request->getVar('shiftA') .
            $this->request->getVar('shiftB') .
            $this->request->getVar('shiftC') .
            $this->request->getVar('shiftD') .
            $this->request->getVar('SpvShiftA') .
            $this->request->getVar('SpvShiftB') .
            $this->request->getVar('SpvShiftC') .
            $this->request->getVar('SpvShiftD');

        if ($notifyTo == "") {
            session()->setFlashdata('pesanWarning', 'pilih NOTIFY TO terlebih dahulu');
            return redirect()->to(base_url('/make_notice'))->withInput();
        }

        $data = [
            'start_time' => $this->request->getVar('start_time'),
            'end_time' => $this->request->getVar('end_time'),
            'maked_by' => user()->fullname . ' | ' . user()->bidang,
            'notice_to' => $notifyTo,
            'content' => $this->request->getVar('content'),
            'updated_at' => date('Y-m-d'),
            'updated_by' => ''
        ];
        // dd($data);

        $this->noticeModel->setAllowedFields(array_keys($data));
        $this->noticeModel->save($data);

        session()->setFlashdata('pesanSuccess', 'anda telah menambahkan notice baru');
        return redirect()->to(base_url('/make_notice'));
    }
}
