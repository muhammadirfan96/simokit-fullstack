<?php

namespace App\Controllers;

use App\Models\MonitoringEfisiensiHarianModel;

class Db_mntring_efsnsiharian extends BaseController
{
    protected $MntringEfisiensiModel;
    public function __construct()
    {
        $this->MntringEfisiensiModel = new MonitoringEfisiensiHarianModel();
    }

    public function index()
    {
        $data = [
            'title' => 'database | monitoring efisiensi harian',
            'header' => ['title' => 'database mntring efsnsi harian', 'kembali' => '/db_home'],
            'mntring_efsnsiharian' => $this->MntringEfisiensiModel->findAll()
        ];

        return view('db_mntring_efsnsiharian/index', $data);
    }

    public function delete($id)
    {
        $this->MntringEfisiensiModel->delete($id);

        session()->setFlashdata('pesanSuccess', 'data monitoring efisiensi harian berhasil dihapus');
        return redirect()->to(base_url('/db_mntring_efsnsiharian'));
    }
}
