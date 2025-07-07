<?php

namespace App\Controllers;

use App\Models\RincianRequestModel;
use App\Models\AssignmentModel;
use App\Models\JenisPermintaandanBarangModel;
use App\Models\UserModel;

class RincianRequest3 extends BaseController
{
    protected $rinr; 
    protected $asi;
    protected $jp;
    protected $ur; 

    public function __construct()
    {
        
        $this->rinr = new RincianRequestModel();
        $this->asi = new AssignmentModel();
        $this->jp = new JenisPermintaandanBarangModel();
        $this->ur = new UserModel();
    }
    
    public function rincianrequest($id_request = null)
    {

        $rincianr = $this->rinr->getrequestByUserId($id_request);
        $rrincianr = $this->asi->tampilDataAssign($id_request);
        $rincianrequ = $this->rinr->getrequest($id_request);
        $jpb = $this->jp->AllJp();
        $urict = $this->ur->AllUserICT();
        $data = [
            'rrinc'=> $rincianr,
            'rrinci'=> $rrincianr,
            'rriinc'=>$rincianrequ,
            'jenispermintaan' => $jpb,
            'userict'=>$urict
        ];

    return view('icttech/rincianrequest3', $data);
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

        $this->rinr->processUpdateRequest($id_request,$data);

        $akses = $this->request->getPost("akses");
        $url ='http://localhost/ictrequest/public/index.php/login';
        if ($akses == 'Perlu Approval') {
            $tujuanemail = ['hafidz.alhakim.16@gmail.com'];
            $subject = "ICT Request Baru";
            $pesan = "Silakan Klik Link Pada Dibawah <br> <a class='btn btn-link ' style='background-color: #000;color:white; padding: 5px 20px; border-radius: 5px;' href='" . $url . "'>Klik Disini</a>";
            if (!$this->kirimemail2($tujuanemail, $subject, $pesan)) {
                session()->setFlashdata('error', 'Email gagal dikirim');
                return redirect()->to(base_url('rincian-request-ict-tech/'.$id_request));
            }
        }
        return redirect()->to(base_url('rincian-request-ict-tech/'.$id_request));

    }

    private function kirimemail2($tujuanemail, $subject, $pesan)
    {
        $email = \Config\Services::email();
        
        $email->setTo($tujuanemail);
        $asalpengirim = "northillusef@gmail.com";
        $email->setFrom($asalpengirim);
        
        $email->setSubject($subject);
        
        $email->setMessage($pesan);

        $email->send();
    }

    public function simpanwork()
    {
        
        $id_pengguna = session()->get('id'); 
        $id_request = $this->request->getPost("id_request");  
        $datatambah = [
            'id_pengguna' => $id_pengguna,
            'id_request' => $id_request,
            'assigned' => $this->request->getPost("assignedtech"),
            'date_assign' => $this->request->getPost("date_assigntech")
        ];

        $this->asi->tambahAssign($datatambah);
        return redirect()->to(base_url('rincian-request-ict-tech/'.$id_request));
    }

    public function ubahAssign($id_assign)
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

        $this->asi->UbahAssign($id_assign,$data);
        return redirect()->to(base_url('rincian-request-ict-tech/'.$id_request));
    }
    public function hapusAssign($id_assign,$id_request)
    {
        $this->asi->HapusAssign($id_assign);
        return redirect()->to(base_url('rincian-request-ict/'.$id_request));
    }
}