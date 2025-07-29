<?php

namespace Tests\App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class RequestTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function setUp(): void
    {
        parent::setUp();

        // Simulasi login menggunakan pengguna yang sudah ada di database (misalnya id = 1)
        session()->set([
            'isLogin' => true,
            'role'    => 'karyawan',
            'divisi'  => 'IT',
            'id'      => 1 // Pastikan ID 1 memang ada di tabel pengguna
        ]);
    }

    public function testRequesAsKaryawan()
    {
        $result = $this->call('get', 'ict-request');
        $result->assertOK();
    }

    public function testRequesRedirectsIfNotLoggedIn()
    {
        session()->destroy(); // Logout

        $result = $this->call('get', 'ict-request');
        $result->assertRedirectTo('login');
    }

    public function testTambahReques()
    {
        $result = $this->call('get', 'tambahrequest');
        $result->assertOK();
        $result->assertSee('tambahrequest');
    }

// public function testTambahRequPost()
// {
//     // Simulasi login ulang
//     session()->set([
//         'isLogin' => true,
//         'role'    => 'karyawan',
//         'divisi'  => 'IT',
//         'id'      => 1,
//     ]);

//     $postData = [
//         'date_request'    => '2025-07-27',
//         'time'            => '13:00',
//         'id_jpermintaan'  => 1,
//         'id_barang'       => 1,
//         'description'     => 'Test dari PHPUnit'
//     ];

//     // Change this line to match your actual route
//     $result = $this->call('post', 'tambahrequ', $postData);
//     $result->assertRedirectTo(base_url('ict-request'));
//     $this->assertEquals('Request berhasil ditambahkan', session()->getFlashdata('success'));
// }
}
