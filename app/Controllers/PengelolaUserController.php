<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\DivisiModel;

class PengelolaUserController extends BaseController
{
    protected $ser;
    protected $dvs;
    public function __construct()
    {
        $this->ser = new UserModel();
        $this->dvs = new DivisiModel();
    }


    public function tampil()
    {
        // Periksa status login dan role pengguna
   $session = session();
   if (!$session->get('isLogin') || $session->get('role') !== 'divisiict') {
       // Jika pengguna tidak login atau bukan divisiict, redirect ke halaman login
       return redirect()->to('login');
    }
        $datauser = $this->ser->getAllDataUser();
        return view('divisiict/pengelolauser',['datuse'=>$datauser]);
    }
    public function tampil2()
    {
        // Periksa status login dan role pengguna
   $session = session();
   if (!$session->get('isLogin') || $session->get('role') !== 'icttech') {
       // Jika pengguna tidak login atau bukan icttech, redirect ke halaman login
       return redirect()->to('login');
    }
        $datause = $this->ser->getAllDataUser();
        return view('icttech/pengelolauser2',['datus'=>$datause]);
    }

    public function tampilrincian($id_pengguna)
    {
        $data = [
            'divisi' => $this->dvs->AllDivisi(),
            'userdat'=> $this->ser->getDataUserById($id_pengguna)
        ];
        return view('divisiict/rincianuser',$data);
    }
    public function updateDataUser($id_pengguna)
    {
        $data = [
            'email' => $this->request->getPost("email"),
            'nama_pengguna' => $this->request->getPost("nama_pengguna"),
            'id_divisi' => $this->request->getPost("id_divisi"),
            'username' => $this->request->getPost("username"),
            'password' => $this->request->getPost("password"),
            'role' => $this->request->getPost('role')
        ];
        $this->ser->processUpdateUser($id_pengguna,$data);
        return redirect()->to(base_url('pengelola-user'));
    }
    public function tampilTambahUser()
    {
        $data = [
            'divisi' => $this->dvs->AllDivisi()
        ];
        return view('divisiict/tambahuser', $data);
    }
    public function tambahpengguna()
    {
        $data = [
            'email' => $this->request->getPost("email"),
            'nama_pengguna' => $this->request->getPost("nama_pengguna"),
            'id_divisi' => $this->request->getPost("id_divisi"),
            'username' => $this->request->getPost("username"),
            'password' => $this->request->getPost("password"),
            'role' => $this->request->getPost('role')
        ];

        $this->ser->tambahUser($data);
        return redirect()->to(base_url('pengelola-user'));
    }

    public function tampilTambahUser2()
    {
        $data = [
            'divisi' => $this->dvs->AllDivisi()
        ];
        return view('icttech/tambahusertech', $data);
    }
    public function tambahpengguna2()
    {
        $data = [
            'email' => $this->request->getPost("email"),
            'nama_pengguna' => $this->request->getPost("nama_pengguna"),
            'id_divisi' => $this->request->getPost("id_divisi"),
            'username' => $this->request->getPost("username"),
            'password' => $this->request->getPost("password"),
            'role' => $this->request->getPost('role')
        ];

        $this->ser->tambahUser($data);
        return redirect()->to(base_url('pengelola-user-ict-tech'));
    }

    public function tampilrincian2($id_pengguna)
    {
        $data = [
            'divisi' => $this->dvs->AllDivisi(),
            'userdat'=> $this->ser->getDataUserById($id_pengguna)
        ];
        return view('icttech/rincianusertech', $data);
    }
    public function updateDataUser2($id_pengguna)
    {
        $data = [
            'email' => $this->request->getPost("email"),
            'nama_pengguna' => $this->request->getPost("nama_pengguna"),
            'id_divisi' => $this->request->getPost("id_divisi"),
            'username' => $this->request->getPost("username"),
            'password' => $this->request->getPost("password"),
            'role' => $this->request->getPost('role')
        ];
        $this->ser->processUpdateUser($id_pengguna,$data);
        return redirect()->to(base_url('pengelola-user-ict-tech'));
    }

    public function hapusPengguna($id_pengguna)
    {
        $this->ser->hapusr($id_pengguna);
        return redirect()->to(base_url('pengelola-user'));
    }
    public function hapusPengguna2($id_pengguna)
    {
        $this->ser->hapusr($id_pengguna);
        return redirect()->to(base_url('pengelola-user-ict-tech'));
    }
}