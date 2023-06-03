<?php

namespace App\Controllers;

use App\Models\LimasBoilerPertamaModel;
use App\Models\LimasBoilerKeduaModel;
use App\Models\LimasBoilerKetigaModel;
use App\Models\LimasTurbinPertamaModel;
use App\Models\LimasTurbinKeduaModel;
use App\Models\LimasTurbinKetigaModel;
use App\Models\LimasTurbinKeempatModel;
use App\Models\LimasAlbaPertamaModel;
use App\Models\LimasAlbaKeduaModel;
use App\Models\ScheduleSatuModel;
use App\Models\ScheduleDuaModel;
use App\Models\ScheduleCommonModel;
use App\Models\NoticeModel;

use function PHPUnit\Framework\isEmpty;

class Home extends BaseController
{
    protected $scheduleSatu, $scheduleDua, $scheduleCommon, $limasBoilerPertama, $limasBoilerKedua, $limasBoilerKetiga, $limasTurbinPertama, $limasTurbinKedua, $limasTurbinKetiga, $limasTurbinKeempat, $limasAlbaPertama, $limasAlbaKedua;

    protected $noticeModel;

    public function __construct()
    {
        $this->scheduleSatu = new ScheduleSatuModel();
        $this->scheduleDua = new ScheduleDuaModel();
        $this->scheduleCommon = new ScheduleCommonModel();
        $this->limasBoilerPertama = new LimasBoilerPertamaModel();
        $this->limasBoilerKedua = new LimasBoilerKeduaModel();
        $this->limasBoilerKetiga = new LimasBoilerKetigaModel();
        $this->limasTurbinPertama = new LimasTurbinPertamaModel();
        $this->limasTurbinKedua = new LimasTurbinKeduaModel();
        $this->limasTurbinKetiga = new LimasTurbinKetigaModel();
        $this->limasTurbinKeempat = new LimasTurbinKeempatModel();
        $this->limasAlbaPertama = new LimasAlbaPertamaModel();
        $this->limasAlbaKedua = new LimasAlbaKeduaModel();

        $this->noticeModel = new NoticeModel();
    }

    public function isNull($data)
    {
        $dataNull = [];
        foreach ($data as $row) {
            if ($row == null) {
                $dataNull[] = 'y';
            }
        }
        if (count($dataNull) == count($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function isNone($peralatan)
    {
        $data = array_merge(
            $peralatan
        );
        if (in_array("!", $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        $limasBoiler = array_merge(
            $this->limasBoilerPertama->limasBoilerPertama(),
            $this->limasBoilerKedua->limasBoilerKedua(),
            $this->limasBoilerKetiga->limasBoilerKetiga()
        );

        $limasTurbin = array_merge(
            $this->limasTurbinPertama->limasTurbinPertama(),
            $this->limasTurbinKedua->limasTurbinKedua(),
            $this->limasTurbinKetiga->limasTurbinKetiga(),
            $this->limasTurbinKeempat->limasTurbinKeempat(),
        );

        $limasAlba = array_merge(
            $this->limasAlbaPertama->limasAlbaPertama(),
            $this->limasAlbaKedua->limasAlbaKedua()
        );

        $scheduleSatu = $this->scheduleSatu->scheduleUnitSatu();
        $scheduleDua = $this->scheduleDua->scheduleUnitDua();
        $scheduleCommon = $this->scheduleCommon->scheduleCommon();

        $hari = date('Y-m-d H:i:s');
        $like = user()->bidang;
        $where = "notice_to LIKE '%$like%' AND start_time < '$hari' AND end_time > '$hari'";

        $data = [
            'title' => 'home | simokit',
            'limasBoiler' => $limasBoiler,
            'limasTurbin' => $limasTurbin,
            'limasAlba' => $limasAlba,
            'isNoneBoiler' => $this->isNone($limasBoiler),
            'isNoneTurbin' => $this->isNone($limasTurbin),
            'isNoneAlba' => $this->isNone($limasAlba),
            'jadwalCoUnit1' => $scheduleSatu,
            'jadwalCoUnit2' => $scheduleDua,
            'jadwalCoCommon' => $scheduleCommon,
            'isNullSatu' => $this->isNull($scheduleSatu),
            'isNullDua' => $this->isNull($scheduleDua),
            'isNullCommon' => $this->isNull($scheduleCommon),
            'notice' => $this->noticeModel->where($where)->findAll()
        ];

        return view('home/index', $data);
    }
}
