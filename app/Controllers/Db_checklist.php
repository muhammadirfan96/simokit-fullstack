<?php

namespace App\Controllers;

use App\Models\ChecklistModel;
use App\Models\AtasanModel;
use App\Models\Daftar_pertanyaanModel;
use App\Models\JawabanModel;
use App\Models\KomenModel;
use Myth\Auth\Models\UserModel;

class Db_checklist extends BaseController
{
    protected $ChecklistModel, $JawabanModel, $KomenModel, $daftar_pertanyaanModel, $UserModel, $AtasanModel;
    public function __construct()
    {
        $this->ChecklistModel = new ChecklistModel();
        $this->JawabanModel = new JawabanModel();
        $this->KomenModel = new KomenModel();
        $this->daftar_pertanyaanModel = new Daftar_pertanyaanModel();
        $this->UserModel = new UserModel();
        $this->AtasanModel = new AtasanModel();
    }

    public function getUsers()
    {
        if (!in_groups('admin')) {
            $bawahan = $this->AtasanModel->where('jabatan', user()->bidang)->first()['bawahan'];
            return $this->UserModel->asArray()->where('bidang', $bawahan)->findAll();
        }

        return $this->UserModel->asArray()->findAll();
    }

    public function getData()
    {
        $result = [];
        if (in_groups('admin')) {
            return $this->ChecklistModel->findAll();
        }

        $listId = [];
        $data = $this->ChecklistModel->findAll();
        foreach ($data as $row) {
            foreach ($this->getUsers() as $user) {
                if (explode(' | ', $row['diinput_oleh'])[0] == $user['username']) {
                    $listId[] = $row['id'];
                }
            }
        }

        foreach ($listId as $id) {
            $result[] = $this->ChecklistModel->find($id);
        }

        return $result;
    }

    public function index()
    {
        // menemukan bidang
        $bidang = [];
        foreach ($this->getData() as $row) {
            $bidang[] = $this->UserModel
                ->asArray()
                ->where(
                    ['username' => explode(' | ', $row['diinput_oleh'])[0]]
                )
                ->first()['bidang'] ?? 'null';
        }

        // end

        $data = [
            'title' => 'database | checklist',
            'header' => ['title' => 'database checklist', 'kembali' => '/db_home'],
            'bidang' => $bidang,
            'checklist' => $this->getData()
        ];

        return view('db_checklist/index', $data);
    }

    public function details($id)
    {
        $checklist = $this->ChecklistModel->find($id);
        $jawaban = $this->JawabanModel->find($id);
        $komen = $this->KomenModel->find($id);
        $pertanyaan = $this->daftar_pertanyaanModel->where('untuk', $checklist['namaPeralatan'])->findAll();

        $datas = [
            'title' => 'details checklist',
            'header' => ['title' => $checklist['namaPeralatan'], 'kembali' => '/db_checklist'],
            'linkApv' => 'db_checklist',
            'data' => $checklist,
            'jawaban' => $jawaban,
            'komen' => $komen,
            'pertanyaan' => $pertanyaan,
            'users' => $this->getUsers()
        ];
        return view('db_checklist/details', $datas);
    }

    public function edit()
    {
        $checklist = $this->ChecklistModel->find($this->request->getVar('id'));

        $friend = [];
        foreach ($this->getUsers() as $user) {
            if ($this->request->getVar($user['username'])) {

                if ($user['signature'] == '') {
                    $teman = $user['fullname'];
                    session()->setFlashdata('pesanWarning', $teman . ' belum memiliki tanda tangan');
                    return redirect()->to(base_url('/db_checklist/details/' . $this->request->getVar('id')))->withInput();
                }

                $friend[] = $this->request->getVar($user['username']);
            }
        }

        if (count($friend) >= 4) {
            session()->setFlashdata('pesanWarning', 'jumlah pelaksana maksimal 3 orang');
            return redirect()->to(base_url('/db_checklist/details/' . $this->request->getVar('id')))->withInput();
        }

        $friends = implode(' | ', $friend);

        if (empty($friends)) {
            $friends = $checklist['diinput_oleh'];
        }

        //data tabel checklist
        $dtchecklist = [
            'id' => $this->request->getVar('id'),
            'diinput_oleh' => $friends,
            'catatan' => $this->request->getVar(htmlspecialchars('catatan'))
        ];

        //data tabel jawaban
        $keyJawaban = ['id', 'diinput_oleh'];
        $valueJawaban = [$this->request->getVar('id'), $friends];
        for ($i = 1; $i <= $this->request->getVar('jumlahPertanyaan'); $i++) {
            array_push($keyJawaban, 'jawaban' . $i);
            array_push($valueJawaban, $this->request->getVar("pertanyaan" . $i));
        }
        $jawaban = array_combine($keyJawaban, $valueJawaban);

        //data tabel komen
        $keyKomen = ['id', 'diinput_oleh'];
        $valueKomen = [$this->request->getVar('id'), $friends];
        for ($i = 1; $i <= $this->request->getVar('jumlahPertanyaan'); $i++) {
            array_push($keyKomen, 'komen' . $i);
            array_push($valueKomen, $this->request->getVar("komen" . $i));
        }
        $komen = array_combine($keyKomen, $valueKomen);

        //lakukan inser ke tabel checklist, jawaban dan komen
        $this->ChecklistModel->setAllowedFields(array_keys($dtchecklist));
        $this->JawabanModel->setAllowedFields($keyJawaban);
        $this->KomenModel->setAllowedFields($keyKomen);
        $this->ChecklistModel->save($dtchecklist);
        $this->JawabanModel->save($jawaban);
        $this->KomenModel->save($komen);

        session()->setFlashdata('pesanSuccess', 'Data Cheklist ' . $this->request->getVar('namaPeralatan') . ' telah diedit');

        return redirect()->to(base_url('/db_checklist/details/' . $this->request->getVar('id')));
    }

    public function prints($id)
    {
        return redirect()->to(base_url('/checklist/' . $id));
    }

    public function delete($id)
    {
        $checklist = $this->ChecklistModel->find($id);
        //hapus data
        $this->ChecklistModel->delete($id);
        $this->JawabanModel->delete($id);
        $this->KomenModel->delete($id);
        session()->setFlashdata('pesanSuccess', 'Data Checklist ' . $checklist['namaPeralatan'] . ' berhasil dihapus');
        return redirect()->to(base_url('/db_checklist'));
    }

    public function approve($id)
    {
        $checklist = $this->ChecklistModel->find($id);
        $data = [
            'id' => $id,
            'tanggal' => $checklist['tanggal'],
            'approved' => $this->request->getVar('approve')
        ];

        session()->setFlashdata('pesanSuccess', 'Data Checklist ' . $checklist['namaPeralatan'] . ' by ' . $checklist['diinput_oleh'] . ' telah di approve');

        $this->ChecklistModel->setAllowedFields(array_keys($data));
        $this->ChecklistModel->save($data);
        return redirect()->to(base_url('/db_checklist'));
    }
}
