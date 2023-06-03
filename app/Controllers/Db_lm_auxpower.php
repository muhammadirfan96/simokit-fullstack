<?php

namespace App\Controllers;

use App\Models\LaporanMonitoringAuxPowerModel;

class Db_lm_auxpower extends BaseController
{
    protected $LmAuxpowerModel;
    public function __construct()
    {
        $this->LmAuxpowerModel = new LaporanMonitoringAuxPowerModel();
    }

    public function index()
    {
        $data = [
            'title' => 'database | lm-auxpower',
            'header' => ['title' => 'database lm auxpower', 'kembali' => '/db_home'],
            'lm_auxpower' => $this->LmAuxpowerModel->findAll()
        ];

        return view('db_lm_auxpower/index', $data);
    }

    public function delete($id)
    {
        $this->LmAuxpowerModel->delete($id);

        session()->setFlashdata('pesanSuccess', 'data laporan monitoring aux power berhasil dihapus');
        return redirect()->to(base_url('/db_lm_auxpower'));
    }
}
