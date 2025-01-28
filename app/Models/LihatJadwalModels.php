<?php

namespace App\Models;

use CodeIgniter\Model;

class LihatJadwalModels extends Model
{
    protected $table            = 'jadwal_ibadah';

    public function get_or_insert_tim($tim_ibadah)
    {
        // Mencari tim berdasarkan nama
        $builder = $this->db->table('tim_ibadah');
        $builder->where('nama_tim', $tim_ibadah);
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            // Jika tim ditemukan, kembalikan id_tim
            return $query->getRow()->id_tim;
        } else {
            // Jika tim tidak ditemukan, tambahkan tim baru
            $data = array('nama_tim' => $tim_ibadah);
            $builder->insert($data);
            // Kembalikan id_tim yang baru dibuat
            return $this->db->insertID();
        }
    }

    public function get_or_insert_ibadah($nama_ibadah)
    {
        // Mencari tim berdasarkan nama
        $builder = $this->db->table('jadwal_ibadah');
        $builder->where('nama_ibadah', $nama_ibadah);
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            // Jika tim ditemukan, kembalikan id_tim
            return $query->getRow()->id_ibadah;
        } else {
            // Jika tim tidak ditemukan, tambahkan tim baru
            $data = array('nama_tim' => $nama_ibadah);
            $builder->insert($data);
            // Kembalikan id_tim yang baru dibuat
            return $this->db->insertID();
        }
    }


    public function getGroupedJadwalKU()
    {
        $query = $this->db->table('petugas_ibadah')
            ->select('petugas_ibadah.tgl_ibadah, petugas_ibadah.waktu_ibadah, jadwal_ibadah.nama_ibadah, tim_ibadah.nama_tim, anggota_ibadah.nama_anggota')
            ->join('jadwal_ibadah', 'petugas_ibadah.id_ibadah = jadwal_ibadah.id_ibadah')
            ->join('tim_ibadah', 'petugas_ibadah.id_tim = tim_ibadah.id_tim')
            ->join('listtim_ibadah', 'listtim_ibadah.id_tim = tim_ibadah.id_tim')
            ->join('anggota_ibadah', 'listtim_ibadah.id_anggota = anggota_ibadah.id_anggota')
            ->where("listtim_ibadah.id_role = 'C-01'")
            ->where("petugas_ibadah.id_ibadah = 'KU001'")
            ->orderBy('petugas_ibadah.tgl_ibadah', 'ASC');

        return $query->get()->getResultArray();
    }

    public function getGroupedJadwalSM()
    {
        $query = $this->db->table('petugas_ibadah')
            ->select('petugas_ibadah.tgl_ibadah, petugas_ibadah.waktu_ibadah, jadwal_ibadah.nama_ibadah, tim_ibadah.nama_tim, anggota_ibadah.nama_anggota')
            ->join('jadwal_ibadah', 'petugas_ibadah.id_ibadah = jadwal_ibadah.id_ibadah')
            ->join('tim_ibadah', 'petugas_ibadah.id_tim = tim_ibadah.id_tim')
            ->join('listtim_ibadah', 'listtim_ibadah.id_tim = tim_ibadah.id_tim')
            ->join('anggota_ibadah', 'listtim_ibadah.id_anggota = anggota_ibadah.id_anggota')
            ->where("listtim_ibadah.id_role = 'C-01'")
            ->where("petugas_ibadah.id_ibadah = 'KU002'")
            ->orderBy('petugas_ibadah.tgl_ibadah', 'ASC');

        return $query->get()->getResultArray();
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
