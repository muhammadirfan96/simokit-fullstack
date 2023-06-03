<?php

namespace App\Controllers;

use App\Models\ListOfKpiModel;
use App\Models\UsersKpiModel;

class Kpi extends BaseController
{
    protected $ListOfKpiModel, $UserKpiModel, $db;
    public function __construct()
    {
        $this->ListOfKpiModel = new ListOfKpiModel();
        $this->UserKpiModel = new UsersKpiModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $builder = $this->db->table('list_of_kpi');
        $builder->where('users_kpi.user_id', user_id());
        $builder->join('users_kpi', 'list_of_kpi.id = users_kpi.kpi_id');
        $join = $builder->get()->getResult('array');

        $listEvidence = [];
        foreach ($join as $row) {
            $listEvidence[] = explode(' | ', $row['evidence']);
        }

        $data = [
            'title' => 'key performance indicator',
            'header' => ['title' => 'my kpi', 'kembali' => '/'],
            'kpiUser' => $join,
            'listEvidence' => $listEvidence
        ];

        return view('kpi/index', $data);
    }

    public function upload($id)
    {
        $dataLama = $this->UserKpiModel->find($id);
        if ($dataLama == null) {
            session()->setFlashdata('pesanWarning', 'kpi tidak ditemukan');
            return redirect()->to(base_url('/kpi'));
        }

        $file = $this->request->getFile($id);
        $namaFile = $file->getRandomName();

        if (!empty($dataLama['evidence'])) {
            $evidence = $dataLama['evidence'] . ' | ' . $namaFile;
        } else {
            $evidence = $namaFile;
        }

        $this->UserKpiModel->save([
            'id' => $id,
            'evidence' => $evidence
        ]);

        $file->move('pdf-kpi', $namaFile);

        session()->setFlashdata('pesanSuccess', 'evidence kpi telah ditambahkan');
        return redirect()->to(base_url('/kpi'));
    }

    public function delete($id, $evidence)
    {
        if (file_exists('pdf-kpi/' . $evidence)) {
            unlink('pdf-kpi/' . $evidence);
        }

        $dataLama = $this->UserKpiModel->find($id);
        $listEvidence = explode(' | ', $dataLama['evidence']);

        $sisaEvidence = array_diff($listEvidence, [$evidence]);

        $this->UserKpiModel->save([
            'id' => $id,
            'evidence' => implode(' | ', $sisaEvidence)
        ]);
        session()->setFlashdata('pesanSuccess', 'evidence kpi telah dihapus');
        return redirect()->to(base_url('/kpi'));
    }

    public function download($nama)
    {
        if (!file_exists('pdf-kpi/' . $nama)) {
            session()->setFlashdata('pesanWarning', 'file evidence kpi tidak ditemukan');
            return redirect()->back();
        }
        $randomString = time();
        return $this->response->download('pdf-kpi/' . $nama, null)->setFileName('simokit-' . $randomString . '.pdf');
    }
}
