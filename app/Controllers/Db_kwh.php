<?php

namespace App\Controllers;

use App\Models\KwhModel;
use Myth\Auth\Models\UserModel;

class Db_kwh extends BaseController
{
    protected $UserModel, $KwhModel, $db;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->KwhModel = new KwhModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = $this->KwhModel->findAll();
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
            'title' => 'database | kwh',
            'header' => ['title' => 'database kwh', 'kembali' => '/db_home'],
            'nama' => $nama,
            'waktu' => $waktu,
            'kwh' => $this->KwhModel->findAll()
        ];

        return view('db_kwh/index', $datas);
    }

    public function delete($id)
    {
        $this->KwhModel->delete($id);

        session()->setFlashdata('pesanSuccess', 'data kwh berhasil dihapus');
        return redirect()->to(base_url('/db_kwh'));
    }
}
