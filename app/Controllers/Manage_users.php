<?php

namespace App\Controllers;

use App\Models\AuthGroupsUsersModel;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Models\UserModel;

class Manage_users extends BaseController
{
    protected $UserModel, $GroupModel, $GroupsUsersModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->GroupModel = new GroupModel();
        $this->GroupsUsersModel = new AuthGroupsUsersModel();
    }

    public function index()
    {
        $group = $this->GroupModel->asArray()->findAll();
        $users = $this->UserModel->asArray()->findAll();
        $data = [
            'title' => 'manage users',
            'header' => ['title' => 'manage users', 'kembali' => '/'],
            'group' => $group,
            'users' => $users
        ];

        // dd($data);

        return view('manage_users/index', $data);
    }

    public function save_bidang_regis()
    {
        $request = $this->request->getVar();
        $group = $this->GroupModel->asArray()->findAll();

        $groupID = [];
        foreach ($group as $item) {
            $groupID[] = $item['id'];
        }

        $notAllowedID = array_diff($groupID, array_keys($request));
        $allowedID = array_diff($groupID, $notAllowedID);

        foreach ($notAllowedID as $key => $value) {
            $this->GroupModel->save(
                [
                    'id' => $value,
                    'description' => 0
                ]
            );
        }
        foreach ($allowedID as $k => $val) {
            $this->GroupModel->save(
                [
                    'id' => $val,
                    'description' => 1
                ]
            );
        }

        // die;
        session()->setFlashdata('pesanSuccess', 'anda telah mengupdate bidang registrasi');
        return redirect()->to(base_url('/manage_users'));
    }

    public function save_aktivasi_user()
    {
        $request = $this->request->getVar();
        $users = $this->UserModel->asArray()->findAll();

        $usersID = [];
        foreach ($users as $user) {
            $usersID[] = $user['id'];
        }

        $notAllowedID = array_diff($usersID, array_keys($request));
        $allowedID = array_diff($usersID, $notAllowedID);

        foreach ($notAllowedID as $key => $value) {
            $this->UserModel->save(
                [
                    'id' => $value,
                    'active' => 0
                ]
            );
        }
        foreach ($allowedID as $k => $val) {
            $this->UserModel->save(
                [
                    'id' => $val,
                    'active' => 1
                ]
            );
        }

        // die;
        session()->setFlashdata('pesanSuccess', 'anda telah mengupdate aktivasi users');
        return redirect()->to(base_url('/manage_users'));
    }

    public function save_bidang()
    {
        $request = $this->request->getVar();

        $pesan = 'tidak ada bidang user yang di ubah';
        foreach ($request as $key => $value) {
            if ($this->UserModel->asArray()->find($key)['bidang'] != explode(' | ', $value)[0]) {
                $this->UserModel->save([
                    'id' => $key,
                    'bidang' => explode(' | ', $value)[0]
                ]);

                $this->GroupsUsersModel->save([
                    'user_id' => $key,
                    'group_id' => explode(' | ', $value)[1]
                ]);

                $pesan = 'bidang user telah di ubah';
            }
        }

        session()->setFlashdata('pesanSuccess', $pesan);
        return redirect()->to(base_url('/manage_users'));
    }
}
