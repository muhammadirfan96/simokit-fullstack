<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class Profil extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {

        $data = [
            'title' => 'my profil',
            'header' => ['title' => 'my profile', 'kembali' => '/'],
            'validation' => \Config\Services::validation()
        ];

        // dd($data);

        return view('profil/index', $data);
    }

    public function edit()
    {
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
                return redirect()->to(base_url('/profil'))->withInput();
            }

            //lolos validasi
            $img = $this->request->getFile('picture')->getRandomName();

            //hapus gambar profile lama
            if (user()->picture != '') {
                if (file_exists('img-profile/' . user()->picture)) {
                    unlink('img-profile/' . user()->picture);
                }
            }

            //pindahkan foto profil ke img-profile
            $this->request->getFile('picture')->move('img-profile', $img);
        } else {
            $img = user()->picture;
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
                return redirect()->to(base_url('/profil'))->withInput();
            }

            //lolos validasi
            $file = $this->request->getFile('signature')->getRandomName();

            //hapus gambar ttd lama
            if (user()->signature != '') {
                if (file_exists('img-ttd/' . user()->signature)) {
                    unlink('img-ttd/' . user()->signature);
                }
            }

            //pindahkan foto profil ke img-ttd
            $this->request->getFile('signature')->move('img-ttd', $file);
        } else {
            $file = user()->signature;
        }

        $data = [
            'id' => $this->request->getVar('id'),
            'fullname' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),
            'signature' => $file,
            'picture' => $img
        ];

        // dd($data);

        session()->setFlashdata('pesanSuccess', 'Data Anda telah diubah. Silahkan cek kembali');

        $this->userModel->setAllowedFields(array_keys($data));

        $this->userModel->save($data);
        return redirect()->to('/profil');
    }
}
