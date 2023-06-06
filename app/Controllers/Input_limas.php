<?php

namespace App\Controllers;

use App\Models\LimasBoilerKeduaModel;
use App\Models\LimasBoilerKetigaModel;
use App\Models\LimasBoilerPertamaModel;
use App\Models\LimasTurbinPertamaModel;
use App\Models\LimasTurbinKeduaModel;
use App\Models\LimasTurbinKetigaModel;
use App\Models\LimasTurbinKeempatModel;
use App\Models\LimasAlbaPertamaModel;
use App\Models\LimasAlbaKeduaModel;

class Input_limas extends BaseController
{
    protected $limasBoilerPertamaModel, $limasBoilerKeduaModel, $limasBoilerKetigaModel, $limasTurbinPertamaModel, $limasTurbinKeduaModel, $limasTurbinKetigaModel, $limasTurbinKeempatModel, $limasAlbaPertamaModel, $limasAlbaKeduaModel;

    public function __construct()
    {
        $this->limasBoilerPertamaModel = new LimasBoilerPertamaModel();
        $this->limasBoilerKeduaModel = new LimasBoilerKeduaModel();
        $this->limasBoilerKetigaModel = new LimasBoilerKetigaModel();
        $this->limasTurbinPertamaModel = new LimasTurbinPertamaModel();
        $this->limasTurbinKeduaModel = new LimasTurbinKeduaModel();
        $this->limasTurbinKetigaModel = new LimasTurbinKetigaModel();
        $this->limasTurbinKeempatModel = new LimasTurbinKeempatModel();
        $this->limasAlbaPertamaModel = new LimasAlbaPertamaModel();
        $this->limasAlbaKeduaModel = new LimasAlbaKeduaModel();
    }

    public function schedulePerBulan($model, $tahun, $tanggal)
    {
        $where = "tanggal LIKE '%$tahun-$tanggal%'";
        $schedule = $model->where($where)->findAll();
        return $schedule;
    }

    public function scheduleBoilerPerbulan($tahun, $bulan)
    {
        return [
            $this->schedulePerBulan($this->limasBoilerPertamaModel, $tahun, $bulan),
            $this->schedulePerBulan($this->limasBoilerKeduaModel, $tahun, $bulan),
            $this->schedulePerBulan($this->limasBoilerKetigaModel, $tahun, $bulan)
        ];
    }
    public function scheduleTurbinPerbulan($tahun, $bulan)
    {
        return [
            $this->schedulePerBulan($this->limasTurbinPertamaModel, $tahun, $bulan),
            $this->schedulePerBulan($this->limasTurbinKeduaModel, $tahun, $bulan),
            $this->schedulePerBulan($this->limasTurbinKetigaModel, $tahun, $bulan),
            $this->schedulePerBulan($this->limasTurbinKeempatModel, $tahun, $bulan)
        ];
    }
    public function scheduleAlbaPerbulan($tahun, $bulan)
    {
        return [
            $this->schedulePerBulan($this->limasAlbaPertamaModel, $tahun, $bulan),
            $this->schedulePerBulan($this->limasAlbaKeduaModel, $tahun, $bulan)
        ];
    }

    public function namaPeralatanBoiler()
    {
        return [
            $this->limasBoilerPertamaModel->peralatanBoilerPertama, $this->limasBoilerKeduaModel->peralatanBoilerKedua, $this->limasBoilerKetigaModel->peralatanBoilerKetiga
        ];
    }

    public function keyTableBoiler()
    {
        return [
            $this->limasBoilerPertamaModel->getFieldNames('limasboilerpertama'),
            $this->limasBoilerKeduaModel->getFieldNames('limasboilerkedua'),
            $this->limasBoilerKetigaModel->getFieldNames('limasboilerketiga')
        ];
    }

    public function namaPeralatanTurbin()
    {
        return [
            $this->limasTurbinPertamaModel->peralatanTurbinPertama, $this->limasTurbinKeduaModel->peralatanTurbinKedua, $this->limasTurbinKetigaModel->peralatanTurbinKetiga, $this->limasTurbinKeempatModel->peralatanTurbinKeempat
        ];
    }

    public function keyTableTurbin()
    {
        return [
            $this->limasTurbinPertamaModel->getFieldNames('limasturbinpertama'),
            $this->limasTurbinKeduaModel->getFieldNames('limasturbinkedua'),
            $this->limasTurbinKetigaModel->getFieldNames('limasturbinketiga'),
            $this->limasTurbinKeempatModel->getFieldNames('limasturbinkeempat')
        ];
    }

    public function namaPeralatanAlba()
    {
        return [
            $this->limasAlbaPertamaModel->peralatanAlbaPertama,
            $this->limasAlbaKeduaModel->peralatanAlbaKedua
        ];
    }

    public function keyTableAlba()
    {
        return [
            $this->limasAlbaPertamaModel->getFieldNames('limasalbapertama'),
            $this->limasAlbaKeduaModel->getFieldNames('limasalbakedua')
        ];
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

    public function index()
    {
        $data = [
            'title' => 'input | kegiatan 5s',
            'header' => ['title' => 'input jadwal 5s', 'kembali' => '/'],
            'hari' => $this->hari(date('Y'), date('m')),
            'tahun' => date('Y'),
            'bulanAngka' => date('m'),
            'bulanHuruf' => $this->bln[date('m')],
            'blnList' => $this->bln,
            'thnList' => $this->thn,
            'tables' => $this->namaPeralatanBoiler(),
            'bagian' => 'boiler',
            'schedule' => $this->scheduleBoilerPerbulan(date('Y'), date('m')),
            'key' => $this->keyTableBoiler()
        ];

        return view('input_limas/index', $data);
    }

    public function boiler($tahun, $bulan)
    {
        $data = [
            'hari' => $this->hari($tahun, $bulan),
            'tahun' => $tahun,
            'bulanAngka' => $bulan,
            'bulanHuruf' => $this->bln[$bulan],
            'tables' => $this->namaPeralatanBoiler(),
            'bagian' => 'boiler',
            'schedule' => $this->scheduleBoilerPerbulan($tahun, $bulan),
            'key' => $this->keyTableBoiler()
        ];
        // d($data);

        return view('input_limas/table', $data);
    }

    public function turbin($tahun, $bulan)
    {
        $data = [
            'hari' => $this->hari($tahun, $bulan),
            'tahun' => $tahun,
            'bulanAngka' => $bulan,
            'bulanHuruf' => $this->bln[$bulan],
            'tables' => $this->namaPeralatanTurbin(),
            'bagian' => 'turbin',
            'schedule' => $this->scheduleTurbinPerbulan($tahun, $bulan),
            'key' => $this->keyTableTurbin()
        ];
        // d($data);

        return view('input_limas/table', $data);
    }

    public function alba($tahun, $bulan)
    {
        $data = [
            'hari' => $this->hari($tahun, $bulan),
            'tahun' => $tahun,
            'bulanAngka' => $bulan,
            'bulanHuruf' => $this->bln[$bulan],
            'tables' => $this->namaPeralatanAlba(),
            'bagian' => 'alba',
            'schedule' => $this->scheduleAlbaPerbulan($tahun, $bulan),
            'key' => $this->keyTableAlba()
        ];
        // d($data);

        return view('input_limas/table', $data);
    }

    public function simpan()
    {
        $tahun = $this->request->getVar('tahun');
        $bulan = $this->request->getVar('bulan');

        if ($this->request->getVar('method') == "boiler") {
            $key1 = $this->keyTableBoiler()[0];
            $this->limasBoilerPertamaModel->setAllowedFields($key1);

            // hapus jika ada data yang sama di DB
            $data = $this->scheduleBoilerPerbulan($tahun, $bulan);
            if ($data[0] != null) {
                foreach ($data[0] as $row) {
                    $this->limasBoilerPertamaModel->delete($row['id']);
                    $this->limasBoilerKeduaModel->delete($row['id']);
                    $this->limasBoilerKetigaModel->delete($row['id']);
                }
                $pesan = 'update';
            } else {
                $pesan = 'tambahkan';
            }

            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value1 = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value1[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                for ($j = 99; $j <= 124; $j++) {
                    if ($this->request->getVar("$i" . "$j" . "1") == null) {
                        $value1[] = "";
                    } else {
                        $value1[] = $this->request->getVar("$i" . "$j" . "1");
                    }
                }
                $result = array_combine($key1, $value1);
                // d($result);

                $this->limasBoilerPertamaModel->save($result);
            }
            $key2 = $this->keyTableBoiler()[1];
            $this->limasBoilerKeduaModel->setAllowedFields($key2);

            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value2 = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value2[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                for ($j = 99; $j <= 124; $j++) {
                    if ($this->request->getVar("$i" . "$j" . "2") == null) {
                        $value2[] = "";
                    } else {
                        $value2[] = $this->request->getVar("$i" . "$j" . "2");
                    }
                }
                $result = array_combine($key2, $value2);
                // d($result);

                $this->limasBoilerKeduaModel->save($result);
            }
            $key3 = $this->keyTableBoiler()[2];
            $this->limasBoilerKetigaModel->setAllowedFields($key3);
            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value3 = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value3[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                for ($j = 99; $j <= 118; $j++) {
                    if ($this->request->getVar("$i" . "$j" . "3") == null) {
                        $value3[] = "";
                    } else {
                        $value3[] = $this->request->getVar("$i" . "$j" . "3");
                    }
                }
                $result = array_combine($key3, $value3);
                // d($result);

                $this->limasBoilerKetigaModel->save($result);
            }
            session()->setFlashdata('pesanSuccess', 'jadwal kegiatan 5s boiler bulan ' . $bulan . '-' . $tahun . ' telah di ' . $pesan . ' !');
        }
        if ($this->request->getVar('method') == "turbin") {
            $key1 = $this->keyTableTurbin()[0];
            $this->limasTurbinPertamaModel->setAllowedFields($key1);

            // hapus jika ada data yang sama di DB
            $data = $this->scheduleTurbinPerbulan($tahun, $bulan);
            if ($data[0] != null) {
                foreach ($data[0] as $row) {
                    $this->limasTurbinPertamaModel->delete($row['id']);
                    $this->limasTurbinKeduaModel->delete($row['id']);
                    $this->limasTurbinKetigaModel->delete($row['id']);
                    $this->limasTurbinKeempatModel->delete($row['id']);
                }
                $pesan = 'update';
            } else {
                $pesan = 'tambahkan';
            }

            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value1 = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value1[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                // $value1[] = date('Y-m-' . $i);
                for ($j = 99; $j <= 126; $j++) {
                    if ($this->request->getVar("$i" . "$j" . "1") == null) {
                        $value1[] = "";
                    } else {
                        $value1[] = $this->request->getVar("$i" . "$j" . "1");
                    }
                }
                $result = array_combine($key1, $value1);
                // d($result);

                $this->limasTurbinPertamaModel->save($result);
            }

            $key2 = $this->keyTableTurbin()[1];
            $this->limasTurbinKeduaModel->setAllowedFields($key2);
            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value2 = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value2[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                // $value2[] = date('Y-m-' . $i);
                for ($j = 99; $j <= 126; $j++) {
                    if ($this->request->getVar("$i" . "$j" . "2") == null) {
                        $value2[] = "";
                    } else {
                        $value2[] = $this->request->getVar("$i" . "$j" . "2");
                    }
                }
                $result = array_combine($key2, $value2);

                $this->limasTurbinKeduaModel->save($result);
            }

            $key3 = $this->keyTableTurbin()[2];
            $this->limasTurbinKetigaModel->setAllowedFields($key3);
            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value3 = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value3[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                // $value3[] = date('Y-m-' . $i);
                for ($j = 99; $j <= 124; $j++) {
                    if ($this->request->getVar("$i" . "$j" . "3") == null) {
                        $value3[] = "";
                    } else {
                        $value3[] = $this->request->getVar("$i" . "$j" . "3");
                    }
                }
                $result = array_combine($key3, $value3);

                $this->limasTurbinKetigaModel->save($result);
            }

            $key4 = $this->keyTableTurbin()[3];
            $this->limasTurbinKeempatModel->setAllowedFields($key4);
            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value4 = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value4[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                // $value4[] = date('Y-m-' . $i);
                for ($j = 99; $j <= 122; $j++) {
                    if ($this->request->getVar("$i" . "$j" . "4") == null) {
                        $value4[] = "";
                    } else {
                        $value4[] = $this->request->getVar("$i" . "$j" . "4");
                    }
                }
                $result = array_combine($key4, $value4);

                $this->limasTurbinKeempatModel->save($result);
            }
            session()->setFlashdata('pesanSuccess', 'jadwal kegiatan 5s turbin bulan ' . $bulan . '-' . $tahun . ' telah di ' . $pesan . ' !');
        }
        if ($this->request->getVar('method') == "alba") {
            // dd($this->request->getVar());
            $key1 = $this->keyTableAlba()[0];
            $this->limasAlbaPertamaModel->setAllowedFields($key1);

            // hapus jika ada data yang sama di DB
            $data = $this->scheduleAlbaPerbulan($tahun, $bulan);
            if ($data[0] != null) {
                foreach ($data[0] as $row) {
                    $this->limasAlbaPertamaModel->delete($row['id']);
                    $this->limasAlbaKeduaModel->delete($row['id']);
                }
                $pesan = 'update';
            } else {
                $pesan = 'tambahkan';
            }

            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value1 = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value1[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                // $value1[] = date('Y-m-' . $i);
                for ($j = 99; $j <= 126; $j++) {
                    if ($this->request->getVar("$i" . "$j" . "1") == null) {
                        $value1[] = "";
                    } else {
                        $value1[] = $this->request->getVar("$i" . "$j" . "1");
                    }
                }
                $result = array_combine($key1, $value1);

                $this->limasAlbaPertamaModel->save($result);
            }

            $key2 = $this->keyTableAlba()[1];
            $this->limasAlbaKeduaModel->setAllowedFields($key2);
            for ($i = 1; $i <= $this->hari($tahun, $bulan); $i++) {
                $value2 = [''];
                if (strlen($i) == 1) {
                    $angka0 = 0;
                } else {
                    $angka0 = null;
                }
                $value2[] = date($tahun . '-' . $bulan . '-' . $angka0 . $i);
                // $value2[] = date('Y-m-' . $i);
                for ($j = 99; $j <= 106; $j++) {
                    if ($this->request->getVar("$i" . "$j" . "2") == null) {
                        $value2[] = "";
                    } else {
                        $value2[] = $this->request->getVar("$i" . "$j" . "2");
                    }
                }
                $result = array_combine($key2, $value2);

                $this->limasAlbaKeduaModel->save($result);
            }
            session()->setFlashdata('pesanSuccess', 'jadwal kegiatan 5s alba bulan ' . $bulan . '-' . $tahun . ' telah di ' . $pesan . ' !');
        }
        return redirect()->to(base_url('/input_limas'));
    }
}
