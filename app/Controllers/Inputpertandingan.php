<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPertandingan;
use App\Models\ModelJenisPertandingan;
use CodeIgniter\Model;

class Inputpertandingan extends BaseController
{

    public function index()
    {

        $session = session();
        $prtModel = new ModelPertandingan();
        $jnsModel = new ModelJenisPertandingan();
        if ($session->get('username') != NULL) {
            $data = [
                'pertandingan' => $prtModel->findAll(),
                'jenispertandingan' => $jnsModel->findAll()
            ];

            return view("inputpert/vinputpert", $data);
        } else {
            return redirect()->to(base_url('.'));
        }
    }

    public function simpandata()
    {

        $session = session();

        $idpertandingan = $this->request->getVar('idpertandingan');
        $timtuanrumah = $this->request->getVar('timtuanrumah');
        $timtamu = $this->request->getVar('timtamu');
        $tanggal = $this->request->getVar('tanggal');
        $stadion = $this->request->getVar('stadion');
        $kd = explode('-', $this->request->getVar('jenispertandingan'));
        $data = [
            'id_pertandingan' => $idpertandingan,
            'tim_tuan_rumah' => $timtuanrumah,
            'tim_tamu' => $timtamu,
            'tanggal' => $tanggal,
            'stadion' => $stadion,
            'id_jenis_pertandingan' => $kd[0],
            'jenis_pertandingan' => $kd[1]
        ];
        $prtModel = new ModelPertandingan();
        $prtModel->insert($data); //simpan data

        $session->setFlashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-check"></i>Sukses
           Simpan Data Pertandingan.</h5>
          </div>'
        );

        return redirect()->to('inputpertandingan');
    }

    public function updatedata()
    {
        $session = session();

        $idpertandingan = $this->request->getVar('idpertandingan');
        $timtuanrumah = $this->request->getVar('timtuanrumah');
        $timtamu = $this->request->getVar('timtamu');
        $tanggal = $this->request->getVar('tanggal');
        $stadion = $this->request->getVar('stadion');
        $jenispertandingan = $this->request->getVar('jenispertandingan');

        $kd = explode('-', $jenispertandingan);
        if (count($kd) == 2) {
            $data = [
                'tim_tuan_rumah' => $timtuanrumah,
                'tim_tamu' => $timtamu,
                'tanggal' => $tanggal,
                'stadion' => $stadion,
                'id_jenis_pertandingan' => $kd[0],
                'jenis_pertandingan' => $kd[1]
            ];

            $prtModel = new ModelPertandingan();
            $prtModel->update($idpertandingan, $data); // update data

            $session->setFlashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="fas fa-check"></i> Sukses, Update Jadwal Pertandingan.</h5>
            </div>'
            );
        } else {
            $session->setFlashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="fas fa-times"></i> Error, Gagal Update Jadwal Pertandingan. Jenis Pertandingan tidak valid.</h5>
            </div>'
            );
        }

        return redirect()->route('inputpertandingan');
    }



    public function hapusdata()
    {
        $session = session();
        $prtModel = new ModelPertandingan();
        $where = [
            'id_pertandingan' => $this->request->getVar('idpertandingan')
        ];
        $prtModel->delete($where); //update data
        $session->setFlashdata(
            'pesan',
            '<div class = "alert alert-success alert-dismissible">
            <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
            <h5><i class = "icon fas fa-check"></i>Sukses,
            Hapus Jadwal Pertandingan.</h5>
            </div>'
        );
        return redirect()->route('inputpertandingan');
    }
}
