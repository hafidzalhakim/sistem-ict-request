<?php

namespace App\Controllers;

use App\Models\RincianRequestModel;

class RincianRequest1 extends BaseController
{
    protected $rinreq; // Variabel untuk menyimpan objek model

    public function __construct()
    {
        // Inisialisasi objek model RincianRequestModel di dalam konstruktor
        $this->rinreq = new RincianRequestModel();
    }
    
    public function rincianrequest1($id_request = null)
    {

    // Panggil metode getAllDataTable dari objek model RincianRequestModel
    $rincianreq = $this->rinreq->getrequestByUserId($id_request);
    $rincianrequ = $this->rinreq->getrequest($id_request);

    $data = [
        'rrincir'=> $rincianreq,
        'rrinciir'=> $rincianrequ,
    ];
    
    // Kirim data ke view
    return view('manager/rincianrequest', $data);
    }

    public function simpanapprove()
    {
        $id_pengguna = session()->get('id');
        $id_request = $this->request->getPost("id_request"); 
        $data = [
            'id_pengguna' => $id_pengguna,
            'id_request' => $id_request,
            'date_approve' => $this->request->getPost("date_approve"),
            'status' => $this->request->getPost("status")
        ];

        $this->rinreq->tambahapprove($id_request,$data);
        return redirect()->to(base_url('rincian-request-approve/'.$id_request));
    }


}
