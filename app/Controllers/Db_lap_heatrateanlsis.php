<?php

namespace App\Controllers;

use App\Models\LaporanHeatRateAnalisisModel;

class Db_lap_heatrateanlsis extends BaseController
{
    protected $LapHeatRateModel;
    public function __construct()
    {
        $this->LapHeatRateModel = new LaporanHeatRateAnalisisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'database | lap heatrate analisis',
            'header' => ['title' => 'database lap heatrate anlsis', 'kembali' => '/db_home'],
            'lap_heatrateanlsis' => $this->LapHeatRateModel->findAll()
        ];

        return view('db_lap_heatrateanlsis/index', $data);
    }

    public function delete($id)
    {
        $this->LapHeatRateModel->delete($id);

        session()->setFlashdata('pesanSuccess', 'data laporan heat rate analisis berhasil dihapus');
        return redirect()->to(base_url('/db_lap_heatrateanlsis'));
    }
}
