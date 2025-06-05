<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTiket extends Model {
    protected $DBGGroup         = 'default';
    protected $table            = 'tiket';
    protected $primaryKey       = 'id_tiket';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_tiket', 'id_pertandingan', 'tribun', 'harga', 'jumlah_tersedian'  
    ];

    protected bool $allowEmptyInserts = false;

    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField = 'created_at';
    // protected $updatedField = 'update_at';
    // protected $deletedField = 'deleted_at';

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

    public function getTiketPertandingan()
    {
        return $this->db->table('pertandingan')
            ->join("tiket", "pertandingan.id_pertandingan = tiket.id_pertandingan")
            ->get()->getResultArray();
    }
}