<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\ChecklistModel;
use App\Models\KwhModel;
use App\Models\LimasModel;
use App\Models\ServiceRequestModel;
use App\Models\UsersKpiModel;
use DateTime;
use Myth\Auth\Models\UserModel;

class Admin extends BaseController
{
    protected $KwhModel, $KpiModel, $ChecklistModel, $LimasModel, $ServiceRequestModel, $UserModel, $AbsensiModel, $tgl, $jam;
    public function __construct()
    {
        $this->AbsensiModel = new AbsensiModel();
        $this->KwhModel = new KwhModel();
        $this->KpiModel = new UsersKpiModel();
        $this->ChecklistModel = new ChecklistModel();
        $this->LimasModel = new LimasModel();
        $this->ServiceRequestModel = new ServiceRequestModel();
        $this->UserModel = new UserModel();
        $this->tgl = date('Y-m-d');
        $this->jam = date('H:i:s');
    }

    public function jmlhLaporanMin($i, $model, $shift)
    {
        $jmlh = 0;
        if (user()->bidang == 'admin' || user()->bidang == 'manager bagian operasi') {
            $jmlh = count($model->where('tanggal <=', date('Y-m-d', strtotime("$i day", strtotime(date('Y-m-d')))))->findAll());
            return $jmlh;
        }

        $bidang = explode(' operasi ', $shift);
        $users = $this->UserModel->where('bidang', 'operator ' . $bidang[1])->asArray()->findAll();

        $data = $model->where('tanggal <=', date('Y-m-d', strtotime("$i day", strtotime(date('Y-m-d')))))->findAll();
        // lakukan pengulangan tiap resultnya
        foreach ($data as $row) {
            // lakukan pengulangan untuk tiap user dgn bidang tertentu sesuai parameter di fungsinya
            foreach ($users as $user) {
                // cari data yang diinput oleh bidang tertentu sesuai parameter di fungsinya
                if (str_contains($row['diinput_oleh'], $user['username'])) {
                    // jika ada maka tambahkan nilai 1 pada datanya
                    $jmlh++;
                }
            }
        }
        return $jmlh;
    }

    public function jmlhPersonilShift($bidang)
    {
        return count($this->UserModel->asArray()->where('bidang', $bidang)->findAll());
    }

    public function jadwalShift($tglSekarang, $jamSekarang)
    {
        $data = [];
        $awal = '2022-07-16';
        $jadwal = [
            [
                'pagi' => 'd',
                'sore' => 'b',
                'malam' => 'a',
                'libur' => 'c'
            ],
            [
                'pagi' => 'b',
                'sore' => 'a',
                'malam' => 'c',
                'libur' => 'd'
            ],
            [
                'pagi' => 'a',
                'sore' => 'c',
                'malam' => 'd',
                'libur' => 'b'
            ],
            [
                'pagi' => 'c',
                'sore' => 'd',
                'malam' => 'b',
                'libur' => 'a'
            ],
        ];

        $tanggalAwal = new DateTime($awal);
        $tanggalSekarang = new DateTime($tglSekarang);
        $interval = $tanggalAwal->diff($tanggalSekarang);
        $selisih = $interval->days;

        if (($selisih + 8) % 8 == 0 || ($selisih + 8) % 8 == 2 || ($selisih + 8) % 8 == 4 || ($selisih + 8) % 8 == 6) {
            $data['ke'] = 'pertama';
        }
        if (($selisih + 8) % 8 == 1 || ($selisih + 8) % 8 == 3 || ($selisih + 8) % 8 == 5 || ($selisih + 8) % 8 == 7) {
            $data['ke'] = 'kedua';
        }
        if (($selisih + 8) % 8 == 0 || ($selisih + 8) % 8 == 1) {
            $data['jadwal'] = $jadwal[0];
        }
        if (($selisih + 8) % 8 == 2 || ($selisih + 8) % 8 == 3) {
            $data['jadwal'] = $jadwal[1];
        }
        if (($selisih + 8) % 8 == 4 || ($selisih + 8) % 8 == 5) {
            $data['jadwal'] = $jadwal[2];
        }
        if (($selisih + 8) % 8 == 6 || ($selisih + 8) % 8 == 7) {
            $data['jadwal'] = $jadwal[3];
        }

        $jam = [
            'pagi' => ['08:00:00', '15:00:00'],
            'sore' => ['15:00:00', '22:00:00'],
        ];

        foreach ($jam as $key => $value) {
            if ($jamSekarang > $value[0] && $jamSekarang <= $value[1]) {
                $data['masuk'] = $data['jadwal'][$key];
            }
        }

        if ($jamSekarang > '22:00:00' && $jamSekarang <= '23:59:59') {
            // if ($data['ke'] == 'pertama' || $data['ke'] == 'kedua') {
            $data['masuk'] = $data['jadwal']['malam'];
            // }
        }

        if ($jamSekarang >= '00:00:00' && $jamSekarang <= '08:00:00') {
            if ($data['ke'] == 'kedua') {
                $data['masuk'] = $data['jadwal']['malam'];
            }
            if ($data['ke'] == 'pertama') {
                $data['masuk'] = $data['jadwal']['sore'];
            }
        }

        return $data;
    }

    public function tidakHadir()
    {
        $data = [
            [
                'sakit' => [],
                'izin' => [],
                'cuti' => [],
                'sppd' => [],
                'mangkir' => [],
            ],
            ['catatan' => '']
        ];
        $shift = $this->jadwalShift($this->tgl, $this->jam)['masuk'];
        if ($this->jam >= date('00:00:00') && $this->jam <= date('07:59:59')) {
            $waktu = date('Y-m-d', strtotime("-1 day", strtotime(date('Y-m-d'))));
        }
        if ($this->jam >= date('08:00:00') && $this->jam <= date('23:59:59')) {
            $waktu = date('Y-m-d', strtotime("0 day", strtotime(date('Y-m-d'))));
        }

        $where = "shift = 'shift $shift' AND waktu = '$waktu'";
        $result = $this->AbsensiModel->where($where)->first();
        if ($result == null) {
            return null;
        }

        foreach ($data[0] as $key => $val) {
            if ($result[$key] != '') {
                foreach (explode(' | ', $result[$key]) as $row) {
                    $data[0][$key][] = $this->UserModel
                        ->asArray()
                        ->where(
                            ['username' => $row]
                        )
                        ->first()['fullname'];
                }
            }
        }

        $tukarJaga = [];
        if ($result['tukar'] != '') {
            foreach (explode(' | ', $result['tukar']) as $row) {
                // explode(' - ', $row);
                $diganti = $this->UserModel
                    ->asArray()
                    ->where(
                        ['username' => explode('-', $row)[0]]
                    )
                    ->first()['fullname'];
                $pengganti = $this->UserModel
                    ->asArray()
                    ->where(
                        ['username' => explode('-', $row)[1]]
                    )
                    ->first();
                $tukarJaga[] = $diganti . ' -> ' . $pengganti['fullname'] . ' (' . explode('shift ', $pengganti['bidang'])[1] . ')';
            }
        }

        $data[0]['tukar jaga'] = $tukarJaga;

        $data[1]['catatan'] = $result['catatan'];
        return $data;
    }

    public function jmlhDataKpi($shift)
    {
        $jmlhDataKpi = [0, 0, 0];
        $where = [
            "evidence = ''",
            "evidence != '' AND approve = 'n'",
            "evidence != '' AND approve = 'y'",
        ];

        if (user()->bidang == 'admin' || user()->bidang == 'manager bagian operasi') {
            for ($i = 0; $i < 3; $i++) {
                $jmlhDataKpi[$i] = count($this->KpiModel->where($where[$i])->findAll());
            }
            return $jmlhDataKpi;
        }

        $bidang = explode(' operasi ', $shift);
        $users = $this->UserModel->where('bidang', 'operator ' . $bidang[1])->asArray()->findAll();

        // lakukan pengulangan untuk tiap kondisi where
        for ($i = 0; $i < 3; $i++) {
            // ambil data kpi berdasarkan kodisi where (bisa ada resultnya bisa jga  null)
            $kpi = $this->KpiModel->where($where[$i])->findAll();
            // lakukan pengulangan tiap resultnya
            foreach ($kpi as $row) {
                // lakukan pengulangan untuk tiap user dgn bidang tertentu sesuai parameter di fungsinya
                foreach ($users as $user) {
                    // cari data kpi yang diinput oleh bidang tertentu sesuai parameter di fungsinya
                    if ($user['id'] == $row['user_id']) {
                        // jika ada maka tambahkan nilai 1 pada datanya
                        $jmlhDataKpi[$i]++;
                    }
                }
            }
        }

        return $jmlhDataKpi;
    }

    public function index()
    {
        // kwh
        $totalDataKwh = count($this->KwhModel->findAll());
        $kwh = $this->KwhModel->findAll(5, $totalDataKwh - 5);

        $keys = ['waktu', 'kit1', 'kit2', 'ps1', 'ps2', 'et1', 'et2'];

        $dataKwh = [
            [], [], [], [], [], [], [],
        ];

        foreach ($kwh as $row) {
            $i = 0;
            foreach ($dataKwh as $item) {
                if ($i == 0) {
                    $dataKwh[$i][] = explode(' ', $row[$keys[$i]])[0];
                    $i++;
                } else {
                    $dataKwh[$i][] = $row[$keys[$i]];
                    $i++;
                }
            }
        }

        // laporan
        $dataLaporan = [
            [], [], [], []
        ];

        for ($i = -9; $i <= 0; $i++) {
            $dataLaporan[0][] = date('Y-m-d', strtotime("$i day", strtotime(date('Y-m-d'))));
        }
        for ($i = -8; $i <= 1; $i++) {
            $dataLaporan[1][] = $this->jmlhLaporanMin($i, $this->ChecklistModel, user()->bidang);
        }
        for ($i = -8; $i <= 1; $i++) {
            $dataLaporan[2][] = $this->jmlhLaporanMin($i, $this->LimasModel, user()->bidang);
        }
        for ($i = -8; $i <= 1; $i++) {
            $dataLaporan[3][] = $this->jmlhLaporanMin($i, $this->ServiceRequestModel, user()->bidang);
        }

        // users
        $jmlhDataUsers = [0, 0, 0, 0];
        $bidang = ['a', 'b', 'c', 'd'];
        $i = 0;
        foreach ($bidang as $item) {
            $jmlhDataUsers[$i] = $this->jmlhPersonilShift('operator shift ' . $item);
            $i++;
        }

        $data = [
            'title' => 'admin | home',
            'header' => ['title' => $this->tgl . ' ' . $this->jam, 'kembali' => '/'],
            'dataKwh' => $dataKwh,
            'jmlhDataKpi' => $this->jmlhDataKpi(user()->bidang),
            'dataLaporan' => $dataLaporan,
            'jmlhDataUsers' => $jmlhDataUsers,
            'jadwalShift' => $this->jadwalShift($this->tgl, $this->jam),
            'tidakHadir' => $this->tidakHadir()
        ];

        return view('admin/index', $data);
    }
}
