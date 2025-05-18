<?php

namespace App\Controllers;
use App\Models\KaryawanModel;
use App\Models\UserModel;
use App\Models\JenisPermintaandanBarangModel;
use App\Models\AssignmentModel;

class karyawan extends BaseController {
    protected $permintaan;
    protected $jp;
    protected $aas;

    public function __construct(){
        $this->permintaan = new KaryawanModel();
        $this->jp = new JenisPermintaandanBarangModel();
        $this->aas = new AssignmentModel();
    }

    public function reques() {
        // Periksa status login dan role pengguna
        $session = session();
        if (!$session->get('isLogin') || $session->get('role') !== 'karyawan') {
            // Jika pengguna tidak login atau bukan karyawan, redirect ke halaman login
            return redirect()->to('login');
        }

        // Ambil ID pengguna dari sesi
        $divisi = $session->get('divisi'); // Sesuaikan dengan kunci sesi yang anda gunakan

        // Ambil data request yang dibuat olehg pengguna yang sedang login
        $rdatar = $this->permintaan->tampilData($divisi);

        return view('karyawan/request', ['rdataarr'=>$rdatar]);
    }

    public function tambahreques() {
        $data = [
            'jenispermintaan' => $this->jp->AllJp(),
            'barang' => $this->jp->AllBrg()
        ];
        return view('karyawan/tambahrequest',$data);
    }
     public function tambahrequ($id_pengguna = null)
    {
        // Ambil ID pengguna dari sesi
        $id_pengguna = session()->get('id'); // Sesuaikan dengan kunci sesi yang Anda gunakan
        
        $data = [
            'id_pengguna' => $id_pengguna, // Set ID pengguna yang sedang login
            'date_request' => $this->request->getPost("date_request"),
            'time' => $this->request->getPost("time"),
            'id_jpermintaan' => $this->request->getPost("id_jpermintaan"),
            'id_barang' => $this->request->getPost('id_barang'),
            'description' => $this->request->getPost('description')
        ];

        $this->permintaan->tambahRequ($data);
        session()->setFlashdata('success', 'Request berhasil ditambahkan');
        return redirect()->to(base_url('karyawan'));
    }
}