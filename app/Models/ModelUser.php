<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model {
    protected $DBGGroup         = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'username';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username','password','nama','status'   
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'tgl_update';
    protected $deletedField  = 'deleted_at';
}