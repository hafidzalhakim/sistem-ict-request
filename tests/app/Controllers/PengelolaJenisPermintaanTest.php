<?php

namespace Tests\App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use App\Controllers\PengelolaJenisPermintaandanBarangController;
use CodeIgniter\Test\Mock\MockIncomingRequest;
use CodeIgniter\Test\Mock\MockResponse;
use CodeIgniter\Test\Mock\MockSession;

class PengelolaJenisPermintaanTest extends CIUnitTestCase
{
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();

        // Inisialisasi controller
        $this->controller = new PengelolaJenisPermintaandanBarangController();
    }

    public function testTambahBarangAdminValid()
    {
        // Simulasi input POST
        $_POST = [
            'id_pengguna'    => '1',
            'kode_barang'    => 'BRG-001',
            'lokasi'         => 'Gudang',
            'serial_number'  => 'SN123',
        ];

        $_FILES['gambar'] = [
            'name'     => 'test.png',
            'type'     => 'image/png',
            'tmp_name' => WRITEPATH . 'uploads/test.png',
            'error'    => 0,
            'size'     => 1000,
        ];

        // Jalankan fungsi
        $response = $this->controller->tambahBarangAdmin();

        // Cek apakah redirect terjadi
        $this->assertTrue($response->isRedirect());
        $this->assertStringContainsString('pengelola-barang', $response->getHeaderLine('Location'));
    }

    public function testTambahBarangAdminInvalid()
    {
        $_POST = [
            'id_pengguna'    => '',
            'kode_barang'    => '',
        ];

        // Jalankan fungsi
        $response = $this->controller->tambahBarangAdmin();

        // Karena gagal validasi, harusnya redirect
        $this->assertTrue($response->isRedirect());
    }
}