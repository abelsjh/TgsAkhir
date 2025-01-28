<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModels;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{

    public function index()
    {
        $model = new LoginModels();
        $login = $this->request->getPost('/');
        if ($login) {
            $member_username = $this->request->getPost('member_username');
            $member_password = $this->request->getPost('member_password');

            if ($member_username == '' or  $member_password == '') {
                $err = "Silakan masukkan username dan password";
            }

            if (empty($err)) {
                $dataMember = $model->where('member_username', $member_username)->first();
                if (
                    $dataMember['member_password'] != md5($member_password)
                ) {
                    $err = "Password tidak sesuai";
                }
            }

            if (empty($err)) {
                $dataSesi = [
                    'member_id' => $dataMember['member_id'],
                    'member_username' => $dataMember['member_username'],
                    'member_password' => $dataMember['member_password'],
                    'member_role' => 'user', // Default role for all users
                ];
                session()->set($dataSesi);
                return redirect()->to('/home');
            }

            if ($err) {
                session()->setFlashdata("member_username", $member_username);
                session()->setFlashdata('error', $err);
                return redirect()->to('');
            }
        }
        return view('v_login');
    }
}
