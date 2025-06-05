<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJenisPertandingan extends Model
{
    protected $DBGGroup         = 'default';
    protected $table            = 'jenis_pertandingan';
    protected $primaryKey       = 'id_jenis_pertandingan';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_jenis_pertandingan', 'jenis_pertandingan'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'tgl_update';
    protected $deletedField  = 'deleted_at';

    public function getJenisPertandingan()
    {
        return $this->db->table('jenis_pertandingan')
            ->join("pertandingan", "jenis_pertandingan.id_jenis_pertandingan = pertandingan.id_jenis_pertandingan")
            ->get()->getResultArray();
    }
}
