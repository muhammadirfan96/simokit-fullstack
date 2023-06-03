<?php

namespace App\Controllers;

use App\Models\WorkPlanEfisiensiModel;

class Db_wp_efisiensi extends BaseController
{
    protected $WpEfisiensiModel;
    public function __construct()
    {
        $this->WpEfisiensiModel = new WorkPlanEfisiensiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'database | wp-efisiensi',
            'header' => ['title' => 'database wp efisiensi', 'kembali' => '/db_home'],
            'wp_efisiensi' => $this->WpEfisiensiModel->findAll()
        ];

        return view('db_wp_efisiensi/index', $data);
    }

    public function delete($id)
    {
        $this->WpEfisiensiModel->delete($id);

        session()->setFlashdata('pesanSuccess', 'data work plan efisiensi berhasil dihapus');
        return redirect()->to(base_url('/db_wp_efisiensi'));
    }
}
