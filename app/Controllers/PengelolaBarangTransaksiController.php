<?php

namespace App\Controllers;
use App\Models\JenisPermintaandanBarangModel;
use App\Models\UserModel;

class PengelolaBarangTransaksiController extends BaseController
{
    protected $jpb;
    protected $us;

    public function __construct()
    {
        $this->jpb = new JenisPermintaandanBarangModel();
        $this->us = new UserModel();
    }

    public function tampilTadmin()
    {
        // Periksa status login dan role pengguna
   $session = session();
   if (!$session->get('isLogin') || $session->get('role') !== 'divisiict') {
       // Jika pengguna tidak login atau bukan divisi ict, redirect ke halaman login
       return redirect()->to('login');
    }
        $datab = $this->jpb->getAllTransaksi();
        return view('divisiict/pengelolabarangtransaksi',['datut'=>$datab]);
    }

    public function tampiltambahtadmin()
    {
        $data = [
            'dater' => $this->us->AllUser(),
            'datub' => $this->jpb->AllBrg(),
            'datuk' => $this->jpb->AllKondisi()
        ];
        return view('divisiict/tambahbarangtransaksi', $data);
    }

    public function tambahtadmin()
    {
        $data = [
            'id_barang' => $this->request->getPost("id_barang"),
            'id_kondisi' => $this->request->getPost("id_kondisi"),
            'jenis_transaksi' => $this->request->getPost("jenis_transaksi"),
            'nama_penyerah' => $this->request->getPost("nama_penyerah"),
            'nama_penerima' => $this->request->getPost("nama_penerima"),

        ];

        $this->jpb->tambahTsi($data);
        return redirect()->to(base_url('pengelola-transaksi-barang'));
    }

    public function tampilubahtadmin($id_transaksi)
    {
        $data = [
            'dater' => $this->us->AllUser(),
            'datub' => $this->jpb->AllBrg(),
            'datuk' => $this->jpb->AllKondisi(),
            'datulok' => $this->jpb->AllLokasi(),
            'datab' => $this->jpb->getAllTsiById($id_transaksi)
        ];
        return view('divisiict/editbarangtransaksi', $data);
    }

    public function edittadmin($id_transaksi)
    {
        $data = [
            'id_barang' => $this->request->getPost("id_barang"),
            'id_kondisi' => $this->request->getPost("id_kondisi"),
            'jenis_transaksi' => $this->request->getPost("jenis_transaksi"),
            'nama_penyerah' => $this->request->getPost("nama_penyerah"),
            'nama_penerima' => $this->request->getPost("nama_penerima"),

        ];

        $this->jpb->editTsi($id_transaksi,$data);
        return redirect()->to(base_url('pengelola-transaksi-barang'));
    }

    public function hapustadmin($id_transaksi)
    {
        
        $this->jpb->hapusTsi($id_transaksi);
        return redirect()->to(base_url('pengelola-transaksi-barang'));
    }

    public function tampiltict()
    {
        // Periksa status login dan role pengguna
        $session = session();
        if (!$session->get('isLogin') || $session->get('role') !== 'icttech') {
            // Jika pengguna tidak login atau bukan ict tech, redirect ke halaman login
            return redirect()->to('login');
        }
        $databa = $this->jpb->getAllTransaksi();
        return view('icttech/pengelolabarangtransaksiicttech', ['datutic' => $databa]);
    }


    public function tampiltambahict()
    {
        $data = [
            'dater' => $this->us->AllUser(),
            'datub' => $this->jpb->AllBrg(),
            'datuk' => $this->jpb->AllKondisi()
        ];
        return view('icttech/tambahbarangtransaksiicttech',$data);
    }

    public function tambahbtech()
    {
        $data = [
            'id_barang' => $this->request->getPost("id_barang"),
            'id_kondisi' => $this->request->getPost("id_kondisi"),
            'jenis_transaksi' => $this->request->getPost("jenis_transaksi"),
            'nama_penyerah' => $this->request->getPost("nama_penyerah"),
            'nama_penerima' => $this->request->getPost("nama_penerima"),

        ];

        $this->jpb->tambahTsi($data);
        return redirect()->to(base_url('pengelola-transaksi-barang-ict'));
    }

    public function tampilubahtict($id_transaksi)
    {
        $data = [
            'dater' => $this->us->AllUser(),
            'datub' => $this->jpb->AllBrg(),
            'datuk' => $this->jpb->AllKondisi(),
            'datulok' => $this->jpb->AllLokasi(),
            'datab' => $this->jpb->getAllTsiById($id_transaksi)
        ];
        return view('icttech/editbarangtransaksiicttech', $data);
    }

    public function edittict($id_transaksi)
    {
        $data = [
            'id_barang' => $this->request->getPost("id_barang"),
            'id_kondisi' => $this->request->getPost("id_kondisi"),
            'jenis_transaksi' => $this->request->getPost("jenis_transaksi"),
            'nama_penyerah' => $this->request->getPost("nama_penyerah"),
            'nama_penerima' => $this->request->getPost("nama_penerima"),

        ];

        $this->jpb->editTsi($id_transaksi,$data);
        return redirect()->to(base_url('pengelola-transaksi-barang-ict'));
    }

    public function hapusbict($id_transaksi)
    {
        $this->jpb->hapusTsi($id_transaksi);
        return redirect()->to(base_url('pengelola-transaksi-barang-ict'));
    }

    public function tampilkondisi()
    {
        $session = session();
        if (!$session->get('isLogin') || $session->get('role') !== 'divisiict') {
            // Jika pengguna tidak login atau bukan divisi ict, redirect ke halaman login
            return redirect()->to('login');
         }
             $datak = $this->jpb->getAllKondisi();
             return view('divisiict/pengelolakondisibarang',['datuk'=>$datak]);
    }

    public function tampilkondisi2()
    {
        $session = session();
        if (!$session->get('isLogin') || $session->get('role') !== 'icttech') {
            // Jika pengguna tidak login atau bukan ict tech, redirect ke halaman login
            return redirect()->to('login');
         }
             $datakit = $this->jpb->getAllKondisi();
             return view('icttech/pengelolakondisibarang2',['datuk'=>$datakit]);
    }

    public function tampiltambahkadmin()
    {
        return view('divisiict/tambahkondisibarang');
    }

    public function tambahkadmin()
    {
        $data = [
            'kondisi' => $this->request->getPost("kondisi"),
        ];
        $this->jpb->tambahKB($data);
        return redirect()->to(base_url('pengelola-kondisi-barang'));
    }

    public function hapuskadmin($id_kondisi)
    {
        $this->jpb->hapusKB($id_kondisi);
        return redirect()->to(base_url('pengelola-kondisi-barang'));
    }

    public function tampiltambahkadmin2()
    {
        return view('icttech/tambahkondisibarang2');
    }

    public function tambahkadmin2()
    {
        $data = [
            'kondisi' => $this->request->getPost("kondisi"),
        ];
        $this->jpb->tambahKB($data);
        return redirect()->to(base_url('pengelola-kondisi-barang-ict'));
    }

    public function hapuskadmin2($id_kondisi)
    {
        $this->jpb->hapusKB($id_kondisi);
        return redirect()->to(base_url('pengelola-kondisi-barang-ict'));
    }

}