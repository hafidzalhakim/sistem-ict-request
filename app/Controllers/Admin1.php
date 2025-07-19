<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin1 extends BaseController
{
    protected $requ; // Variabel untuk menyimpan objek model

    public function __construct()
    {
        // Inisialisasi objek model AdminModel di dalam konstruktor
        $this->requ = new AdminModel();
    }
    
    public function tampildata()
    {
    // Periksa status login dan role pengguna
    $session = session();
    if (!$session->get('isLogin') || $session->get('role') !== 'manager') {
        // Jika pengguna tidak login atau bukan admin, redirect ke halaman login
        return redirect()->to('login');
    }

    // Panggil metode getAllDataTable dari objek model AdminModel
    $datar['rdata'] = $this->requ->tampilDataTabel();
    
    // Kirim data ke view
    return view('manager/index', $datar);
    }

    public function kirimemail()
    {
        $email = \Config\Services::email();

        $tujuanemail = ['hafidz.alhakim.16@gmail.com'];
        $email->setTo($tujuanemail);
        $asalpengirim = "hafidz21si@mahasiswa.pcr.ac.id";
        $email->setFrom($asalpengirim);
        $subject = "Test Masuk";
        $email->setSubject($subject);
        $pesan = "Hola Amigos";
        $email->setMessage($pesan);

        if($email->send()){
            echo "<h1>Berhasil Dude</h1>";
        }else{
            echo "<h1>Sorry Fellas</h1>";
        }
        
    }

}
