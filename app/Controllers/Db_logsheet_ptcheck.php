<?php

namespace App\Controllers;

use App\Models\DocLogsheetPtcheckModel;

class Db_logsheet_ptcheck extends BaseController
{
    protected $LogsheetPtcheckModel;
    public function __construct()
    {
        $this->LogsheetPtcheckModel = new DocLogsheetPtcheckModel();
    }

    public function index()
    {
        $data = [
            'title' => 'database | laporan logsheet patrol check',
            'header' => ['title' => 'database logsheet patrol check', 'kembali' => '/db_home'],
            'logsheet_ptcheck' => $this->LogsheetPtcheckModel->findAll()
        ];

        return view('db_logsheet_ptcheck/index', $data);
    }

    public function delete($id)
    {
        $this->LogsheetPtcheckModel->delete($id);

        session()->setFlashdata('pesanSuccess', 'data logsheet patrol check berhasil dihapus');
        return redirect()->to(base_url('/db_logsheet_ptcheck'));
    }
}
