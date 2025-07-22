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
    $session = session();
    if (!$session->get('isLogin') || $session->get('role') !== 'divisiict') {
        return redirect()->to('login');
    }

    $allRequests = $this->reque->tampilDataTabel2();

    // Hitung total request
    $totalRequest = count($allRequests);

    // Hitung yang selesai
    $totalSelesai = count(array_filter($allRequests, fn($r) => $r->status_reques === 'done'));

    // Misal total barang = jumlah request unik berdasarkan barang
    $barangUnik = array_unique(array_map(fn($r) => $r->id_barang ?? null, $allRequests));
    $totalBarang = count(array_filter($barangUnik)); // filter null

    return view('divisiict/index2', [
        'rdataa'        => $allRequests,
        'totalRequest' => $totalRequest,
        'totalSelesai' => $totalSelesai,
        'totalBarang'  => $totalBarang,
    ]);
}


}
