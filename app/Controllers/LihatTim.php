<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LihatTimModels;

class LihatTim extends BaseController
{
    public function index()
{
    $model = new LihatTimModels();
    $data['grouped_tim'] = $model->getGroupedTimData();
    return view('v_lihattim', $data);
}
}
