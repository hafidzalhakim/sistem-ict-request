<?php

namespace App\Models;
use CodeIgniter\Model;

class AssignmentModel extends Model
{
    protected $table = 'assignment';
    protected $primaryKey = 'id_assign';
    protected $returnType = 'object';
    protected $allowedField =  ['date_assign', 'status_request', 'status_pengerjaan', 'id_pengguna', 'id_request', 'assigned', 'date_assign', 'date_complete','solusi'];

    public function tampilDataAssign($id_request) {
        $builder = $this->db->table('assignment');
        $builder->select('*, assig.nama_pengguna as assigned');
        $builder->join('pengguna', 'pengguna.id_pengguna = assignment.id_pengguna');
        $builder->join('pengguna as assig', 'assignment.assigned = assig.id_pengguna', 'left');
        $builder->join('request', 'request.id_request = assignment.id_request');
        $builder->join('jenis_permintaan', 'jenis_permintaan.id_jpermintaan = request.id_jpermintaan');
        $builder->join('barang', 'barang.id_barang = request.id_barang');
        $builder->join('divisi', 'divisi.id_divisi = pengguna.id_divisi');
        $builder->where('request.id_request', $id_request);
        $query = $builder->get();
        return $query->getResult();
    }
    public function tampilDataAssignRinci($divisi) {
        return $this->db->table('request')
                        ->select('*')
                        ->join('pengguna', 'pengguna.id_pengguna = request.id_pengguna')
                        ->join('assignment', 'request.id_request = assignment.id_request')
                        ->join('jenis_permintaan', 'jenis_permintaan.id_jpermintaan = request.id_jpermintaan')
                        ->join('barang', 'barang.id_barang = request.id_barang')
                        ->join('divisi', 'divisi.id_divisi = pengguna.id_divisi')
                        ->where('divisi.divisi', $divisi)
                        ->whereIn('assignment.id_assign', function($builder) {
                            $builder->selectMax('id_assign')
                                    ->from('assignment')
                                    ->groupBy('id_request');
                        })
                        ->get()
                        ->getResult();// Mengembalikan satu baris sebagai objek  
    }

    public function tampilDataAssignPrint($id_request) {
        $data= $this->db->table('request')
                            ->select('*, 
                            assigned_user.nama_pengguna as assigned_user_name,
                            divisi.divisi')
                        ->join('pengguna', 'pengguna.id_pengguna = request.id_pengguna')
                        ->join('assignment', 'request.id_request = assignment.id_request')
                        ->join('pengguna as assigned_user', 'assigned_user.id_pengguna = assignment.assigned') // yang menerima tugas
                        ->join('jenis_permintaan', 'jenis_permintaan.id_jpermintaan = request.id_jpermintaan')
                        ->join('barang', 'barang.id_barang = request.id_barang')
                        ->join('divisi', 'divisi.id_divisi = pengguna.id_divisi')
                        ->where('request.id_request', $id_request)
                        ->whereIn('assignment.id_assign', function($builder) {
                            $builder->selectMax('id_assign')
                                    ->from('assignment')
                                    ->groupBy('id_request');
                        })
                        ->get()
                        ->getRow();// Mengembalikan satu baris sebagai objek  

                        
                        return $data;
    }

    public function tambahAssign($inputdataassign)
    {
        return $this->db->table('assignment')->insert($inputdataassign);
    }

    public function UbahAssign($id, $dataubah)
    {
        return $this->db->table('assignment')->where('id_assign', $id)->update($dataubah);
    }
    public function HapusAssign($id)
    {
        return $this->db->table('assignment')->where('id_assign',$id)->delete();
    }
    
}