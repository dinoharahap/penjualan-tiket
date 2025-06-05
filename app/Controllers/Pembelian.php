<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPembelian;
use App\Models\ModelTiket;
use App\Models\ModelPertandingan;
use CodeIgniter\Model;

class Pembelian extends BaseController
{

    public function index($id)
    {
        $session = session();
        $pmbModel = new ModelPembelian();
        $prtModel = new ModelPertandingan();
        $tktModel = new ModelTiket();
        if ($session->get('username') != NULL) {
            $data = [
                'pembelian' => $pmbModel->getTiketPembelian(),
                'prt' => $prtModel->where('id_pertandingan', $id)->first(),
                // 'pertandingan' => $prtModel->getIdPertandingan($id),
                'pert' => $prtModel->getTiketPertandingan($id),
                // 'tiket' => $tktModel->getTiketPertandingan()
            ];
            return view("tampilanuser/pembelian", $data);
        } else {
            return redirect()->to(base_url('.'));
        }
    }

    public function simpandata()
    {

        $session = session();
        $tktModel = new ModelTiket();
        $Id_tiket = $this->request->getVar('Id_tiket');
        $Id_pertandingan = $this->request->getVar('Id_pertandingan');
        $Jumlah = $this->request->getVar('Jumlah');
        $Metode_pembayaran = $this->request->getVar('Metode_pembayaran');
        $Bukti_pembayaran = $this->request->getFile('Bukti_pembayaran');
        $Tanggal_pembelian = $this->request->getVar('Tanggal_pembelian');
        $Status = $this->request->getVar('Status');
        $Harga = $this->request->getVar('harga');
        // $total_harga = $this->request->getVar('total_harga');    
        // $tribun = $this->request->getVar('tribun');
        // $kd = explode('-', $this->request->getVar('pembelian'));
        $data = [
            // 'id_pembelian' => $idpembelian,
            'id_pertandingan' => $Id_pertandingan,
            'id_tiket' => $Id_tiket,
            'jumlah' => $Jumlah,
            'metode_pembayaran' => $Metode_pembayaran,
            'bukti_pembayaran' => $Bukti_pembayaran,
            'tanggal_pembelian' => $Tanggal_pembelian,
            'status' => $Status,
            'harga' => $Harga

            // 'id_tiket' => $kd[0]
            // 'tribun' => $kd[1]
            // 'tribun' => $tribun
        ];
        // dd($data);

        $tes = $tktModel->where('id_pertandingan', $data['id_pertandingan'])->first();
        $data['total_harga'] = $tes['harga'] * $Jumlah;
        // dd($data);

        $filename =  $data['bukti_pembayaran']->getRandomName();
        $data['bukti_pembayaran']->move(ROOTPATH . 'public/uploads/bukti', $filename);
        $data['bukti_pembayaran'] = $filename;
        // dd($data);

        $pmbModel = new ModelPembelian();
        $pmbModel->insert($data); //simpan data

        $session->setFlashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-check"></i>Sukses Melakukan Pembelian.</h5>
          </div>'
        );

        return redirect()->to(base_url('.'));
    }

    public function cetak($id)
    {
        // Mengambil data pembelian
        $pmbModel = new ModelPembelian();
        $pembelian = $pmbModel->where('id_pembelian', $id)->first();

        // Mengambil data pertandingan
        $ptdModel = new ModelPertandingan();
        $pertandingan = $ptdModel->find($pembelian['id_pertandingan']);

        // Gabungkan data pembelian dan pertandingan
        $data = [
            'pembelian' => $pembelian,
            'pertandingan' => $pertandingan
        ];

        if ($pembelian['status'] != 'DISETUJUI') {
            return "Pembayaran belum disetujui.";
        }

        // Kirim data ke view invoice
        return view('invoice', $data);
    }
}
