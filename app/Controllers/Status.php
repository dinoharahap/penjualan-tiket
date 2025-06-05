<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPembelian;
use CodeIgniter\Model;

class Status extends BaseController
{

    public function index()
    {

        $session = session();
        $pmbModel = new ModelPembelian();
        if ($session->get('username') != NULL) {
            $data = [
                'pembelian' => $pmbModel->getTiketPembelian(),
            ];

            return view("tampilanuser/status", $data);
        } else {
            return redirect()->to(base_url('.'));
        }
}
}
