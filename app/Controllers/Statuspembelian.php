<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPembelian;
use CodeIgniter\Model;

class Statuspembelian extends BaseController
{

    public function index()
    {

        $session = session();
        $pmbModel = new ModelPembelian();
        if ($session->get('username') != NULL) {
            $data = [
                'pembelian' => $pmbModel->getTiketPembelian(),
            ];

            return view("statuspemb/vstatuspemb", $data);
        } else {
            return redirect()->to(base_url('.'));
        }
    }

    public function simpandata()
    {

        $session = session();

        $Id_pembelian = $this->request->getVar('Id_pembelian');
        $Id_pertandingan = $this->request->getVar('Id_pertandingan');
        $Id_tiket = $this->request->getVar('Id_tiket');
        $Jumlah = $this->request->getVar('Jumlah');
        $Metode_pembayaran = $this->request->getVar('Metode_pembayaran');
        $Bukti_pembayaran = $this->request->getFile('Bukti_pembayaran');
        $Total_harga = $this->request->getVar('Total_harga');
        $Tanggal_pembelian = $this->request->getVar('Tanggal_pembelian');
        $Status = $this->request->getVar('Status');
        $data = [
            'id_pembelian' => $Id_pembelian,
            'id_pertandingan' => $Id_pertandingan,
            'id_tiket' => $Id_tiket,
            'jumlah' => $Jumlah,
            'metode_pembayaran' => $Metode_pembayaran,
            'bukti_pembayaran' => $Bukti_pembayaran,
            'total_harga' => $Total_harga,
            'tanggal_pembelian' => $Tanggal_pembelian,
            'status' => $Status
        ];
        $pmbModel = new ModelPembelian();
        $pmbModel->insert($data); //simpan data

        $session->setFlashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-check"></i>Sukses
           Simpan Data Pertandingan.</h5>
          </div>'
        );

        return redirect()->to('statuspembelian');
    }

    public function updatedata()
    {
        $session = session();

        $Id_pembelian = $this->request->getVar('Id_pembelian');
        $Id_pertandingan = $this->request->getVar('Id_pertandingan');
        $Id_tiket = $this->request->getVar('Id_tiket');
        $Jumlah = $this->request->getVar('Jumlah');
        $Metode_pembayaran = $this->request->getVar('Metode_pembayaran');
        $Bukti_pembayaran = $this->request->getVar('Bukti_pembayaran');
        $Total_harga = $this->request->getVar('Total_harga');
        $Tanggal_pembelian = $this->request->getVar('Tanggal_pembelian');
        $Status = $this->request->getVar('Status');
        $data = [
            'id_pembelian' => $Id_pembelian,
            'id_pertandingan' => $Id_pertandingan,
            'id_tiket' => $Id_tiket,
            'jumlah' => $Jumlah,
            'metode_pembayaran' => $Metode_pembayaran,
            'bukti_pembayaran' => $Bukti_pembayaran,
            'total_harga' => $Total_harga,
            'tanggal_pembelian' => $Tanggal_pembelian,
            'status' => $Status
        ];
        $where = [
            'id_pembelian' => $Id_pembelian
        ];
        $pmbModel = new ModelPembelian();
        $pmbModel->update($where, $data); //update data
        $session->setFlashdata(
            'pesan',
            '<div class = "alert alert-success alert-disissible">
            <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
            <h5><i class = "fas fa-check"></i>Sukses,
            Update Status.</h5>
            </div>'
        );
        return redirect()->route('statuspembelian');
    }

    public function hapusdata()
    {
        $session = session();
        $pmbModel = new ModelPembelian();
        $where = [
            'id_pembelian' => $this->request->getVar('Id_pembelian')
        ];
        $pmbModel->delete($where); //update data
        $session->setFlashdata(
            'pesan',
            '<div class = "alert alert-success alert-dismissible">
            <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
            <h5><i class = "icon fas fa-check"></i>Sukses,
            Hapus Status.</h5>
            </div>'
        );
        return redirect()->route('statuspembelian');
    }

    public function tampilGambar($filename)
    {
        $path = WRITEPATH . 'uploads/bukti' . $filename;

        if (file_exists($path)) {
            $info = getimagesize($path);
            $mimeType = $info['mime'];

            header("Content-Type: $mimeType");
            readfile($path);
            exit;
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Gambar tidak ditemukan: " . $filename);
        }
    }
}
