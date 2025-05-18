<?php 

namespace App\Controllers;

use App\Models\ManagerModel;

class DivisiIct extends BaseController
{
    protected $reque; // Variabel untuk menyimpan objek model

    public function __construct()
    {
        // Inisialisasi objek model ManagerModel di dalam konstruktur
        $this->reque = new ManagerModel();
    }

    public function tampildata2()
    {
        // Periksa status login dan role pengguna
        $session = session();
        if(!$session->get('isLogin') || $session->get('role') !== 'divisiict') {
            // Jika pengguna tidak login atau bukan manager, redirect ke halaman login
            return redirect()->to('login');
        }

        // Panggil metode getAllDataTable dari objek model ManagerModel
        $datarr['rdataa'] = $this->reque->tampilDataTabel2();

        // Kirim data ke view
        return view ('divisiict/index2', $datarr);
    }
}