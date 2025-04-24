<?php
namespace App\Controllers;
use App\Models\LoginModel;
use CodeIgniter\HTTP\RedirectResponse;

class LoginController extends BaseController
{
    protected $login;

    public function __construct()
    {
        $this->login =new LoginModel();
    }

    public function login()
    {
        return view('admin/login');
    }

    public function validasimasuk() 
    {
        $session = session();
        // menggunakan library validation
        $validate = \Config\Services::validation();
        // set rule from
        $validate->setRules([
            'username' => 'required',
            'password' => 'required'
        ]);

        //Menjalankan rule
        if(!$validate->withRequest($this->request)->run()){
            //Jika validasi gagal
            $session->setFlashdata('error',  'failed');
            return redirect()->to('/login');
        }

        //Mendapatkan data
        $username = esc( $this->request->getPost('username'));
        $password = esc( $this->request->getPost('password'));

        //Validasi form input
        //Query pengguna berdasarkan masukan form
        $data = $this->login->validateUser($username, $password);

        if(empty($data)){
            // set cookie
            $session->set( [
                "id" => $data->id_pengguna,
                "username" => $data->username,
                "password" => $data->password,
                "nama_pengguna" => $data->nama_pengguna,
                "divisi" => $data->divisi,
                "isLogin" => true  
            ]);

            //cek role pengguna
            switch ($data->role){
                case 'manager' :
                    $session->set( 'role', 'manager');
                    return redirect()->to( '/manager');
                    break;
                case 'divisiict' :
                    $session->set('role',  'divisiict');
                    return redirect()->to( '/divisiict');
                    break;
                default:
                    $session->set( 'role',  'karyawan');
                    return redirect()->to( '/karyawan');
                    break;
            }
        } else {
            $session->setFlashdata( 'error', 'invalid');
            return redirect()->to( '/login');
        }
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/login');
    }
}