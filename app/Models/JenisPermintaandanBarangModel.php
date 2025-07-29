<?php

namespace App\Models;
use CodeIgniter\Model;

class JenisPermintaandanBarangModel extends Model
{
    public function AllJp()
    {
        $builder = $this->db->table('jenis_permintaan');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function AllBrg()
    {
        $builder = $this->db->table('barang');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function AllKondisi()
    {
        $builder = $this->db->table('kondisi');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getAllBrg()
    {
        $builder = $this->db->table('barang');
        $builder->select('barang.*, pengguna.nama_pengguna, barang_transaksi.*, kondisi.*, barang.id_barang as id_barang');
        $builder->join('pengguna', 'pengguna.id_pengguna = barang.id_pengguna');
        $builder->join('barang_transaksi', 'barang_transaksi.id_barang = barang.id_barang', 'left');
        $builder->join('kondisi', 'kondisi.id_kondisi = barang_transaksi.id_kondisi', 'left');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getAllBrgById($id_barang)
    {
        $builder = $this->db->table('barang');
        $builder->select('*, barang.id_barang as id_barang, pengguna.nama_pengguna as nama_pemakai');
        $builder->join('pengguna', 'pengguna.id_pengguna = barang.id_pengguna');
        $builder->join('barang_transaksi', 'barang_transaksi.id_barang = barang.id_barang', 'left');
        $builder->join('kondisi', 'kondisi.id_kondisi = barang_transaksi.id_kondisi', 'left');
        $builder->where('barang.id_barang', $id_barang);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function tambahBrg($datatambahb)
    {
        return $this->db->table('barang')->insert($datatambahb);
    }

    public function editB($id_barang, $bedit)
    {
        return $this->db->table('barang')->join('barang_transaksi', 'barang_transaksi.id_barang = barang.id_barang')->where('id_barang', $id_barang)->update($bedit);
    }

    public function hapusBrg($id_barang)
    {
        $this->db->table('barang_transaksi')->where('id_barang', $id_barang)->delete();

        return $this->db->table('barang')->where('id_barang', $id_barang)->delete();
    }


    public function AllApprove()
    {
        $builder = $this->db->table('akses_approval');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function AllLokasi()
    {
        $builder = $this->db->table('lokasi_barang');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getAllTransaksi()
    {
        $builder = $this->db->table('barang_transaksi');
        $builder->select('barang_transaksi.*, barang.*, kondisi.*, penyerah.nama_pengguna as nama_penyerah, penerima.nama_pengguna as nama_penerima');
        $builder->join('barang', 'barang.id_barang = barang_transaksi.id_barang');
        $builder->join('kondisi', 'kondisi.id_kondisi = barang_transaksi.id_kondisi', );
        $builder->join('pengguna as penyerah', 'barang_transaksi.nama_penyerah = penyerah.id_pengguna', 'left');
        $builder->join('pengguna as penerima', 'barang_transaksi.nama_penerima = penerima.id_pengguna', 'left');
        $query = $builder->get();
        return $query->getResult();
    }
    public function getAllTsiById($id_transaksi)
    {
        $builder = $this->db->table('barang_transaksi');
        $builder->join('barang', 'barang.id_barang = barang_transaksi.id_barang');
        $builder->join('kondisi', 'kondisi.id_kondisi = barang_transaksi.id_kondisi');
        $builder->where('barang_transaksi.id_transaksi', $id_transaksi);
        $query = $builder->get();
        return $query->getRowArray();
    }
    public function tambahTsi($dtambaht)
    {
        return $this->db->table('barang_transaksi')->insert($dtambaht);
    }
    public function hapusTsi($id_transaksi)
    {
        return $this->db->table('barang_transaksi')->where('id_transaksi', $id_transaksi)->delete();
    }
    public function editTsi($id_transaksi, $dedit)
    {
        return $this->db->table('barang_transaksi')->where('id_transaksi', $id_transaksi)->update($dedit);
    }

    public function getAllKondisi()
    {
        $builder = $this->db->table('kondisi');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function tambahKB($dtambahk)
    {
        return $this->db->table('kondisi')->insert($dtambahk);
    }
    public function hapusKB($id_kondisi)
    {
        return $this->db->table('kondisi')->where('id_kondisi', $id_kondisi)->delete();
    }

}