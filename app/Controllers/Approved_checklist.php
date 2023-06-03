<?php

namespace App\Controllers;

use App\Models\ChecklistModel;

class Approved_checklist extends BaseController
{
    protected $ChecklistModel;
    public function __construct()
    {
        $this->ChecklistModel = new ChecklistModel();
    }

    public function index()
    {
        $like = user()->username;
        $where = "diinput_oleh LIKE '%$like%'";

        $data = [
            'title' => 'approved checklist',
            'header' => ['title' => 'my checklist', 'kembali' => '/approved_home'],
            'checklist' => $this->ChecklistModel->where($where)->findAll()
        ];

        // dd($data);

        return view('approved_checklist/index', $data);
    }

    public function printChecklist($id)
    {
        return redirect()->to(base_url('/checklist/' . $id));
    }
}
