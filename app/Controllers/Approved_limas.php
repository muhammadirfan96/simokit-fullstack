<?php

namespace App\Controllers;

use App\Models\LimasModel;

class Approved_limas extends BaseController
{
    protected $LimasModel;
    public function __construct()
    {
        $this->LimasModel = new LimasModel();
    }

    public function index()
    {
        $like = user()->username;
        $where = "diinput_oleh LIKE '%$like%'";

        $data = [
            'title' => 'approved 5s',
            'header' => ['title' => 'my 5s', 'kembali' => '/approved_home'],
            'limas' => $this->LimasModel->where($where)->findAll()
        ];

        return view('approved_limas/index', $data);
    }

    public function printLimas($id)
    {
        return redirect()->to(base_url('/limas/' . $id));
    }
}
