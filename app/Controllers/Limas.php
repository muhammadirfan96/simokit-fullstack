<?php

namespace App\Controllers;

use App\Models\AtasanModel;
use App\Models\Daftar_pertanyaanModel;
use App\Models\LimasModel;
use App\Models\NilaiLimasModel;
use Myth\Auth\Models\UserModel;
use Mpdf\Mpdf;

class Limas extends BaseController
{
    protected $daftar_pertanyaanModel, $userModel, $atasanModel, $limasModel, $nilaiLimasModel;

    public function __construct()
    {
        $this->daftar_pertanyaanModel = new Daftar_pertanyaanModel();
        $this->userModel = new UserModel();
        $this->atasanModel = new AtasanModel();
        $this->limasModel = new LimasModel();
        $this->nilaiLimasModel = new NilaiLimasModel();
    }
    public function index()
    {
        $pertanyaan = $this->daftar_pertanyaanModel->where(['untuk' => '5s'])->findAll();
        $users = $this->userModel->asArray()->where(['bidang' => user()->bidang, 'username !=' => user()->username])->findAll();
        $data = [
            'title' => 'lima es',
            'header' => ['title' => 'kegiatan 5s', 'kembali' => '/'],
            'pertanyaan' => $pertanyaan,
            'users' => $users,
            'validation' => \Config\Services::validation()
        ];

        return view('limas/index', $data);
    }

    public function simpan()
    {
        if (user()->signature == '') {
            session()->setFlashdata('pesanWarning', 'masukkan tanda tangan terlebih dahulu');
            return redirect()->to(base_url('/profil'));
        }

        $users = $this->userModel->asArray()->where(['bidang' => user()->bidang, 'username !=' => user()->username])->findAll();

        $dataValidate = [
            'namaPeralatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama peralatan harus di isi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus di isi'
                ]
            ],
            'area' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'area harus di isi'
                ]
            ],
            'saran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'saran harus di isi'
                ]
            ],
            'fotoSebelum' => [
                'rules' => 'uploaded[fotoSebelum]|max_size[fotoSebelum,1024]|is_image[fotoSebelum]|mime_in[fotoSebelum,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'pilih gambar terlebih dahulu',
                    'max_size' => 'ukuran gambar maksimal 1 MB',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'format gambar yang dibolehkan .jpg, jpeg, atau .png'
                ]
            ],
            'fotoSetelah' => [
                'rules' => 'uploaded[fotoSetelah]|max_size[fotoSetelah,1024]|is_image[fotoSetelah]|mime_in[fotoSetelah,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'pilih gambar terlebih dahulu',
                    'max_size' => 'ukuran gambar maksimal 1 MB',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'format gambar yang dibolehkan .jpg, jpeg, atau .png'
                ]
            ]
        ];

        for ($i = 1; $i <= 25; $i++) {
            $dataValidate['nilai' . $i]['rules'] = 'required';
            $dataValidate['nilai' . $i]['errors']['required'] = 'pilih nilai 1 - 5';
        }

        if (!$this->validate($dataValidate)) {
            return redirect()->to(base_url('/limas'))->withInput();
        }

        $friend = [];
        foreach ($users as $user) {
            if ($this->request->getVar($user['username'])) {

                if ($user['signature'] == '') {
                    $teman = $user['fullname'];
                    session()->setFlashdata('pesanWarning', $teman . ' belum memiliki tanda tangan');
                    return redirect()->to(base_url('/limas'))->withInput();
                }

                $friend[] = $this->request->getVar($user['username']);
            }
        }

        if (count($friend) >= 3) {
            session()->setFlashdata('pesanWarning', 'jumlah teman maksimal 2 orang');
            return redirect()->to(base_url('/limas'))->withInput();
        }

        if (count($friend) == 0) {
            $friends = null;
        } else {
            $friends = ' | ' . implode(' | ', $friend);
        }

        $dataLimas = [
            'diinput_oleh' => user()->username . $friends,
            'tanggal' => $this->request->getVar('tanggal'),
            'namaPeralatan' => $this->request->getVar('namaPeralatan'),
            'area' => $this->request->getVar('area'),
            'saran' => $this->request->getVar('saran'),
            'fotoSebelum' => $this->request->getFile('fotoSebelum')->getRandomName(),
            'fotoSetelah' => $this->request->getFile('fotoSetelah')->getRandomName()
        ];

        $this->request->getFile('fotoSebelum')->move('img-5s', $dataLimas['fotoSebelum']);
        $this->request->getFile('fotoSetelah')->move('img-5s', $dataLimas['fotoSetelah']);

        $keyDataNilaiLimas = ['diinput_oleh'];
        $valueDataNilaiLimas = [user()->username . $friends];

        for ($i = 1; $i <= 25; $i++) {
            $keyDataNilaiLimas[] = 'nilai' . $i;
            $valueDataNilaiLimas[] = $this->request->getVar('nilai' . $i);
        }

        $dataNilaiLimas = array_combine($keyDataNilaiLimas, $valueDataNilaiLimas);

        $this->limasModel->setAllowedFields(array_keys($dataLimas));
        $this->nilaiLimasModel->setAllowedFields(array_keys($dataNilaiLimas));

        $this->limasModel->save($dataLimas);
        $this->nilaiLimasModel->save($dataNilaiLimas);

        session()->setFlashdata('pesanSuccess', 'Data 5S berhasil ditambahkan. Setelah diapprove oleh atasan anda dapat mendownloadnya pada halaman My Data > Reporting');

        return redirect()->to(base_url('/limas'));
    }

    public function print($id)
    {
        $mpdf = new Mpdf();
        $limas = $this->limasModel->find($id);
        $nilaiLimas = $this->nilaiLimasModel->find($id);

        $users = explode(" | ", $limas['diinput_oleh']);

        // baru
        $bdgU = $this->userModel->asArray()->where('username', $users[0])->first()['bidang'];
        $ats = $this->atasanModel->where('bawahan', $bdgU)->first();
        if ($ats == null) {
            session()->setFlashdata('pesanWarning', 'tidak ditemukan atasan yang cocok');
            return redirect()->back();
        }
        $bdgA = $ats['jabatan'];
        $detA = $this->userModel->asArray()->where('bidang', $bdgA)->first();

        if ($detA['signature'] == '') {
            session()->setFlashdata('pesanWarning', 'ttd atasan belum ada');
            return redirect()->back();
        }
        if (!file_exists('img-ttd/' . $detA['signature'])) {
            $detA["signature"] = 'none.png';
        }

        $pegawai = [];
        $i = 0;
        foreach ($users as $user) {
            $where = "username LIKE '%$user%'";
            $pegawai[] = $this->userModel->asArray()->where($where)->first();

            if (!file_exists('img-ttd/' . $pegawai[$i]['signature'])) {
                $pegawai[$i]["signature"] = 'none.png';
            }
            $i++;
        }

        // end baru

        $pelaksana = [];
        foreach ($pegawai as $peg) {
            $pelaksana[] = $peg['fullname'];
        }

        $cetakPelaksana = implode(' | ', $pelaksana);

        if (!file_exists('img-5s/' . $limas['fotoSebelum'])) {
            $limas['fotoSebelum'] = 'none.png';
        }
        if (!file_exists('img-5s/' . $limas['fotoSetelah'])) {
            $limas['fotoSetelah'] = 'none.png';
        }

        $pertanyaan = $this->daftar_pertanyaanModel->where(['untuk' => '5s'])->findAll();

        if (str_contains($detA['bidang'], 'operasi')) {
            $satuanKerja = 'OPERASI';
            $tujuanBidang = 'operator';
        } elseif (str_contains($detA['bidang'], 'logistic')) {
            $satuanKerja = 'HAR';
            $tujuanBidang = 'bidang logistic';
        }

        if ($limas['tanggal'] >= date('2022-08-25')) {
            $sasaran = $limas['namaPeralatan'];
        } else {
            $sasaran = 'Membersihkan debu, tetesan oli, dan membuang sampah yang ada di sekitar peralatan ' . $limas['namaPeralatan'];
        }

        $data = [
            'limas' => $limas,
            'nilaiLimas' => $nilaiLimas,
            'pertanyaan' => $pertanyaan,
            'cetakPelaksana' => $cetakPelaksana,
            'pegawai' => $pegawai,
            'atasan' => $detA,
            'checkItem' => $this->nilaiLimasModel->checkItem,
            'satuanKerja' => $satuanKerja,
            'tujuanBidang' => $tujuanBidang,
            'sasaran' => $sasaran
        ];

        $this->response->setContentType("application/pdf");

        // $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->SetHTMLHeader(view('limas/hprint'));
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->WriteHTML(view('limas/print', $data));

        return $mpdf->Output($limas['id'] . ' 5s ' . $limas['namaPeralatan'] . '.pdf', "D");
    }
}
