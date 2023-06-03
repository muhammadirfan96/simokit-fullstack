<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use App\Models\AtasanModel;
use App\Models\ListOfKpiModel;
use App\Models\UsersKpiModel;

class Kpi_monitoring extends BaseController
{
    protected $UserModel, $AtasanModel, $ListOfKpiModel, $UserKpiModel, $db;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->AtasanModel = new AtasanModel();
        $this->ListOfKpiModel = new ListOfKpiModel();
        $this->UserKpiModel = new UsersKpiModel();
        $this->db = \Config\Database::connect();
    }

    public function getUsers()
    {
        if (!in_groups('admin')) {
            $bawahan = $this->AtasanModel->where('jabatan', user()->bidang)->first()['bawahan'];
            return $this->UserModel->asArray()->where('bidang', $bawahan)->findAll();
        }
        return $this->UserModel->asArray()->findAll();
    }

    public function index()
    {
        $data = [
            'title' => 'monitoring kpi',
            'header' => ['title' => 'users', 'kembali' => '/'],
            'users' => $this->getUsers()
        ];

        return view('kpi_monitoring/index', $data);
    }

    public function details($id)
    {
        $listKpi = $this->ListOfKpiModel->findAll();

        $builder = $this->db->table('list_of_kpi');
        $builder->where('users_kpi.user_id', $id);
        $builder->join('users_kpi', 'list_of_kpi.id = users_kpi.kpi_id');
        $join = $builder->get()->getResult('array');

        $listEvidence = [];
        foreach ($join as $row) {
            $listEvidence[] = explode(' | ', $row['evidence']);
        }

        $user = $this->UserModel->asArray()->find($id);

        $data = [
            'title' => 'detail kpi',
            'header' => ['title' => 'manage kpi', 'kembali' => '/'],
            'listKpi' => $listKpi,
            'kpiUser' => $join,
            'listEvidence' => $listEvidence,
            'user' => $user
        ];

        return view('kpi_monitoring/details', $data);
    }

    public function add()
    {
        $idUser = $this->request->getVar('user_id');
        $kpiLama = $this->UserKpiModel->where('user_id', $idUser)->findAll();

        $idKpiBaru = $this->request->getVar('kpi_id');

        $idKpilama = [];
        foreach ($kpiLama as $row) {
            $idKpilama[] = $row['kpi_id'];
        }

        $idKpiValid = array_values(array_diff($idKpiBaru, $idKpilama));
        $idKpiInValid = array_values(array_diff($idKpiBaru, $idKpiValid));

        if (empty($idKpiInValid)) {
            $pesan = 'semua valid';
        } else {
            $pesan = 'sebagian tidak ditambahkan karena sudah ditambahkan sebelumnya';
        }

        for ($i = 0; $i < count($idKpiValid); $i++) {
            $this->UserKpiModel->save([
                'user_id' => intval($idUser),
                'kpi_id' => intval($idKpiValid[$i])
            ]);
        }

        if (count($idKpiValid) > 0) {
            session()->setFlashdata('pesanSuccess', 'kpi baru telah di tambahkan. ' . $pesan);
        } else {
            session()->setFlashdata('pesanWarning', 'tidak ada kpi baru yang ditambahkan. semua kpi sudah ditambahkan sebelumnya');
        }

        return redirect()->to(base_url('/kpi_monitoring/details/' . $this->request->getVar('user_id')));
    }

    public function delete($id, $userId)
    {
        $dataLama = $this->UserKpiModel->find($id);
        if (!empty($dataLama['evidence'])) {
            $listEvidence = explode(' | ', $dataLama['evidence']);
            foreach ($listEvidence as $evidence) {
                if (file_exists('pdf-kpi/' . $evidence)) {
                    unlink('pdf-kpi/' . $evidence);
                }
            }
        }

        $this->UserKpiModel->delete($id);

        session()->setFlashdata('pesanSuccess', 'kpi telah di hapus');
        return redirect()->to(base_url('/kpi_monitoring/details/' . $userId));
    }

    public function approve($id, $userId)
    {
        $this->UserKpiModel->save([
            'id' => $id,
            'approve' => 'y'
        ]);
        session()->setFlashdata('pesanSuccess', 'evidence kpi telah diaprove');
        return redirect()->to(base_url('/kpi_monitoring/details/' . $userId));
    }

    public function reset($id, $userId)
    {
        $dataLama = $this->UserKpiModel->where('user_id', $userId)->findAll();
        foreach ($dataLama as $row) {
            $this->UserKpiModel->save([
                'id' => $row['id'],
                'evidence' => '',
                'approve' => 'n'
            ]);
            if (!empty($row['evidence'])) {
                $listEvidence = explode(' | ', $row['evidence']);
                foreach ($listEvidence as $evidence) {
                    if (file_exists('pdf-kpi/' . $evidence)) {
                        unlink('pdf-kpi/' . $evidence);
                    }
                }
            }
        }
        session()->setFlashdata('pesanSuccess', 'kpi telah direset');
        return redirect()->to(base_url('/kpi_monitoring/details/' . $userId));
    }
}
