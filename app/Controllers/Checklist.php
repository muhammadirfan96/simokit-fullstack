<?php

namespace App\Controllers;

use App\Models\Daftar_pertanyaanModel;
use App\Models\ChecklistModel;
use App\Models\JawabanModel;
use App\Models\KomenModel;
use Myth\Auth\Models\UserModel;
use App\Models\Array_formchecklist;
use App\Models\AtasanModel;
use App\Models\Data_Nama_Peralatan_Checklist;
use \Mpdf\Mpdf;

class Checklist extends BaseController
{
    protected $daftar_pertanyaanModel, $checklistModel, $jawabanModel, $komenModel, $userModel, $atasanModel;
    public function __construct()
    {
        $this->daftar_pertanyaanModel = new Daftar_pertanyaanModel();
        $this->checklistModel = new ChecklistModel();
        $this->jawabanModel = new JawabanModel();
        $this->komenModel = new KomenModel();
        $this->userModel = new UserModel();
        $this->atasanModel = new AtasanModel();
    }

    public function index()
    {
        $peralatan = new Data_Nama_Peralatan_Checklist();

        $data = [
            ['1', $peralatan->allValues(0), 'fa-check-double', $peralatan->allKeys(0)],
            ['2', $peralatan->allValues(1), 'fa-check-double', $peralatan->allKeys(1)],
            ['3', $peralatan->allValues(2), 'fa-check-double', $peralatan->allKeys(2)],
            ['4', $peralatan->allValues(3), 'fa-check-double', $peralatan->allKeys(3)],
            ['5', $peralatan->allValues(4), 'fa-check-double', $peralatan->allKeys(4)],
            ['6', $peralatan->allValues(5), 'fa-check-double', $peralatan->allKeys(5)],
            ['7', $peralatan->allValues(6), 'fa-check-double', $peralatan->allKeys(6)]
        ];


        $datas = [
            'title' => 'pilih peralatan',
            'header' => ['title' => 'list peralatan', 'kembali' => '/'],
            'data' => $data,
        ];

        return view('checklist/index', $datas);
    }

    public function pilihPeralatan($peralatan)
    {
        $users = $this->userModel->asArray()->where(['bidang' => user()->bidang, 'username !=' => user()->username])->findAll();
        $pertanyaan = $this->daftar_pertanyaanModel->where(['untuk' => $peralatan])->findAll();

        $data = [
            'title' => $peralatan,
            'pertanyaan' => $pertanyaan,
            'users' => $users,
            'validation' => \Config\Services::validation()
        ];
        return view('checklist/peralatan', $data);
    }

    public function simpan()
    {
        if (user()->signature == '') {
            session()->setFlashdata('pesanWarning', 'masukkan tanda tangan terlebih dahulu');
            return redirect()->to(base_url('/profil'));
        }

        $users = $this->userModel->asArray()->where(['bidang' => user()->bidang, 'username !=' => user()->username])->findAll();

        $keyDataValidate = [];
        $valueDataValidate = [];
        for ($i = 1; $i <= $this->request->getVar('jumlahPertanyaan'); $i++) {
            $keyDataValidate[] = 'pertanyaan' . $i;
            $valueDataValidate[] = [
                'rules' => 'required',
                'errors' => ['required' => 'wajib memilih ya atau tidak']
            ];
        }

        $dataValidate = array_combine($keyDataValidate, $valueDataValidate);

        if (!$this->validate($dataValidate)) {
            return redirect()->to(base_url('/checklist/' . $this->request->getVar('namaPeralatan')))->withInput();
        }

        $friend = [];
        foreach ($users as $user) {
            if ($this->request->getVar($user['username'])) {

                if ($user['signature'] == '') {
                    $teman = $user['fullname'];
                    session()->setFlashdata('pesanWarning', $teman . ' belum memiliki tanda tangan');
                    return redirect()->to(base_url('/checklist/' . $this->request->getVar('namaPeralatan')))->withInput();
                }

                $friend[] = $this->request->getVar($user['username']);
            }
        }

        if (count($friend) >= 3) {
            session()->setFlashdata('pesanWarning', 'jumlah teman maksimal 2 orang');
            return redirect()->to(base_url('/checklist/' . $this->request->getVar('namaPeralatan')))->withInput();
        }

        if ($friends = implode(' | ', $friend)) {
            $friends = ' | ' . implode(' | ', $friend);
        }

        //data tabel checklist

        $checklist = [
            'tanggal' => date('Y-m-d H:i:s'),
            'diinput_oleh' => user()->username . $friends,
            'namaPeralatan' => $this->request->getVar('namaPeralatan'),
            'catatan' => $this->request->getVar(htmlspecialchars('catatan'))
        ];

        //data tabel jawaban

        $keyJawaban = ['diinput_oleh'];
        $valueJawaban = [user()->username . $friends];
        for ($i = 1; $i <= $this->request->getVar('jumlahPertanyaan'); $i++) {
            array_push($keyJawaban, 'jawaban' . $i);
            array_push($valueJawaban, $this->request->getVar("pertanyaan" . $i));
        }
        $jawaban = array_combine($keyJawaban, $valueJawaban);

        //data tabel komen

        $keyKomen = ['diinput_oleh'];
        $valueKomen = [user()->username . $friends];
        for ($i = 1; $i <= $this->request->getVar('jumlahPertanyaan'); $i++) {
            array_push($keyKomen, 'komen' . $i);
            array_push($valueKomen, $this->request->getVar("komen" . $i));
        }
        $komen = array_combine($keyKomen, $valueKomen);

        // dd($checklist);

        //lakukan inser ke tabel checklist, jawaban dan komen

        $this->checklistModel->setAllowedFields(array_keys($checklist));
        $this->jawabanModel->setAllowedFields($keyJawaban);
        $this->komenModel->setAllowedFields($keyKomen);
        $this->checklistModel->save($checklist);
        $this->jawabanModel->save($jawaban);
        $this->komenModel->save($komen);

        session()->setFlashdata('pesanSuccess', 'Data Cheklist berhasil ditambahkan. Setelah diapprove oleh atasan anda dapat mendownloadnya pada halaman My Data > Reporting');

        return redirect()->to('checklist/' . $this->request->getVar('namaPeralatan'));
    }

    public function print($id)
    {
        $mpdf = new Mpdf();

        $checklist = $this->checklistModel->find($id);
        $jawaban = $this->jawabanModel->find($id);
        $komen = $this->komenModel->find($id);

        $users = explode(" | ", $checklist['diinput_oleh']);

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

        $pertanyaan = $this->daftar_pertanyaanModel->where(['untuk' => $checklist['namaPeralatan']])->findAll();

        $i = 1;
        $jwb = [];
        foreach ($pertanyaan as $row) {
            if ($jawaban["jawaban$i"] == "ya") {
                $jwb[] = ["&#9745", "&#9744"];
            } elseif ($jawaban["jawaban$i"] == "tidak") {
                $jwb[] = ["&#9744", "&#9745"];
            }
            $i++;
        }

        $arrayFormChecklist = new Array_formchecklist();

        $hdata = [
            'namaPeralatan' => $checklist['namaPeralatan'],
            'nomorfm' => $arrayFormChecklist->getForm($checklist['namaPeralatan'])[0],
            'revisi' => $arrayFormChecklist->getForm($checklist['namaPeralatan'])[1],
            'tanggal' => $arrayFormChecklist->getForm($checklist['namaPeralatan'])[2]
        ];

        $data = [
            'checklist' => $checklist,
            'komen' => $komen,
            'pegawai' => $pegawai,
            'atasan' => $detA,
            'pertanyaan' => $pertanyaan,
            'jwb' => $jwb
        ];

        $this->response->setContentType("application/pdf");

        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->SetHTMLHeader(view('checklist/hprint', $hdata));
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->WriteHTML(view('checklist/print', $data));
        return $mpdf->Output($checklist['id'] . ' ' . $checklist['namaPeralatan'] . ' checklist.pdf', "D");
    }
}
