<?php

namespace App\Models;
use CodeIgniter\Model;

class RincianRequestModel extends Model
{
    protected $table = 'request';
    protected $primaryKey = 'id_request';
    protected $returnType = 'object';
    protected $allowedField =  ['id_jpermintaan','jpermintaan','id_barang','kode_barang','date_approve','id_pengguna','description', 'date_request', 'time', 'status', 'status_pengerjaan', 'assigned', 'date_assigned', 'date_complete','nama_pengguna','divisi','solusi'];
    
    public function getrequestByUserId($id_request)
    {
        $builder = $this->db->table('request');
        $builder->join('pengguna', 'pengguna.id_pengguna = request.id_pengguna');
        $builder->join('jenis_permintaan', 'jenis_permintaan.id_jpermintaan = request.id_jpermintaan');
        $builder->join('barang', 'barang.id_barang = request.id_barang');
        $builder->join('divisi', 'divisi.id_divisi = pengguna.id_divisi');
        $builder->where('request.id_request', $id_request);
        $query = $builder->get();
        return $query->getRow();
    }

    public function getrequest($id_request)
    {
        return $this->db->table('approve')
        ->select('*')
        ->join('pengguna', 'approve.id_pengguna = pengguna.id_pengguna')
        ->join('request', 'request.id_request = approve.id_request')
        ->join('jenis_permintaan', 'jenis_permintaan.id_jpermintaan = request.id_jpermintaan')
        ->join('barang', 'barang.id_barang = request.id_barang')
        ->join('divisi', 'divisi.id_divisi = pengguna.id_divisi')
        ->where('request.id_request', $id_request)
        ->whereIn('approve.id_approve', function($builder) {
            $builder->selectMax('id_approve')
                    ->from('approve')
                    ->groupBy('id_request');
        })
        ->get()
        ->getRow();
    }

    public function processUpdateRequest($id, $dataapprove)
    {
        $this->db->table('request')->where('id_request', $id)->update($dataapprove);
    }

    public function tambahapprove($id, $dataapproved)
    {
        $this->db->table('approve')->where('id_request', $id)->insert($dataapproved);
    }
}