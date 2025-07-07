<?php

namespace App\Controllers;
use App\Models\JenisPermintaandanBarangModel;
use App\Models\UserModel;

class PengelolaJenisPermintaandanBarangController extends BaseController
{
    protected $jpb;
    protected $us;
    public function __construct()
    {
        $this->jpb = new JenisPermintaandanBarangModel();
        $this->us = new UserModel();
    }

    public function tampilbadmin()
    {
        // Periksa status login dan role pengguna
   $session = session();
   if (!$session->get('isLogin') || $session->get('role') !== 'divisiict') {
       // Jika pengguna tidak login atau bukan divisiict, redirect ke halaman login
       return redirect()->to('login');
    }
        $datab = $this->jpb->getAllBrg();
        return view('divisiict/pengelolabarang',['datub'=>$datab]);
    }

    public function tampiltambahbadmin()
    {
        $data = [
            'dataus' => $this->us->AllUser(),
            'datulok' => $this->jpb->AllLokasi(),
            'datuk' => $this->jpb->AllKondisi(),
            'validation'=>\Config\Services::validation()
        ];
        return view('divisiict/tambahbarang', $data);
    }

    public function tambahbadmin()
    {
        $rules = $this->validate([
            'gambar' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
                
        ]);

        if(!$rules){
            session()->setFlashdata('failed','Maaf Silakan Isi Data Dengan Benar');
            return redirect()->back()->withInput();
        }

        $gb = $this->request->getFile('gambar');
        $ngb = $gb->getName();
        $gb->move('assets/image/');
        
        
        $data = [
            'id_pengguna' => $this->request->getPost("id_pengguna"),
            'kode_barang' => $this->request->getPost("kode_barang"),
            'lokasi' => $this->request->getPost("lokasi"),
            'serial_number' => $this->request->getPost("serial_number"),
            'gambar' => $ngb

        ];

        $this->jpb->tambahBrg($data);
        return redirect()->to(base_url('pengelola-barang'));
    }

    public function tampileditbadmin($id_barang)
    {
        $data = [
            'dataus' => $this->us->AllUser(),
            'datulok' => $this->jpb->AllLokasi(),
            'datuk' => $this->jpb->AllKondisi(),
            'datubad'=> $this->jpb->getAllBrgById($id_barang),
            'validation'=>\Config\Services::validation()
        ];
        return view('divisiict/editbarang', $data);
    }

    public function editbadmin($id_barang)
    {
        $validationRule = [
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'File yang diunggah harus berupa gambar.',
                    'mime_in' => 'Format gambar harus jpg, jpeg, atau png.',
                ]
            ]
        ];
    
        if (!$this->validate($validationRule)) {
            session()->setFlashdata('failed', 'Maaf, silakan isi data dengan benar.');
            return redirect()->back()->withInput();
        }
    
        $gbadmin = $this->request->getFile('gambar');
        if ($gbadmin->isValid() && !$gbadmin->hasMoved()) {
            $ngbadmin = $gbadmin->getName();
            $gbadmin->move('assets/image/');
        } else {
            // Jika gambar tidak diunggah, gunakan gambar yang ada
            $ngbadmin = $this->request->getPost('existing_image');
        }
    
        $id_transaksi = $this->request->getPost('id_transaksi');
        $data = [
            'id_pengguna' => $this->request->getPost("id_pengguna"),
            'kode_barang' => $this->request->getPost("kode_barang"),
            'serial_number' => $this->request->getPost("serial_number"),
            'lokasi' => $this->request->getPost("lokasi"),
            'note' => $this->request->getPost("note"),
            'gambar' => $ngbadmin
        ];
    
        $data2 = [
            'id_transaksi' => $id_transaksi,
            'id_kondisi' => $this->request->getPost("id_kondisi")
        ];
    
        $this->jpb->editB($id_barang, $data);
        $this->jpb->editTsi($id_transaksi, $data2);
        return redirect()->to(base_url('pengelola-barang'));
    }
    

    public function tampiltambahladmin()
    {
        
        return view('divisiict/tambahbaranglainnya');
    }

    public function tambahladmin()
    {
        $id_pengguna = session()->get('id');
        $data = [
            'id_pengguna' => $id_pengguna,
            'kode_barang' => $this->request->getPost("kode_barang")

        ];

        $this->jpb->tambahBrg($data);
        return redirect()->to(base_url('pengelola-barang'));
    }

    public function hapusbadmin($id_barang)
    {
        
        $this->jpb->hapusBrg($id_barang);
        return redirect()->to(base_url('pengelola-barang'));
    }

    public function tampilbtech()
    {
        // Periksa status login dan role pengguna
   $session = session();
   if (!$session->get('isLogin') || $session->get('role') !== 'icttech') {
       // Jika pengguna tidak login atau bukan icttech, redirect ke halaman login
       return redirect()->to('login');
    }
        $databa = $this->jpb->getAllBrg();
        return view('icttech/pengelolabarang2',['datuba'=>$databa]);
    }

    public function tampiltambahict()
    {
        $data = [
            'dataus' => $this->us->AllUser(),
            'datulok' => $this->jpb->AllLokasi(),
            'datuk' => $this->jpb->AllKondisi(),
            'validation'=>\Config\Services::validation()
        ];
        return view('icttech/tambahbarangicttech',$data);
    }

    public function tambahbtech()
    {
        $rules = $this->validate([
            'gambar' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
                
        ]);

        if(!$rules){
            session()->setFlashdata('failed','Maaf Silakan Isi Data Dengan Benar');
            return redirect()->back()->withInput();
        }

        $gb = $this->request->getFile('gambar');
        $ngb = $gb->getName();
        $gb->move('assets/image/');
        
        
        $data = [
            'id_pengguna' => $this->request->getPost("id_pengguna"),
            'kode_barang' => $this->request->getPost("kode_barang"),
            'lokasi' => $this->request->getPost("lokasi"),
            'serial_number' => $this->request->getPost("serial_number"),
            'gambar' => $ngb

        ];

        $this->jpb->tambahBrg($data);
        return redirect()->to(base_url('pengelola-barang-ict'));
    }

    public function tampileditbtech($id_barang)
    {
        $data = [
            'dataus' => $this->us->AllUser(),
            'datulok' => $this->jpb->AllLokasi(),
            'datuk' => $this->jpb->AllKondisi(),
            'datubad'=> $this->jpb->getAllBrgById($id_barang),
            'validation'=>\Config\Services::validation()
        ];
        return view('icttech/editbarang2', $data);
    }

    public function editbtech($id_barang)
    {
        $validationRule = [
            'gambar' => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'File yang diunggah harus berupa gambar.',
                    'mime_in' => 'Format gambar harus jpg, jpeg, atau png.',
                ]
            ]
        ];
    
        if (!$this->validate($validationRule)) {
            session()->setFlashdata('failed', 'Maaf, silakan isi data dengan benar.');
            return redirect()->back()->withInput();
        }
    
        $gbadmin = $this->request->getFile('gambar');
        if ($gbadmin->isValid() && !$gbadmin->hasMoved()) {
            $ngbadmin = $gbadmin->getName();
            $gbadmin->move('assets/image/');
        } else {
            // Jika gambar tidak diunggah, gunakan gambar yang ada
            $ngbadmin = $this->request->getPost('existing_image');
        }
    
        $id_transaksi = $this->request->getPost('id_transaksi');
        $data = [
            'id_pengguna' => $this->request->getPost("id_pengguna"),
            'kode_barang' => $this->request->getPost("kode_barang"),
            'serial_number' => $this->request->getPost("serial_number"),
            'lokasi' => $this->request->getPost("lokasi"),
            'note' => $this->request->getPost("note"),
            'gambar' => $ngbadmin
        ];
    
        $data2 = [
            'id_transaksi' => $id_transaksi,
            'id_kondisi' => $this->request->getPost("id_kondisi")
        ];
    
        $this->jpb->editB($id_barang, $data);
        $this->jpb->editTsi($id_transaksi, $data2);
        return redirect()->to(base_url('pengelola-barang-ict'));
    }

    public function hapusbict($id_barang)
    {
        $this->jpb->hapusBrg($id_barang);
        return redirect()->to(base_url('pengelola-barang-ict'));
    }

    public function tampiltambahladmin2()
    {
        
        return view('icttech/tambahbaranglainnya2');
    }

    public function tambahladmin2()
    {
        $id_pengguna = session()->get('id');
        $data = [
            'id_pengguna' => $id_pengguna,
            'kode_barang' => $this->request->getPost("kode_barang")

        ];

        $this->jpb->tambahBrg($data);
        return redirect()->to(base_url('pengelola-barang-ict'));
    }
}