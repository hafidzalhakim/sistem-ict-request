<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'request';
    protected $primaryKey = 'id_request'; // Perbaikan: Mengubah 'primarykey' menjadi 'primaryKey'
    protected $returnType = 'object';
    protected $allowedFields = ['id_pengguna','description', 'date_request', 'time', 'status', 'assigned', 'date_assigned', 'date_complete','nama_pengguna','divisi','date_approve','jpermintaan'];

    public function tampilDataTabel()
    {
        $approveTerbaru = $this->db->table("approve");
        $approveTerbaru->select('id_request');
        $approveTerbaru->selectMax("date_approve");
        $approveTerbaru->groupBy('id_request');
        $queryTerbaru = $approveTerbaru->get();
        
        $builder = $this->db->table('request');
        $builder->join('pengguna', 'pengguna.id_pengguna = request.id_pengguna');
        
        $builder->join('jenis_permintaan', 'jenis_permintaan.id_jpermintaan = request.id_jpermintaan');
        $builder->join('divisi', 'divisi.id_divisi = pengguna.id_divisi');
        $builder->where('request.akses', 'Perlu Approval');
        $query = $builder->get();

        $approveData = $queryTerbaru->getResult();
        $requestData = $query->getResult();
        
        $dataCampur = [];

        foreach ($requestData as $index => $dataRequest) {
            $data = array_filter($approveData, fn ($approve) => $approve->id_request === $dataRequest->id_request) ?? null;
            $data = reset($data);
            $dataRequest->latest_approved = $data->date_approve ?? null;
            $dataCampur[] = $dataRequest;
        }
        
        return $dataCampur;
    }
    public function tampilDataTabel2()
    {
        $builder = $this->db->table('request');
        $builder->join('pengguna', 'pengguna.id_pengguna = request.id_pengguna');
        $builder->join('jenis_permintaan', 'jenis_permintaan.id_jpermintaan = request.id_jpermintaan');
        $builder->join('divisi', 'divisi.id_divisi = pengguna.id_divisi');
        $query = $builder->get();
        return $query->getResult();
    }
    public function tampilDataTabel3()
    {
        $builder = $this->db->table('request');
        $builder->join('pengguna', 'pengguna.id_pengguna = request.id_pengguna');
        $builder->join('jenis_permintaan', 'jenis_permintaan.id_jpermintaan = request.id_jpermintaan');
        $builder->join('divisi', 'divisi.id_divisi = pengguna.id_divisi');
        $query = $builder->get();
        return $query->getResult();
    }
}
