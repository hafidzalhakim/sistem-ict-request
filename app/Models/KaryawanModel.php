<?php

namespace App\Models;
use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'request';
    protected $primaryKey = 'id_request';
    protected $returnType = 'object';
    protected $allowedField =  ['id_jpermintaan','jpermintaan','id_barang','kode_barang','date_approve','id_pengguna','description', 'date_request', 'time', 'status', 'job_status', 'assigned', 'date_assigned', 'date_complete','nama_pengguna','divisi','solusi'];

    public function tampilData($divisi) {
        $builder = $this->db->table('request');
        $builder->join('pengguna', 'pengguna.id_pengguna = request.id_pengguna');
        $builder->join('jenis_permintaan', 'jenis_permintaan.id_jpermintaan = request.id_jpermintaan');
        $builder->join('barang', 'barang.id_barang = request.id_barang');
        $builder->join('divisi', 'divisi.id_divisi = pengguna.id_divisi');
        $builder->where('divisi.divisi', $divisi);
        $query = $builder->get();
        return $query->getResult();
    }
    public function tampilData2($id_request) {
        $builder = $this->db->table('request');
        $builder->join('pengguna', 'pengguna.id_pengguna = request.id_pengguna');
        $builder->join('jenis_permintaan', 'jenis_permintaan.id_jpermintaan = request.id_jpermintaan');
        $builder->join('barang', 'barang.id_barang = request.id_barang');
        $builder->join('divisi', 'divisi.id_divisi = pengguna.id_divisi');
        $builder->where('request.id_request', $id_request);
        $query = $builder->get();
        return $query->getRow();
    }

    public function tambahRequ($inputdatarequ)
    {
        return $this->db->table('request')->insert($inputdatarequ);
    }
}