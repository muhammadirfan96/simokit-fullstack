<?php

namespace App\Controllers;

use App\Models\ScheduleSatuModel;
use App\Models\ScheduleDuaModel;
use App\Models\ScheduleCommonModel;

class Input_co extends BaseController
{
    protected $scheduleSatuModel, $scheduleDuaModel, $scheduleCommonModel;

    public function __construct()
    {
        $this->scheduleSatuModel = new ScheduleSatuModel();
        $this->scheduleDuaModel = new ScheduleDuaModel();
        $this->scheduleCommonModel = new ScheduleCommonModel();
    }
    protected $thn = ['2021' => 2021, '2022' => 2022, '2023' => 2023, '2024' => 2024, '2025' => 2025, '2026' => 2026, '2027' => 2027, '2028' => 2028, '2029' => 2029, '2030' => 2030];

    protected $bln = ['01' => 'januari', '02' => 'februari', '03' => 'maret', '04' => 'april', '05' => 'mei', '06' => 'juni', '07' => 'juli', '08' => 'agustus', '09' => 'september', '10' => 'oktober', '11' => 'november', '12' => 'desember'];

    public function hari($tahun, $bulan)
    {
        $bln30 = ["04", "06", "09", "11"];
        $bln = $bulan;
        if (in_array($bln, $bln30)) {
            $hari = 30;
        } elseif ($bln == "02") {
            if ($tahun % 4 == 0) {
                $hari = 29;
            } else {
                $hari = 28;
            }
        } else {
            $hari = 31;
        }
        return $hari;
    }

    public function schedulePerBulan($model, $tahun, $tanggal)
    {
        $where = "tanggal LIKE '%$tahun-$tanggal%'";
        $schedule = $model->where($where)->findAll();

        return $schedule;
    }

    public function index()
    {
        $key = $this->scheduleSatuModel->getFieldNames('schedulesatu');
        $data = [
            'title' => 'input | co',
            'header' => ['title' => 'input jadwal c.o.', 'kembali' => '/'],
            'hari' => $this->hari(date('Y'), date('m')),
            'tools' => $this->scheduleSatuModel->tools,
            'bagian' => 'unit#1',
            'method' => 'tablesatu',
            'tahun' => date('Y'),
            'bulanAngka' => date('m'),
            'bulanHuruf' => $this->bln[date('m')],
            'blnList' => $this->bln,
            'thnList' => $this->thn,
            'schedule' => $this->schedulePerBulan($this->scheduleSatuModel, date('Y'), date('m')),
            'key' => $key
        ];

        // d(2024 % 4);

        // die;

        return view('input_co/index', $data);
    }

    public function tablesatu($tahun, $bulan)
    {
        $data = [
            'hari' => $this->hari($tahun, $bulan),
            'tools' => $this->scheduleSatuModel->tools,
            'bagian' => 'unit#1',
            'method' => 'tablesatu',
            'tahun' => $tahun,
            'bulanAngka' => $bulan,
            'bulanHuruf' => $this->bln[$bulan],
            'schedule' => $this->schedulePerBulan($this->scheduleSatuModel, $tahun, $bulan),
            'key' => $this->scheduleSatuModel->getFieldNames('schedulesatu')
        ];
        // dd($data);
        return view('input_co/table', $data);
    }

    public function tabledua($tahun, $bulan)
    {

        $data = [
            'hari' => $this->hari($tahun, $bulan),
            'tools' => $this->scheduleDuaModel->tools,
            'bagian' => 'unit#2',
            'method' => 'tabledua',
            'tahun' => $tahun,
            'bulanAngka' => $bulan,
            'bulanHuruf' => $this->bln[$bulan],
            'schedule' => $this->schedulePerBulan($this->scheduleDuaModel, $tahun, $bulan),
            'key' => $this->scheduleDuaModel->getFieldNames('scheduledua')
        ];
        // dd($data);
        return view('input_co/table', $data);
    }

    public function tablecommon($tahun, $bulan)
    {
        $data = [
            'hari' => $this->hari($tahun, $bulan),
            'tools' => $this->scheduleCommonModel->tools,
            'bagian' => 'common',
            'method' => 'tablecommon',
            'tahun' => $tahun,
            'bulanAngka' => $bulan,
            'bulanHuruf' => $this->bln[$bulan],
            'schedule' => $this->schedulePerBulan($this->scheduleCommonModel, $tahun, $bulan),
            'key' => $this->scheduleCommonModel->getFieldNames('schedulecommon')
        ];
        // dd($data);
        return view('input_co/table', $data);
    }

    public function simpan()
    {
        $tahun = $this->request->getVar('tahun');
        $bulan = $this->request->getVar('bulan');

        if ($this->request->getVar('method') == "tablesatu") {
            $key = $this->scheduleSatuModel->getFieldNames('schedulesatu');
            $this->scheduleSatuModel->setAllowedFields($key);

            // hapus jika ada data yang sama di DB
            $data = $this->schedulePerBulan($this->scheduleSatuModel, $tahun, $bulan);
            if ($data != null) {
                foreach ($data as $row) {
                    $this->scheduleSatuModel->delete($row['id']);
                }
                $pesan = 'update';
            } else {
                $pesan = 'tambahkan';
            }

            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                for ($j = 99; $j <= 124; $j++) {
                    if ($this->request->getVar("$i" . "$j") == null) {
                        $value[] = "";
                    } else {
                        $value[] = $this->request->getVar("$i" . "$j");
                    }
                }
                $result = array_combine($key, $value);
                // d($result);

                $this->scheduleSatuModel->save($result);
            }
            // die;
            session()->setFlashdata('pesanSuccess', 'jadwal change over unit 1 bulan ' . $bulan . '-' . $tahun . ' telah di ' . $pesan . ' !');
        }
        if ($this->request->getVar('method') == "tabledua") {
            $key = $this->scheduleDuaModel->getFieldNames('scheduledua');
            $this->scheduleDuaModel->setAllowedFields($key);

            // hapus jika ada data yang sama di DB
            $data = $this->schedulePerBulan($this->scheduleDuaModel, $tahun, $bulan);
            if ($data != null) {
                foreach ($data as $row) {
                    $this->scheduleDuaModel->delete($row['id']);
                }
                $pesan = 'update';
            } else {
                $pesan = 'tambahkan';
            }

            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                for ($j = 99; $j <= 124; $j++) {
                    if ($this->request->getVar("$i" . "$j") == null) {
                        $value[] = "";
                    } else {
                        $value[] = $this->request->getVar("$i" . "$j");
                    }
                }
                $result = array_combine($key, $value);
                // d($result);

                $this->scheduleDuaModel->save($result);
            }
            // die;
            session()->setFlashdata('pesanSuccess', 'jadwal change over unit 2 bulan ' . $bulan . '-' . $tahun . ' telah di ' . $pesan . ' !');
        }
        if ($this->request->getVar('method') == "tablecommon") {
            $key = $this->scheduleCommonModel->getFieldNames('schedulecommon');
            $this->scheduleCommonModel->setAllowedFields($key);

            // hapus jika ada data yang sama di DB
            $data = $this->schedulePerBulan($this->scheduleCommonModel, $tahun, $bulan);
            if ($data != null) {
                foreach ($data as $row) {
                    $this->scheduleCommonModel->delete($row['id']);
                }
                $pesan = 'update';
            } else {
                $pesan = 'tambahkan';
            }

            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                for ($j = 99; $j <= 115; $j++) {
                    if ($this->request->getVar("$i" . "$j") == null) {
                        $value[] = "";
                    } else {
                        $value[] = $this->request->getVar("$i" . "$j");
                    }
                }
                $result = array_combine($key, $value);
                // d($result);

                $this->scheduleCommonModel->save($result);
            }
            // die;
            session()->setFlashdata('pesanSuccess', 'jadwal change over common bulan ' . $bulan . '-' . $tahun . ' telah di ' . $pesan . ' !');
        }
        return redirect()->to(base_url('/input_co'));
    }
}
