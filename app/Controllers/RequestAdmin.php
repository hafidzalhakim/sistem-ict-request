<?php

namespace App\Controllers;
use App\Models\RequestModel;
use App\Models\JenisPermintaandanBarangModel;
use App\Models\AssignmentModel;
use App\Controllers\Admin1;

class RequestAdmin extends BaseController
{
    protected $permintaan;
    protected $jp;
    protected $aas;
    public function __construct()
    {
        $this->permintaan = new RequestModel();
        $this->jp = new JenisPermintaandanBarangModel();
        $this->aas = new AssignmentModel();
    }
    public function reques()
    {
        // Periksa status login dan role pengguna
        $session = session();
        $divisi = $session->get('divisi'); // Sesuaikan dengan kunci sesi yang Anda gunakan
        
        $rdatar = $this->permintaan->tampilData($divisi);
        $id_request = !empty($rdatar) ? $rdatar[0]->id_request : null;
        $rcdata = $this->permintaan->tampilData2($id_request);
        
            $rrdataa = $this->aas->tampilDataAssignRinci($divisi);
        // $datara = array_merge($rdatar,$rrdataa);
    
        $data = [
            'rdata' => $rcdata,
            'rdatrr' => $rdatar,
            'ascrr' => $rrdataa
        ];
    
        return view('divisiict/requestadmin', $data);
    }

    public function tambahreques()
    {
        $data = [
            'jenispermintaan' => $this->jp->AllJp(),
            'barang' => $this->jp->AllBrg()
        ];
        return view('divisiict/tambahrequestadmin',$data);
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
        return redirect()->to(base_url('ict-request-admin'));
    }    


    public function reques2($id_request = null  )
    {
        // Periksa status login dan role pengguna
        $session = session();
        // Ambil ID pengguna dari sesi
        $divisi = $session->get('divisi'); // Sesuaikan dengan kunci sesi yang Anda gunakan
        
        // Ambil data request yang dibuat oleh pengguna yang sedang login
        $rdatar = $this->permintaan->tampilData($divisi);
        $rrdataa = $this->aas->tampilDataAssign($id_request);

        $data =[
            'rdatrr' => $rdatar,
            'ascrr' => $rrdataa
        ];

        
        return view('icttech/requestadmintech', $data);
    }

    public function tambahreques2()
    {
        $data = [
            'jenispermintaan' => $this->jp->AllJp(),
            'barang' => $this->jp->AllBrg()
        ];
        return view('icttech/tambahrequestadmintech',$data);
    }
    public function tambahrequ2($id_pengguna = null)
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
        return redirect()->to(base_url('ict-request-admin-tech'));
    }

    public function getRequestData()
    {
        $id_request = $this->request->getGet('id_request');
        $id_assign = $this->request->getGet('id_assign');

        $request = $this->permintaan->find($id_request);
        $assignment = $this->aas->find($id_assign);

        if ($request && $assignment) {
            return $this->response->setJSON([
                'request' => $request,
                'assignment' => $assignment
            ]);
        } else {
            return $this->response->setJSON(['error' => 'Data not found']);
        }
    }
}
