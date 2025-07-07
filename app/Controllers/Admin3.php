<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin3 extends BaseController
{
    protected $reques; // Variabel untuk menyimpan objek model

    public function __construct()
    {
        // Inisialisasi objek model AdminModel di dalam konstruktor
        $this->reques = new AdminModel();
    }
    
    public function tampildata3()
    {
   // Periksa status login dan role pengguna
   $session = session();
   if (!$session->get('isLogin') || $session->get('role') !== 'icttech') {
       // Jika pengguna tidak login atau bukan admin, redirect ke halaman login
       return redirect()->to('login');
    }

    // Panggil metode getAllDataTable dari objek model AdminModel
    $atarr['dataar'] = $this->reques->tampilDataTabel3();
    
    // Kirim data ke view
    return view('icttech/index3', $atarr);
}

}
