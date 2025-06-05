<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelJenisPertandingan;
use App\Models\ModelPertandingan;
use CodeIgniter\Model;

class Tampilanuser extends BaseController
{

    // public function index()
    // {

    //     $session = session();
    //     $prtModel = new ModelPertandingan();
    //     $tktModel = new ModelTiket();
    //     if ($session->get('username') != NULL) {
    //         $data = [
    //             'pertandingan' => $prtModel->findAll(),
    //             'tiket' => $tktModel->getTiketPertandingan()
    //         ];

    //         return view("tampilanuser/vtampilanuser", $data);
    //     } else {
    //         return redirect()->to(base_url('.'));
    //     }
    // }

    public function index()
    {
        $session = session();
        $jnsModel = new ModelJenisPertandingan();
        if ($session->get('username') != NULL) {
            $data['categories'] = $jnsModel->findAll();
            // dd($data);
            return view("tampilanuser/vtampilanuser", $data);
        } else {
            return redirect()->to(base_url('.'));
        }
    }

    public function pertandinganByJenis($id)
    {
        $pertandinganModel = new ModelPertandingan();
        $data['pertandingan'] = $pertandinganModel->getPertandinganByJenis($id);
        return view("tampilanuser/vpertandingan", $data);
    }
}
