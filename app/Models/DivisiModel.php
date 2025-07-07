<?php

namespace App\Models;
use CodeIgniter\Model;

class DivisiModel extends Model
{
    public function AllDivisi()
    {
        $builder = $this->db->table('divisi');
        $query = $builder->get();
        return $query->getResultArray();
    }
}