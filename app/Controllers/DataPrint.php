<?php

namespace App\Controllers;

use App\Models\RincianRequestModel;
use App\Models\AssignmentModel;
use \Dompdf\Dompdf;

class DataPrint extends BaseController
{
    protected $rinre;
    protected $assi; // Variabel untuk menyimpan objek model

    public function __construct()
    {
        // Inisialisasi objek model RincianRequestModel di dalam konstruktor
        $this->rinre = new RincianRequestModel();
        $this->assi = new AssignmentModel();
    }

    public function requassign($id_request = null)
    {
        
        $rincianr = $this->rinre->getrequestByUserId($id_request);
        $rrincianr = $this->assi->tampilDataAssignPrint($id_request);
        $rincianrequ = $this->rinre->getrequest($id_request);
        $data = [
            'rrinci'=> $rincianr,
            'rrincip'=> $rrincianr,
            'rriinciip'=>$rincianrequ
        ];

        return view('divisiict/dataprint', $data);

    }
    public function requassigned($id_request = null)
    {
        
        $rincianr = $this->rinre->getrequestByUserId($id_request);
        $rrincianr = $this->assi->tampilDataAssignPrint($id_request);
        $rincianrequ = $this->rinre->getrequest($id_request);
        $data = [
            'rrinci'=> $rincianr,
            'rrincip'=> $rrincianr,
            'rriinciip'=>$rincianrequ
        ];

        return view('icttech/dataprint2', $data);

    }
    public function printrequassign($id_request = null)
    {
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $rincianr = $this->rinre->getrequestByUserId($id_request);
        $rrincianr = $this->assi->tampilDataAssignPrint($id_request);
        $rincianrequ = $this->rinre->getrequest($id_request);

        $data = [
            'rrinci'=> $rincianr,
            'rrincip'=> $rrincianr,
            'rriinciip'=>$rincianrequ
        ];

        $html = view('divisiict/print', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('ICT Request Report.pdf', array(
            "Attachment"=>false
        ));

        // return view('admin/print');


    }
    
    

    
    
}