<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;
use App\Models\AtasanModel;

class Db_users extends BaseController
{
    protected $UserModel, $AtasanModel;
    public function __construct()
    {
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

    public function index()
    {
        $data = [
            'title' => 'database | users',
            'header' => ['title' => 'list of users', 'kembali' => '/db_home'],
            'users' => $this->getUsers()
        ];

        return view('db_users/index', $data);
    }

    public function details($id)
    {
        $user = $this->UserModel->asArray()->find($id);
        $data = [
            'title' => 'user details',
            'header' => ['title' => 'details of user', 'kembali' => '/db_users'],
            'user' => $user,
            'validation' => \Config\Services::validation()
        ];
        return view('db_users/details', $data);
    }

    public function edit()
    {
        $User = $this->UserModel->asArray()->find($this->request->getVar('id'));

        if ($this->request->getFile('picture') != '') {
            $dataValidate = [
                'picture' => [
                    'rules' => 'max_size[picture,1024]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'ukuran gambar maksimal 1 MB',
                        'is_image' => 'yang anda pilih bukan gambar',
                        'mime_in' => 'format gambar yang dibolehkan .jpg, jpeg, atau .png'
                    ]
                ]
            ];

            if (!$this->validate($dataValidate)) {
                return redirect()->to(base_url('/db_users/' . $this->request->getVar('id')))->withInput();
            }

            //lolos validasi
            $img = $this->request->getFile('picture')->getRandomName();

            //hapus gambar profile lama
            if ($User['picture'] != '') {
                if (file_exists('img-profile/' . $User['picture'])) {
                    unlink('img-profile/' . $User['picture']);
                }
            }

            //pindahkan foto profil ke img-profile
            $this->request->getFile('picture')->move('img-profile', $img);
        } else {
            $img = $User['picture'];
        }

        if ($this->request->getFile('signature') != '') {
            $dataValidate = [
                'signature' => [
                    'rules' => 'max_size[signature,1024]|is_image[signature]|mime_in[signature,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'ukuran gambar maksimal 1 MB',
                        'is_image' => 'yang anda pilih bukan gambar',
                        'mime_in' => 'format gambar yang dibolehkan .jpg, jpeg, atau .png'
                    ]
                ]
            ];

            if (!$this->validate($dataValidate)) {
                return redirect()->to(base_url('/db_users/' . $this->request->getVar('id')))->withInput();
            }
            //lolos pengecekan
            $file = $this->request->getFile('signature')->getRandomName();

            //hapus gambar ttd lama
            if ($User['signature'] != '') {
                if (file_exists('img-ttd/' . $User['signature'])) {
                    unlink('img-ttd/' . $User['signature']);
                }
            }

            //pindahkan foto profil ke img-ttd
            $this->request->getFile('signature')->move('img-ttd', $file);
        } else {
            $file = $User['signature'];
        }

        $data = [
            'id' => $this->request->getVar('id'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),
            'active' => $this->request->getVar('active'),
            'signature' => $file,
            'picture' => $img
        ];

        // dd($data);
        session()->setFlashdata('pesanSuccess', 'Data ' . $User['username'] . ' telah diubah. Silahkan cek kembali');

        $this->UserModel->setAllowedFields(array_keys($data));
        $this->UserModel->save($data);

        return redirect()->to(base_url('/db_users/' . $this->request->getVar('id')));
    }

    public function delete($id)
    {
        //cari gambar
        $User = $this->UserModel->asArray()->find($id);
        // dd($User);

        //hapus gambar
        if ($User['picture'] != '') {
            if (file_exists('img-profile/' . $User['picture'])) {
                unlink('img-profile/' . $User['picture']);
            }
        }
        if ($User['signature'] != '') {
            if (file_exists('img-ttd/' . $User['signature'])) {
                unlink('img-ttd/' . $User['signature']);
            }
        }

        //hapus data
        $this->UserModel->delete($id);
        session()->setFlashdata('pesanSuccess', 'user ' . $User['username'] . ' telah dihapus');
        return redirect()->to(base_url('/db_users'));
    }
}
