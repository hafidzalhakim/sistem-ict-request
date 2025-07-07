<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin2 extends BaseController
{
    protected $reque; // Variabel untuk menyimpan objek model

    public function __construct()
    {
        // Inisialisasi objek model AdminModel di dalam konstruktor
        $this->reque = new AdminModel();
    }
    
    public function tampildata2()
    {
   // Periksa status login dan role pengguna
   $session = session();
   if (!$session->get('isLogin') || $session->get('role') !== 'divisiict') {
       // Jika pengguna tidak login atau bukan admin, redirect ke halaman login
       return redirect()->to('login');
    }

    // Panggil metode getAllDataTable dari objek model AdminModel
    $datarr['rdataa'] = $this->reque->tampilDataTabel2();
    
    // Kirim data ke view
    return view('divisiict/index2', $datarr);
}

}
