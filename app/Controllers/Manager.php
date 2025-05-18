<?php

namespace App\Controllers;

use App\Models\ManagerModel;

class Manager extends BaseController
{
    protected $requ; // Variabel untuk menyimpan objek model

    public function __construct()
    {
        // Inisialisasi objek model ManagerModel di dalam konstruktor
        $this->requ = new ManagerModel();
    }

    public function tampildata()
    {
        // Periksa status login dan role pengguna
        $session = session();        
        
        if (!$session->get('isLogin') || $session->get('role') !== 'manager') {
            // Jika pengguna tidak login atau bukan Manager, redirect ke halaman login
            return redirect()->to('login');
        }

        // Panggil metode getAllDataTable dari objek model ManagerModel
        $datar['rdata'] = $this->requ->tampilDataTabel();

        // Kirim data ke view
        return view('manager/index', $datar);
    }
}
