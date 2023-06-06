<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\AtasanModel;
use Myth\Auth\Models\UserModel;

class Db_absensi extends BaseController
{
    protected $UserModel, $AtasanModel, $AbsensiModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->AbsensiModel = new AbsensiModel();
        $this->AtasanModel = new AtasanModel();
    }

    public function index()
    {
        $data = $this->AbsensiModel->findAll();
        if (user()->bidang != 'admin') {
            $bawahan = $this->AtasanModel->where('jabatan', user()->bidang)->first()['bawahan'];
            $shift = explode(' ', $bawahan);
            $data = $this->AbsensiModel->where('shift', 'shift ' . end($shift))->findAll();
        }

        $nama = [];
        $waktu = [];
        foreach ($data as $row) {
            $nama[] = $this->UserModel
                ->asArray()
                ->where(
                    ['id' => explode(' | ', $row['diinput'])[0]]
                )
                ->first()['fullname'];
            $waktu[] = explode(' | ', $row['diinput'])[1];
        }

        $datas = [
            'title' => 'database | absensi',
            'header' => ['title' => 'database absensi', 'kembali' => '/db_home'],
            'nama' => $nama,
            'waktu' => $waktu,
            'absensi' => $data
        ];

        return view('db_absensi/index', $datas);
    }

    public function delete($id)
    {
        $this->AbsensiModel->delete($id);

        session()->setFlashdata('pesanSuccess', 'data absensi berhasil dihapus');
        return redirect()->to(base_url('/db_absensi'));
    }
}
