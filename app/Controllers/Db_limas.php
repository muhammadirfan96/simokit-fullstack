<?php

namespace App\Controllers;

use App\Models\LimasModel;
use App\Models\AtasanModel;
use App\Models\Daftar_pertanyaanModel;
use App\Models\NilaiLimasModel;
use Myth\Auth\Models\UserModel;

class Db_limas extends BaseController
{
    protected $limasModel, $nilaiLimasModel, $daftar_pertanyaanModel, $UserModel, $AtasanModel;
    public function __construct()
    {
        $this->limasModel = new LimasModel();
        $this->nilaiLimasModel = new NilaiLimasModel();
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
            return $this->limasModel->findAll();
        }

        $listId = [];
        $data = $this->limasModel->findAll();
        foreach ($data as $row) {
            foreach ($this->getUsers() as $user) {
                if (explode(' | ', $row['diinput_oleh'])[0] == $user['username']) {
                    $listId[] = $row['id'];
                }
            }
        }

        foreach ($listId as $id) {
            $result[] = $this->limasModel->find($id);
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

        $data = [
            'title' => 'database | limas',
            'header' => ['title' => 'database 5s', 'kembali' => '/db_home'],
            'bidang' => $bidang,
            'limas' => $this->getData()
        ];

        return view('db_limas/index', $data);
    }

    public function details($id)
    {
        $limas = $this->limasModel->find($id);
        $nilaiLimas = $this->nilaiLimasModel->find($id);
        $pertanyaan = $this->daftar_pertanyaanModel->where(['untuk' => '5s'])->findAll();

        $datas = [
            'title' => 'details kegiatan 5s',
            'header' => ['title' => 'kegiatan 5s', 'kembali' => '/db_limas'],
            'linkApv' => 'db_limas',
            'data' => $limas,
            'nilaiLimas' => $nilaiLimas,
            'pertanyaan' => $pertanyaan,
            'users' => $this->getUsers(),
            'validation' => \Config\Services::validation()
        ];

        return view('db_limas/details', $datas);
    }

    public function edit()
    {
        $limas = $this->limasModel->find($this->request->getVar('id'));

        $friend = [];
        foreach ($this->getUsers() as $user) {
            if ($this->request->getVar($user['username'])) {

                if ($user['signature'] == '') {
                    $teman = $user['fullname'];
                    session()->setFlashdata('pesanWarning', $teman . ' belum memiliki tanda tangan');
                    return redirect()->to(base_url('/db_limas/details/' . $this->request->getVar('id')))->withInput();
                }

                $friend[] = $this->request->getVar($user['username']);
            }
        }

        if (count($friend) >= 4) {
            session()->setFlashdata('pesanWarning', 'jumlah pelaksana maksimal 3 orang');
            return redirect()->to(base_url('/db_limas/details/' . $this->request->getVar('id')))->withInput();
        }

        $friends = implode(' | ', $friend);

        if (empty($friends)) {
            $friends = $limas['diinput_oleh'];
        }

        $dataLimas = [
            'id' => $limas['id'],
            'diinput_oleh' => $friends,
            'tanggal' => $limas['tanggal'],
            'namaPeralatan' => $limas['namaPeralatan'],
            'area' => $limas['area'],
            'saran' => $limas['saran'],
            'fotoSebelum' => $limas['fotoSebelum'],
            'fotoSetelah' => $limas['fotoSetelah']
        ];

        if ($this->request->getVar('tanggal')) {
            $dataLimas['tanggal'] = $this->request->getVar('tanggal');
        }
        if ($this->request->getVar('namaPeralatan')) {
            $dataLimas['namaPeralatan'] = $this->request->getVar('namaPeralatan');
        }
        if ($this->request->getVar('area')) {
            $dataLimas['area'] = $this->request->getVar('area');
        }
        if ($this->request->getVar('saran')) {
            $dataLimas['saran'] = $this->request->getVar('saran');
        }
        if ($this->request->getFile('fotoSebelum') != '') {
            $dataValidate = [
                'fotoSebelum' => [
                    'rules' => 'max_size[fotoSebelum,1024]|is_image[fotoSebelum]|mime_in[fotoSebelum,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'ukuran gambar maksimal 1 MB',
                        'is_image' => 'yang anda pilih bukan gambar',
                        'mime_in' => 'format gambar yang dibolehkan .jpg, jpeg, atau .png'
                    ]
                ]
            ];

            if (!$this->validate($dataValidate)) {
                return redirect()->to(base_url('/db_limas/details/' . $this->request->getVar('id')))->withInput();
            }

            // lolos validasi
            $dataLimas['fotoSebelum'] = $this->request->getFile('fotoSebelum')->getRandomName();
            //hapus gambar lama
            if ($limas['fotoSebelum'] != '') {
                if (file_exists('img-5s/' . $limas['fotoSebelum'])) {
                    unlink('img-5s/' . $limas['fotoSebelum']);
                }
            }
            //pindahkan baru ke folder img
            $this->request->getFile('fotoSebelum')->move('img-5s', $dataLimas['fotoSebelum']);
        }
        if ($this->request->getFile('fotoSetelah') != '') {
            $dataValidate = [
                'fotoSetelah' => [
                    'rules' => 'max_size[fotoSetelah,1024]|is_image[fotoSetelah]|mime_in[fotoSetelah,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'ukuran gambar maksimal 1 MB',
                        'is_image' => 'yang anda pilih bukan gambar',
                        'mime_in' => 'format gambar yang dibolehkan .jpg, jpeg, atau .png'
                    ]
                ]
            ];

            if (!$this->validate($dataValidate)) {
                return redirect()->to(base_url('/db_limas/details/' . $this->request->getVar('id')))->withInput();
            }
            // lolos validasi
            $dataLimas['fotoSetelah'] = $this->request->getFile('fotoSetelah')->getRandomName();
            //hapus gambar lama
            if ($limas['fotoSetelah'] != '') {
                if (file_exists('img-5s/' . $limas['fotoSetelah'])) {
                    unlink('img-5s/' . $limas['fotoSetelah']);
                }
            }
            //pindahkan baru ke folder img
            $this->request->getFile('fotoSetelah')->move('img-5s', $dataLimas['fotoSetelah']);
        }

        $keyDataNilaiLimas = ['id'];
        $valueDataNilaiLimas = [$this->request->getVar('id')];

        for ($i = 1; $i <= 25; $i++) {
            $keyDataNilaiLimas[] = 'nilai' . $i;
            $valueDataNilaiLimas[] = $this->request->getVar('nilai' . $i);
        }

        $dataNilaiLimas = array_combine($keyDataNilaiLimas, $valueDataNilaiLimas);

        $this->limasModel->setAllowedFields(array_keys($dataLimas));
        $this->nilaiLimasModel->setAllowedFields(array_keys($dataNilaiLimas));

        $this->limasModel->save($dataLimas);
        $this->nilaiLimasModel->save($dataNilaiLimas);

        session()->setFlashdata('pesanSuccess', 'Data 5S ' . $dataLimas['namaPeralatan'] . ' telah diubah');

        return redirect()->to(base_url('/db_limas/details/' . $this->request->getVar('id')));
    }

    public function prints($id)
    {
        return redirect()->to(base_url('/limas/' . $id));
    }

    public function delete($id)
    {
        //cari gambar
        $limas = $this->limasModel->find($id);

        //hapus gambar
        if (file_exists('img-5s/' . $limas['fotoSebelum'])) {
            unlink('img-5s/' . $limas['fotoSebelum']);
        }
        if (file_exists('img-5s/' . $limas['fotoSetelah'])) {
            unlink('img-5s/' . $limas['fotoSetelah']);
        }

        //hapus data
        $this->limasModel->delete($id);
        $this->nilaiLimasModel->delete($id);
        session()->setFlashdata('pesanSuccess', 'Data 5S ' . $limas['namaPeralatan'] . ' telah dihapus');
        return redirect()->to(base_url('/db_limas'));
    }

    public function approve($id)
    {
        $Limas = $this->limasModel->find($id);
        $data = [
            'id' => $id,
            'tanggal' => $Limas['tanggal'],
            'approved' => $this->request->getVar('approve')
        ];

        session()->setFlashdata('pesanSuccess', 'Data kegiatan 5s ' . $Limas['namaPeralatan'] . ' by ' . $Limas['diinput_oleh'] . ' telah di approve');

        $this->limasModel->setAllowedFields(array_keys($data));
        $this->limasModel->save($data);
        return redirect()->to(base_url('/db_limas'));
    }
}
