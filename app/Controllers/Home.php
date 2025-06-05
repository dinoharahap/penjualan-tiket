<?php

namespace App\Controllers;

use App\Models\ModelUser;

class Home extends BaseController
{
    public function login()
    {
        return view('Login/login');
    }

    public function login_process()
    {
        $user = new ModelUser();
        $uname = $this->request->getVar('username');
        $pasw = md5($this->request->getVar('password'));
        $ada = $user->where("username = '$uname' AND password = '$pasw'")->first();
        if ($ada) {
            session()->set('username', $ada['username']);
            session()->set('nama', $ada['nama']);
            session()->set('status', $ada['status']);
            session()->set('isLoggedIn', TRUE);

            if ($ada['status'] == 'ADMIN') {
                return redirect()->to(base_url('./jenispertandingan'));
            }
            return redirect()->to(base_url('./tampilanuser'));
        } else {
            session()->setFlashdata(
                'pesan',
                '<div class = "alert alert-danger alert-dismissible>
                <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
                <h5><i class = "icon fas fa-xmarl"></i>Oppps, Username/Password anda salah</h5>
                </div>'
            );
            return redirect()->to(base_url('.'));
        }
    }

    public function menu()
    {
        $session = session();
        if ($session->get('username') != NULL) {
            return view('Template/template');
        } else {
            return redirect()->to(base_url('.'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('.'));
    }

    public function daftar()
    {

        $session = session();
        $user = new ModelUser();
        $nama = $this->request->getVar('nama');
        $uname = $this->request->getVar('username');
        $status = $this->request->getVar('status');
        $pasw = md5($this->request->getVar('password'));
        // $ada = $user->where("username = '$uname' AND password = '$pasw'")->first();
        $data = [
            'nama' => $nama,
            'username' => $uname,
            'status' => $status,
            'password' => $pasw
        ];
        $user = new ModelUser();
        $user->insert($data); //simpan data

        $session->setFlashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-check"></i>Selamat
           Anda Berhasil Buat Akun.</h5>
          </div>'
        );

        return redirect()->to(base_url('.'));
    }

    // public function index(): string
    // {
    //     return view('Template/vtemplate');
    // }
}
