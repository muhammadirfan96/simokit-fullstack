<?php

namespace App\Controllers;

use App\Models\NoticeModel;

class Db_notice extends BaseController
{
    protected $noticeModel;
    public function __construct()
    {
        $this->noticeModel = new NoticeModel();
    }

    public function findNotice()
    {
        if (!in_groups('admin')) {
            return $this->noticeModel->where('maked_by', user()->fullname . ' | ' . user()->bidang)->findAll();
        }
        return $this->noticeModel->findAll();
    }

    public function index()
    {
        $data = [
            'title' => 'database | notice',
            'header' => ['title' => 'database notice', 'kembali' => '/db_home'],
            'notice' => $this->findNotice()
        ];

        return view('db_notice/index', $data);
    }

    public function details($id)
    {
        $notice = $this->noticeModel->find($id);
        $datas = [
            'title' => 'notice details',
            'header' => ['title' => 'details notice', 'kembali' => '/db_notice'],
            'data' => $notice
        ];
        // dd($data['notice']);
        return view('db_notice/details', $datas);
    }

    public function edit()
    {
        $notice = $this->noticeModel->find($this->request->getVar('id'));

        $data = [
            'id' => $this->request->getVar('id'),
            'start_time' => $notice['start_time'],
            'end_time' => $notice['end_time'],
            'content' => $notice['content'],
            'updated_at' => date('Y-m-d'),
            'updated_by' => user()->fullname
        ];

        if ($this->request->getVar('start_time')) {
            $data['start_time'] = $this->request->getVar('start_time');
        }
        if ($this->request->getVar('end_time')) {
            $data['end_time'] = $this->request->getVar('end_time');
        }
        if ($this->request->getVar('content')) {
            $data['content'] = $this->request->getVar('content');
        }
        // dd($data);

        $this->noticeModel->setAllowedFields(array_keys($data));
        $this->noticeModel->save($data);

        session()->setFlashdata('pesanSuccess', 'anda telah mengubah notice');
        return redirect()->to(base_url('/db_notice'));
    }

    public function delete($id)
    {
        //hapus data
        $this->noticeModel->delete($id);
        session()->setFlashdata('pesanSuccess', 'notice berhasil dihapus');
        return redirect()->to(base_url('/db_notice'));
    }
}
