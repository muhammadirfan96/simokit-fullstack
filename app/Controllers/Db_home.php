<?php

namespace App\Controllers;

class Db_home extends BaseController
{
    public function index()
    {
        $data = [
            ['db_servicerequest', 'fa-database', 'service request'],
            ['db_limas', 'fa-database', 'kegiatan 5s'],
            ['db_checklist', 'fa-database', 'checklist sop'],
            ['db_users', 'fa-database', 'user list'],
            ['db_notice', 'fa-database', 'notice'],
            ['db_kwh', 'fa-database', 'data kwh'],
            ['db_absensi', 'fa-database', 'data absensi'],
            ['temp', 'fa-database', 'tahun 2021'],
            ['db_wp_efisiensi', 'fa-database', 'wp efisiensi'],
            ['db_lm_auxpower', 'fa-database', 'lm auxpower'],
            ['db_lap_heatrateanlsis', 'fa-database', 'heat rate analisis'],
            ['db_mntring_efsnsiharian', 'fa-database', 'efisiensi harian'],
            ['db_lap_pt', 'fa-database', 'laporan pt'],
            ['db_logsheet_ptcheck', 'fa-database', 'logsheet ptcheck'],
        ];

        if (in_groups('supervisor logistic')) {
            unset($data[0]);
            unset($data[2]);
            unset($data[4]);
            unset($data[5]);
            unset($data[6]);
            unset($data[7]);
            unset($data[8]);
            unset($data[9]);
            unset($data[10]);
            unset($data[11]);
            unset($data[12]);
            unset($data[13]);
        }

        $datas = [
            'title' => 'database | home',
            'header' => ['title' => 'list of databases', 'kembali' => '/'],
            'data' => $data
        ];

        return view('db_home/index', $datas);
    }
}
