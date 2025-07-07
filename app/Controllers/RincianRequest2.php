<?php

namespace App\Controllers;

use App\Models\RincianRequestModel;
use App\Models\AssignmentModel;
use App\Models\JenisPermintaandanBarangModel;
use App\Models\UserModel;

class RincianRequest2 extends BaseController
{
    protected $rinre;
    protected $assi;
    protected $jp;
    protected $ur;

    public function __construct()
    {
        // Inisialisasi objek model RincianRequestModel di dalam konstruktor
        $this->rinre = new RincianRequestModel();
        $this->assi = new AssignmentModel();
        $this->jp = new JenisPermintaandanBarangModel();
        $this->ur = new UserModel();
    }

    public function requassign($id_request = null)
    {
        $rincianr = $this->rinre->getrequestByUserId($id_request);
        $rrincianr = $this->assi->tampilDataAssign($id_request);
        $rincianrequ = $this->rinre->getrequest($id_request);
        $jpb = $this->jp->AllJp();
        $urict = $this->ur->AllUserICT();

        $data = [
            'rrinci'=> $rincianr,
            'rrincii'=> $rrincianr,
            'rriincii'=>$rincianrequ,
            'jenispermintaan' => $jpb,
            'userict'=>$urict
        ];

        return view('divisiict/rincianrequest2', $data);

    }

    public function ubahreques()
    {
        $id_request = $this->request->getPost("id_request"); 
        $data = [
            
            'id_request' => $id_request,
            'status_reques' => $this->request->getPost("status_reques"),
            'status_approve' => $this->request->getPost("status_approve"),
            'solution' => $this->request->getPost("solution"),
            'date_approved' => $this->request->getPost("date_approved"),
            'akses' => $this->request->getPost('akses')
        ];

        $this->rinre->processUpdateRequest($id_request,$data);
        $akses = $this->request->getPost("akses");
        $url ='http://localhost/ictrequest/public/index.php/login';
        if ($akses == 'Perlu Approval') {
            $tujuanemail = ['hafidz.alhakim.16@gmail.com'];
            $subject = "ICT Request Baru";
            $pesan = "Silakan Klik Link Pada Dibawah <br> <a class='btn btn-link ' style='background-color: #000;color:white; padding: 5px 20px; border-radius: 5px;' href='" . $url . "'>Klik Disini</a>";
            if (!$this->kirimemail($tujuanemail, $subject, $pesan)) {
                session()->setFlashdata('error', 'Email gagal dikirim');
                return redirect()->to(base_url('rincian-request-ict/'.$id_request));
            }
        }
        return redirect()->to(base_url('rincian-request-ict/'.$id_request));

    }
    
    private function kirimemail($tujuanemail, $subject, $pesan)
    {
        $email = \Config\Services::email();
        
        $email->setTo($tujuanemail);
        $asalpengirim = "northillusef@gmail.com";
        $email->setFrom($asalpengirim);
        
        $email->setSubject($subject);
        
        $email->setMessage($pesan);

        $email->send();
    }

    public function simpanassigned()
    {
        
        $id_pengguna = session()->get('id'); 
        $id_request = $this->request->getPost("id_request");  
        $datatambah = [
            'id_pengguna' => $id_pengguna,
            'id_request' => $id_request,
            'assigned' => $this->request->getPost("assigned"),
            'date_assign' => $this->request->getPost("date_assign")
        ];

        $this->assi->tambahAssign($datatambah);
        return redirect()->to(base_url('rincian-request-ict/'.$id_request));
    
    }

    public function ubahAssigned($id_assign)
    {
        $id_request = $this->request->getPost("id_request");  
        $data = [
            'id_request' => $id_request,
            'assigned' => $this->request->getPost("assignededit"),
            'status_pengerjaan' =>$this->request->getPost("status_pengerjaanedit"),
            'status_request' =>$this->request->getPost("status_requestedit"),
            'date_complete' =>$this->request->getPost("date_completeedit"),
            'solusi' =>$this->request->getPost("solusiedit"),
            'date_assign' => $this->request->getPost("date_assignedit")
        ];

        $this->assi->UbahAssign($id_assign,$data);
        return redirect()->to(base_url('rincian-request-ict/'.$id_request));
    }

    public function hapusAssigned($id_assign,$id_request)
    {
        $this->assi->HapusAssign($id_assign);
        return redirect()->to(base_url('rincian-request-ict/'.$id_request));
    }
    
}