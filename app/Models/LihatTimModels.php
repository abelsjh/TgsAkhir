<?php

namespace App\Models;

use CodeIgniter\Model;

class LihatTimModels extends Model
{
    protected $table            = 'listtim_ibadah';

    public function getGroupedTimData()
    {
        $query = $this->db->table($this->table)
            ->select('tim_ibadah.nama_tim, role_ibadah.nama_role, anggota_ibadah.nama_anggota')
            ->join('tim_ibadah', 'tim_ibadah.id_tim = listtim_ibadah.id_tim')
            ->join('role_ibadah', 'role_ibadah.id_role = listtim_ibadah.id_role')
            ->join('anggota_ibadah', 'anggota_ibadah.id_anggota = listtim_ibadah.id_anggota')
            ->orderBy('listtim_ibadah.id_role', 'ASC');
            
        
        $results = $query->get()->getResultArray();
        
        // Group data by id_tim
        $groupedData = [];
        foreach ($results as $row) {
            $groupedData[$row['nama_tim']][] = $row;
        }
        
        return $groupedData;
    }

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
