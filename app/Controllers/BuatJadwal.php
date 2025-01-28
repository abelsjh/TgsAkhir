<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalIbadahModels;
use App\Models\JadwalModel;
use App\Models\LihatJadwalModels;
use App\Models\TimIbadahModels;
use CodeIgniter\HTTP\ResponseInterface;

class BuatJadwal extends BaseController
{
    protected $jadwalModel;

    public function __construct()
    {
        $this->jadwalModel = new LihatJadwalModels();
    }

    public function index()
    {
        return view('/buatjadwal/v_buatjadwal');
    }

    public function formJadwal() {
        
        return view('/buatjadwal/v_formjadwal');
        
    }

    public function tambah() {
        // Memuat model
        $this->jadwalModel = new LihatJadwalModels();

        // Data dari formulir
        $tanggal = $this->request->getPost('tanggal');
        $waktu = $this->request->getPost('waktu');
        $nama_ibadah = $this->request->getPost('nama_ibadah');
        $tim_ibadah = $this->request->getPost('tim_ibadah');

        // Mendapatkan atau menambahkan tim dan mendapatkan id_tim
        $id_tim = $this->jadwalModel->get_or_insert_tim($tim_ibadah);

        // Mendapatkan atau menambahkan tim dan mendapatkan id_tim
        $id_ibadah = $this->jadwalModel->get_or_insert_ibadah($nama_ibadah);

        // Menyiapkan data untuk disimpan ke tabel petugas_ibadah
        $data_jadwal = array(
            'id_petugas' => uniqid(),
            'tgl_ibadah' => $tanggal,
            'waktu_ibadah' => $waktu,
            'id_ibadah' => $id_ibadah,
            'id_tim' => $id_tim
        );

        // Menyimpan data ke tabel pertandingan
        $db = \Config\Database::connect();
        $db->table('petugas_ibadah')->insert($data_jadwal);

        return redirect()->to('/lihat-jadwal');
        // Redirect atau menampilkan pesan sukses
        // redirect('/sukses');
    }

    


    //     public function saveJadwal() {
    //       // Muat model
    //       $this->load->model('Customer_model');
      
    //       // Ambil data dari formulir
    //       $petugasData = [
    //         'customerName' => $this->input->post('customerName'),
    //         'phone' => $this->input->post('phone')
    //       ];
      
    //       $Data = [
    //         'address' => $this->input->post('address'),
    //         'city' => $this->input->post('city'),
    //         'zipcode' => $this->input->post('zipcode')
    //       ];
      
    //       // Simpan data menggunakan model
    //       $this->Customer_model->saveCustomerAndAddress($customerData, $addressData);
      
    //       // Redirect atau tampilkan pesan sukses
    //       redirect('customer/success');
    //     }
    //   }
      


    // public function simpan()
    // {
    //     $tanggal = $this->request->getPost('tanggal');
    //     $waktu = $this->request->getPost('waktu');
    //     $nama = $this->request->getPost('nama');
    //     $tim = $this->request->getPost('tim');

    //     $jadwalModel = new JadwalIbadahModels();
    //     $jadwal = $jadwalModel->where('nama_ibadah', $nama)->first();
    //     if (!$jadwal) {
    //         return redirect()->back()->with('error', 'Nama ibadah tidak ditemukan.');
    //     }
    //     $id_ibadah = $jadwal['id_ibadah'];

    //     $timModel = new TimIbadahModels();
    //     $timData = $timModel->where('nama_tim', $tim)->first();
    //     if (!$timData) {
    //         return redirect()->back()->with('error', 'Nama tim tidak ditemukan.');
    //     }
    //     $id_tim = $timData['id_tim'];

    //     $petugasModel = new LihatJadwal();
    //     $data = [
    //         'tanggal' => $tanggal,
    //         'waktu' => $waktu,
    //         'id_ibadah' => $id_ibadah,
    //         'id_tim' => $id_tim,
    //     ];
    //     $petugasModel->insert($data);

    //     return redirect()->back()->with('success', 'Data petugas ibadah berhasil disimpan.');
    // }

    // public function saveJadwal()
    // {
    //     $data = [

    //         'tanggal' => $this->request->getPost('tanggal'),
    //         'waktu' => $this->request->getPost('waktu'),
    //         'nama_ibadah' => $this->request->getPost('nama_ibadah'),
    //         'tim' => $this->request->getPost('tim'),
    //     ];

    //     $this->jadwalModel->insert($data);

    //     return redirect()->to('/lihat-jadwal');
    // }
}
