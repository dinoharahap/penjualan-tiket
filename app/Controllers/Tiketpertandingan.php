<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;
use App\Models\ModelTiket;
use App\Models\ModelPertandingan;

class Tiketpertandingan extends BaseController
{

    public function index($id)
    {

        $session = session();
        $prtModel = new ModelPertandingan();
        $tktModel = new ModelTiket();
        if ($session->get('username') != NULL) {
            $data = [
                'prt' => $prtModel->where('id_pertandingan', $id)->first(),
                'pertandingan' => $prtModel->getTiketPertandingan($id),
                'tiket' => $tktModel->findAll()
            ];
            // dd($data);
            return view("tiketpert/vtiketpert", $data);
        } else {
            return redirect()->to(base_url('.'));
        }
    }

    public function simpandata()
    {

        $session = session();

        $idpertandingan = $this->request->getVar('idpertandingan');
        $idtiket = $this->request->getVar('idtiket');
        $tribun = $this->request->getVar('tribun');
        $harga = $this->request->getVar('harga');
        $jumlahtersedia = $this->request->getVar('jumlahtersedia');
        $data = [
            'id_tiket' => $idtiket,
            'id_pertandingan' => $idpertandingan,
            'tribun' => $tribun,
            'harga' => $harga,
            'jumlah_tersedian' => $jumlahtersedia
        ];
        $tktModel = new ModelTiket();
        $tktModel->insert($data); //simpan data
      

        $session->setFlashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-check"></i>Sukses
           Simpan Data Tiket.</h5>
          </div>'
        );

        return redirect()->to(base_url('.') . 'tiketpert/' . $data['id_pertandingan']);
    }

    public function updatedata()
    {
        $session = session();

        $idtiket = $this->request->getVar('id_tiket');
        $idpertandingan = $this->request->getVar('id_pertandingan');
        $tribun = $this->request->getVar('tribun');
        $harga = $this->request->getVar('harga');
        $jumlahtersedia = $this->request->getVar('jumlah_tersedian');
        $data = [
            'id_tiket' => $idtiket,
            'id_pertandingan' => $idpertandingan,
            'tribun' => $tribun,
            'harga' => $harga,
            'jumlah_tersedian' => $jumlahtersedia
        ];
        $where = [
            'id_tiket' => $idtiket
        ];
        $tktModel = new ModelTiket();
        $tktModel->update($where, $data); //update data
        $session->setFlashdata(
            'pesan',
            '<div class = "alert alert-success alert-disissible">
            <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
            <h5><i class = "fas fa-check"></i>Sukses,
            Update Harga Tiket.</h5>
            </div>'
        );
        return redirect()->route('tiketpert');
    }

    public function hapusdata()
    {
        $session = session();
        $tktModel = new ModelTiket();
        $where = [
            'id_tiket' => $this->request->getVar('id_tiket')
        ];
        $tktModel->delete($where); //update data
        $session->setFlashdata(
            'pesan',
            '<div class = "alert alert-success alert-dismissible">
            <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
            <h5><i class = "icon fas fa-check"></i>Sukses,
            Hapus Harga Tiket .</h5>
            </div>'
        );
        return redirect()->route('tiketpert');
    }
}
