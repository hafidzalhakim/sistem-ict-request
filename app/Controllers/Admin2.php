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

    // Halaman utama divisiict (jika user klik logo kiri atas)
    public function index()
    {
        return redirect()->to('divisiict'); // arahkan ke tampildata2()
    }

    public function tampildata2()
    {
        $session = session();
        if (!$session->get('isLogin') || $session->get('role') !== 'divisiict') {
            return redirect()->to('login');
        }

        $allRequests = $this->reque->tampilDataTabel2();

        // Hitung total request
        $totalRequest = count($allRequests);

        // Hitung yang selesai
        $totalSelesai = count(array_filter($allRequests, fn($r) => $r->status_reques === 'Done'));

        // Hitung total barang unik
        $barangUnik = array_unique(array_map(fn($r) => $r->id_barang ?? null, $allRequests));
        $db = \Config\Database::connect();
        $totalBarang = $db->table('barang')->countAll();

        return view('divisiict/index2', [
            'rdataa'        => $allRequests,
            'totalRequest'  => $totalRequest,
            'totalSelesai'  => $totalSelesai,
            'totalBarang'   => $totalBarang,
        ]);
    }
}
