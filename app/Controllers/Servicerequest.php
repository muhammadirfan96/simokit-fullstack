<?php

namespace App\Controllers;

use App\Models\ServiceRequestModel;
use Myth\Auth\Models\UserModel;
use App\Models\AtasanModel;

class Servicerequest extends BaseController
{
    protected $serviceRequestModel;
    protected $userModel;
    protected $atasanModel;

    public function __construct()
    {
        $this->serviceRequestModel = new ServiceRequestModel();
        $this->userModel = new UserModel();
        $this->atasanModel = new AtasanModel();
    }

    public function index($judul = 'flm')
    {
        if ($judul == "cm") {
            $evidence = "Evidence";
        } elseif ($judul == "flm") {
            $evidence = "Sebelum FLM";
        }

        $users = $this->userModel->asArray()->where(['bidang' => user()->bidang, 'username !=' => user()->username])->findAll();
        $data = [
            'title' => 'service request',
            'header' => ['title' => 'service request ' . $judul, 'kembali' => '/'],
            'jenisSr' => $judul,
            'evidence' => $evidence,
            'users' => $users,
            'validation' => \Config\Services::validation()
        ];

        return view('servicerequest/index', $data);
    }

    public function simpan()
    {
        if (user()->signature == '') {
            session()->setFlashdata('pesanWarning', 'masukkan tanda tangan terlebih dahulu');
            return redirect()->to(base_url('/profil'));
        }

        $users = $this->userModel->asArray()->where(['bidang' => user()->bidang, 'username !=' => user()->username])->findAll();

        $dataValidate = [
            'nomorSr' => [
                'rules' => 'required|is_unique[srcm.nomorSr]',
                'errors' => [
                    'required' => 'nomor SR harus di isi',
                    'is_unique' => 'nomor SR sudah ada'
                ]
            ],
            'unit' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib memilih unit']
            ],
            'area' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib memilih area']
            ],
            'namaPeralatan' => [
                'rules' => 'required',
                'errors' => ['required' => 'nama peralatan harus diisi']
            ],
            'kks' => [
                'rules' => 'required',
                'errors' => ['required' => 'nomor kks harus diisi']
            ],
            'uraianGangguan1' => [
                'rules' => 'required',
                'errors' => ['required' => 'uraian gangguan harus diisi']
            ],
            'normalOperasi1' => [
                'rules' => 'required',
                'errors' => ['required' => 'normal operasi harus diisi']
            ],
            'gejala1' => [
                'rules' => 'required',
                'errors' => ['required' => 'gejala harus diisi']
            ],
            'prioritas' => [
                'rules' => 'required',
                'errors' => ['required' => 'wajib memilih prioritas']
            ],
            'akibatKerusakan1' => [
                'rules' => 'required',
                'errors' => ['required' => 'akibat kerusakan harus diisi']
            ],
            'kemungkinanDampak1' => [
                'rules' => 'required',
                'errors' => ['required' => 'kemungkinan dampak harus diisi']
            ],
            'tindakanSementara1' => [
                'rules' => 'required',
                'errors' => ['required' => 'tindakan sementara harus diisi']
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => ['required' => 'tanggal harus diisi']
            ],
            'evidence1' => [
                'rules' => 'uploaded[evidence1]|max_size[evidence1,1024]|is_image[evidence1]|mime_in[evidence1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'pilih gambar terlebih dahulu',
                    'max_size' => 'ukuran gambar maksimal 1 MB',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'format gambar yang dibolehkan .jpg, jpeg, atau .png'
                ]
            ]
        ];

        if ($this->request->getVar('jenisSr') == 'flm') {
            $dataValidate['evidence2'] = [
                'rules' => 'uploaded[evidence2]|max_size[evidence2,1024]|is_image[evidence2]|mime_in[evidence2,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'pilih gambar terlebih dahulu',
                    'max_size' => 'ukuran gambar maksimal 1 MB',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'format gambar yang dibolehkan .jpg, jpeg, atau .png'
                ]
            ];
        }

        if (!$this->validate($dataValidate)) {
            return redirect()->to(base_url('/servicerequest/' . $this->request->getVar('jenisSr')))->withInput();
        }

        $friend = [];
        foreach ($users as $user) {
            if ($this->request->getVar($user['username'])) {

                if ($user['signature'] == '') {
                    $teman = $user['fullname'];
                    session()->setFlashdata('pesanWarning', $teman . ' belum memiliki tanda tangan');
                    return redirect()->to(base_url('/servicerequest/' . $this->request->getVar('jenisSr')))->withInput();
                }

                $friend[] = $this->request->getVar($user['username']);
            }
        }

        if (count($friend) >= 3) {
            session()->setFlashdata('pesanWarning', 'jumlah teman maksimal 2 orang');
            return redirect()->to(base_url('/servicerequest/' . $this->request->getVar('jenisSr')))->withInput();
        }

        if ($friends = implode(' | ', $friend)) {
            $friends = ' | ' . implode(' | ', $friend);
        }

        $data = [
            'nomorSr' => $this->request->getVar('nomorSr'),
            'unit' => $this->request->getVar('unit'),
            'area' => $this->request->getVar('area'),
            'namaPeralatan' => $this->request->getVar('namaPeralatan'),
            'kks' => $this->request->getVar('kks'),
            'uraianGangguan1' => $this->request->getVar('uraianGangguan1'),
            'uraianGangguan2' => $this->request->getVar('uraianGangguan2'),
            'normalOperasi1' => $this->request->getVar('normalOperasi1'),
            'normalOperasi2' => $this->request->getVar('normalOperasi2'),
            'gejala1' => $this->request->getVar('gejala1'),
            'gejala2' => $this->request->getVar('gejala2'),
            'prioritas' => $this->request->getVar('prioritas'),
            'akibatKerusakan1' => $this->request->getVar('akibatKerusakan1'),
            'akibatKerusakan2' => $this->request->getVar('akibatKerusakan2'),
            'kemungkinanDampak1' => $this->request->getVar('kemungkinanDampak1'),
            'kemungkinanDampak2' => $this->request->getVar('kemungkinanDampak2'),
            'tindakanSementara1' => $this->request->getVar('tindakanSementara1'),
            'tindakanSementara2' => $this->request->getVar('tindakanSementara2'),
            'tindakanSementara3' => $this->request->getVar('tindakanSementara3'),
            'diinput_oleh' => user()->username . $friends,
            'tanggal' => $this->request->getVar('tanggal'),
            'ket' => $this->request->getVar('jenisSr'),
            'evidence1' => '',
            'evidence2' => ''
        ];

        //masukan nama gambar
        $data['evidence1'] = $this->request->getFile('evidence1')->getRandomName();

        //pindahkan gambar ke folder img
        $this->request->getFile('evidence1')->move('img-sr', $data['evidence1']);

        if ($this->request->getVar('jenisSr') == 'flm') {
            $data['evidence2'] = $this->request->getFile('evidence2')->getRandomName();
            $this->request->getFile('evidence2')->move('img-sr', $data['evidence2']);
        }

        $this->serviceRequestModel->setAllowedFields(array_keys($data));

        $this->serviceRequestModel->save($data);

        session()->setFlashdata('pesanSuccess', 'Data SR ' . $data['ket'] . ' berhasil ditambahkan. Setelah diapprove oleh atasan anda dapat mendownloadnya pada halaman My Data > Reporting');

        return redirect()->to(base_url('/servicerequest/' . $data['ket']));
    }

    public function print($id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $serviceRequest = $this->serviceRequestModel->find($id);

        //untuk unit
        $unit = ["&#9744", "&#9744"];
        if ($serviceRequest["unit"] == '#1') {
            $unit[0] = "&#9745";
        } else {
            $unit[1] = "&#9745";
        }

        //untuk area
        $area = [
            "turbin" => "&#9744",
            "boiler" => "&#9744",
            "wtp" => "&#9744",
            "electrical" => "&#9744"
        ];

        switch ($serviceRequest["area"]) {
            case 'turbin':
                $area["turbin"] = "&#9745";
                break;
            case 'boiler':
                $area["boiler"] = "&#9745";
                break;
            case 'wtp':
                $area["wtp"] = "&#9745";
                break;
            case 'electrical':
                $area["electrical"] = "&#9745";
                break;
        }

        //untuk prioritas
        $prioritas = [
            "emergency" => "&#9744",
            "urgent" => "&#9744",
            "normal" => "&#9744"
        ];

        switch ($serviceRequest["prioritas"]) {
            case 'emergency':
                $prioritas["emergency"] = "&#9745";
                break;
            case 'urgent':
                $prioritas["urgent"] = "&#9745";
                break;
            case 'normal':
                $prioritas["normal"] = "&#9745";
                break;
        }

        //untuk keterangan gambar
        $evidence = ["Lampiran", ""];
        if ($serviceRequest["ket"] == "flm") {
            $evidence = ["Sebelum FLM", "Setelah FLM"];
        }

        $users = explode(" | ", $serviceRequest['diinput_oleh']);

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

        if (!file_exists('img-sr/' . $serviceRequest['evidence1'])) {
            $serviceRequest['evidence1'] = 'none.png';
        }

        if (!file_exists('img-sr/' . $serviceRequest['evidence2'])) {
            $serviceRequest['evidence2'] = 'none.png';
        }

        $daftarHari = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];

        $data = [
            'serviceRequest' => $serviceRequest,
            'pegawai' => $pegawai,
            'atasan' => $detA,
            'daftarHari' => $daftarHari,
            'unit' => $unit,
            'area' => $area,
            'prioritas' => $prioritas,
            'evidence' => $evidence,
        ];

        $this->response->setContentType("application/pdf");

        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->SetHTMLHeader(view('servicerequest/hprint'));
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->WriteHTML(view('servicerequest/print', $data));
        return $mpdf->Output($serviceRequest['nomorSr'] . ' ' . $serviceRequest['uraianGangguan1'] . ' servicerequest.pdf', "D");
    }
}
