<?php

namespace App\Controllers;

use App\Models\LaporanPerformanceTestModel;

class Db_lap_pt extends BaseController
{
    protected $Laporanpt;
    public function __construct()
    {
        $this->Laporanpt = new LaporanPerformanceTestModel();
    }

    public function index()
    {
        $data = [
            'title' => 'database | laporan PT',
            'header' => ['title' => 'database laporan pt', 'kembali' => '/db_home'],
            'lap_pt' => $this->Laporanpt->findAll()
        ];

        return view('db_lap_pt/index', $data);
    }

    public function delete($id)
    {
        $this->Laporanpt->delete($id);

        session()->setFlashdata('pesanSuccess', 'data laporan PT berhasil dihapus');
        return redirect()->to(base_url('/db_lap_pt'));
    }
}
