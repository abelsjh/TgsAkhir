<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LihatJadwalModels;
use CodeIgniter\HTTP\ResponseInterface;

class LihatJadwal extends BaseController
{
    // public function index()
    // {
    //     //
    //     $model = new LihatJadwalModels();
    //     $data['jadwal'] = $model->findAll();
    //     return view('/lihatjadwal/v_lihatjadwal', $data);
    // }
    public function index()
    {
        $model = new LihatJadwalModels();
        $data['jadwal'] = $model->findAll();
        return view('/lihatjadwal/v_lihatjadwal', $data);
    }

    
    public function detailsJadwalKU()
    {
        $model = new LihatJadwalModels();
        $data['details'] = $model->getGroupedJadwalKU();
        return view('/lihatjadwal/v_detailsjadwal', $data);
    }

    public function detailsJadwalSM()
    {
        $model = new LihatJadwalModels();
        $data['details'] = $model->getGroupedJadwalSM();
        return view('/lihatjadwal/v_detailsjadwal2', $data);
    }
}
