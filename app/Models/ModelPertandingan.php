<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPertandingan extends Model
{
    protected $DBGGroup         = 'default';
    protected $table            = 'pertandingan';
    protected $primaryKey       = 'id_pertandingan';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pertandingan', 'id_jenis_pertandingan', 'tim_tuan_rumah', 'tim_tamu', 'tanggal', 'stadion'
    ];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'update_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getTiketPertandingan($id)
    {
        return $this->db->table('pertandingan')
            ->join("tiket", "pertandingan.id_pertandingan = tiket.id_pertandingan")
            ->where("pertandingan.id_pertandingan = $id")
            ->get()->getResultArray();
    }

    // public function getIdPertandingan($id)
    // {
    //     return $this->db->table('pertandingan')
    //         ->join("pembelian", "pertandingan.id_pertandingan = pembelian.id_pertandingan")
    //         ->where("pertandingan.id_pertandingan = $id")
    //         ->get()->getResultArray();
    // }

    public function getJenisPertandingan()
    {
        return $this->db->table('pertandingan')
            ->join("jenis_pertandingan", "pertandingan.id_jenis_pertandingan = jenis_pertandingan.id_jenis_pertandingan")
            ->get()->getResultArray();
    }

    public function getPertandinganByJenis($id){
        return $this->db->table('pertandingan')
            ->join("jenis_pertandingan", "pertandingan.id_jenis_pertandingan = jenis_pertandingan.id_jenis_pertandingan")
            ->where("pertandingan.id_jenis_pertandingan = $id")
            ->get()->getResultArray();
    }
}
