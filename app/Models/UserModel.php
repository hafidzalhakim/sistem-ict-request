<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'pengguna';
    protected $primarykey = 'id_pengguna';
    protected $allowedFields = ['id_pengguna','email','nama_pengguna', 'divisi','username','password','role'];

    public function getAllDataUser()
    {
        $builder = $this->db->table('pengguna');
        $builder ->join('divisi', 'divisi.id_divisi = pengguna.id_divisi');
        $query = $builder->get()->getResult();
        return $query;
    }

    public function getDataUserById($id_pengguna)
    {
        $builder = $this->db->table('pengguna');
        $builder ->join('divisi', 'divisi.id_divisi = pengguna.id_divisi');
        $builder ->where('pengguna.id_pengguna',$id_pengguna);
        $query = $builder->get()->getRow();
        return $query;
    }
    public function processUpdateUser($id_pengguna,$dataauser)
    {
        $this->db->table('pengguna')->where('id_pengguna', $id_pengguna)->update($dataauser);
    }
    public function tambahUser($inputdatuser)
    {
        return $this->db->table('pengguna')->insert($inputdatuser);
    }
    public function hapusr($id)
    {
        return $this->db->table('pengguna')->where('id_pengguna',$id)->delete();
    }

    public function AllUser()
    {
        $builder = $this->db->table('pengguna');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function AllUserICT()
    {
        $builder = $this->db->table('pengguna');
        $builder->where('pengguna.role','icttech');
        $query = $builder->get();
        return $query->getResultArray();
    }
}