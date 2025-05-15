<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'pengguna';
    protected $primarykey = 'id_pengguna';
    protected $allowedFields = ['nama_pengguna', 'divisi','username','password','role'];

      //cek users password
      public function validateUser($username, $password)
      {
          $builder = $this->db->table('pengguna');
          $builder ->join('divisi', 'divisi.id_divisi = pengguna.id_divisi');
          $builder ->where('username', $username);
          $builder ->where('password', $password);
          $query = $builder->get()->getRow();
          return $query;
      }

      // function ceek apakah username sudah ad a
     public function isUsernameExist($username)
     {
         $query =  $this->db->table('pengguna')->where('username', $username)->get()->getRow();
 
         // jika ada username 
         if (!empty($query)) {
             return true;
         }
 
         // jika tidak ada
         return false;
     }

     // mendapatkan user by id 
    public function getPenggunaById($id_pengguna)
    {
        return $this->db->table('pengguna')->where('id_pengguna', $id_pengguna)->get()->getRow();
    }
}