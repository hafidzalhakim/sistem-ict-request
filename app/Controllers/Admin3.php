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

    $allRequests = $this->reques->tampilDataTabel3();

        // Hitung total request
        $totalRequest = count($allRequests);

        // Hitung yang selesai
        $totalSelesai = count(array_filter($allRequests, fn($r) => $r->status_reques === 'Done'));
        $totalBelumSelesai = count(array_filter($allRequests, fn($r) => $r->status_reques === 'On progress'));

        // Hitung total barang unik
        $barangUnik = array_unique(array_map(fn($r) => $r->id_barang ?? null, $allRequests));
        $db = \Config\Database::connect();
        $totalBarang = $db->table('barang')->countAll();

        return view('icttech/index3', [
            'dataar'            => $allRequests,
            'totalRequest'      => $totalRequest,
            'totalSelesai'      => $totalSelesai,
            'totalBelumSelesai' => $totalBelumSelesai,
            'totalBarang'       => $totalBarang,
        ]);
}

}
