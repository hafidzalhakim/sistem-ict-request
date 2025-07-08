<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');
// halaman login
$routes->get('login', 'LoginController::login');
// log out
$routes->get('logout', 'LoginController::logout');
// validasi masuk
$routes->post('auth', 'LoginController::validasimasuk');

#karyawan
$routes->get('ict-request', 'Request::reques');
$routes->get('tambahrequest', 'Request::tambahreques');
$routes->post('prosestambahrequest', 'Request::tambahrequ');
$routes->get('request/getRequestData', 'Request::getRequestData');

#Role
$routes->get('manager', 'Admin1::tampildata');
$routes->get('divisi-ict', 'Admin2::tampildata2');
$routes->get('ict-tech', 'Admin3::tampildata3');

#divisi ict
$routes->get('ict-request-admin', 'RequestAdmin::reques');
$routes->get('tambahrequest-admin', 'RequestAdmin::tambahreques');
$routes->post('prosestambahrequest-admin', 'RequestAdmin::tambahrequ');
$routes->get('pengelola-user', 'PengelolaUserController::tampil');
$routes->get('tambahpengguna','PengelolaUserController::tampilTambahUser');
$routes->post('prosestambahuser','PengelolaUserController::tambahpengguna');
$routes->get('rincian-user/(:any)','PengelolaUserController::tampilrincian/$1');
$routes->post('prosesubahdatauser/(:any)','PengelolaUserController::updateDataUser/$1');
$routes->get('hapususer/(:any)','PengelolaUserController::hapusPengguna/$1');
$routes->get('rincian-request-ict/(:any)', 'RincianRequest2::requassign/$1');
$routes->post('prosesassign', 'RincianRequest2::simpanassigned');
$routes->post('prosesubahassign/(:any)', 'RincianRequest2::ubahAssigned/$1');
$routes->get('hapusassign/(:num)/(:num)', 'RincianRequest2::hapusAssigned/$1/$2');
$routes->post('prosesubahreq/(:any)', 'RincianRequest2::ubahreques/$1');
$routes->get('pengelola-barang', 'PengelolaJenisPermintaandanBarangController::tampilbadmin');
$routes->get('tambahbarang','PengelolaJenisPermintaandanBarangController::tampiltambahbadmin');
$routes->post('prosestambahbarang','PengelolaJenisPermintaandanBarangController::tambahbadmin');
$routes->get('edit-barang/(:any)','PengelolaJenisPermintaandanBarangController::tampileditbadmin/$1');
$routes->post('proseseditbarang/(:any)','PengelolaJenisPermintaandanBarangController::editbadmin/$1');
$routes->get('hapusdb/(:any)','PengelolaJenisPermintaandanBarangController::hapusbadmin/$1');
$routes->get('pengelola-kondisi-barang', 'PengelolaBarangTransaksiController::tampilkondisi');
$routes->get('tambahkondisi','PengelolaBarangTransaksiController::tampiltambahkadmin');
$routes->post('prosestambahkbarang','PengelolaBarangTransaksiController::tambahkadmin');
$routes->get('hapuskb/(:any)','PengelolaBarangTransaksiController::hapuskadmin/$1');
$routes->get('tambahlainnya','PengelolaJenisPermintaandanBarangController::tampiltambahladmin');
$routes->post('prosestambahlainnya','PengelolaJenisPermintaandanBarangController::tambahladmin');
$routes->get('pengelola-transaksi-barang', 'PengelolaBarangTransaksiController::tampiltadmin');
$routes->get('tambahtransaksi','PengelolaBarangTransaksiController::tampiltambahtadmin');
$routes->post('prosestambahtransaksi','PengelolaBarangTransaksiController::tambahtadmin');
$routes->get('ubah-transaksi-barang/(:any)','PengelolaBarangTransaksiController::tampilubahtadmin/$1');
$routes->post('prosesubahtransaksi/(:any)','PengelolaBarangTransaksiController::edittadmin/$1');
$routes->get('hapusdt/(:any)','PengelolaBarangTransaksiController::hapustadmin/$1');
$routes->get('data-print-rincian/(:any)', 'DataPrint::requassign/$1');
$routes->get('printrequassigned/(:any)', 'DataPrint::printrequassign/$1');
$routes->get('rincian-data-print/(:any)', 'DataPrint::requassigned/$1');
$routes->get('printrequassigne/(:any)', 'DataPrint::printrequassign/$1');


#ict tech
$routes->get('ict-request-admin-tech', 'RequestAdmin::reques2');
$routes->get('tambahrequest-admin-tech', 'RequestAdmin::tambahreques2');
$routes->post('prosestambahrequest-admin-tech', 'RequestAdmin::tambahrequ2');
$routes->get('rincian-request-ict-tech/(:any)', 'RincianRequest3::rincianrequest/$1');
$routes->get('pengelola-user-ict-tech', 'PengelolaUserController::tampil2');
$routes->get('rincian-user-ict-tech/(:any)','PengelolaUserController::tampilrincian2/$1');
$routes->post('prosesubahdatauser-ict-tech/(:any)','PengelolaUserController::updateDataUser2/$1');
$routes->get('tambahpengguna-ict-tech','PengelolaUserController::tampilTambahUser2');
$routes->post('prosestambahuser-ict-tech','PengelolaUserController::tambahpengguna2');
$routes->get('hapususer-ict-tech/(:any)','PengelolaUserController::hapusPengguna2/$1');
$routes->get('hapuskbtech/(:any)','PengelolaBarangTransaksiController::hapuskadmin2/$1');
$routes->get('pengelola-barang-ict', 'PengelolaJenisPermintaandanBarangController::tampilbtech');
$routes->get('tambahbarangict','PengelolaJenisPermintaandanBarangController::tampiltambahict');
$routes->post('prosestambahbarangict','PengelolaJenisPermintaandanBarangController::tambahbtech');
$routes->get('edit-barang-ict/(:any)','PengelolaJenisPermintaandanBarangController::tampileditbtech/$1');
$routes->post('proseseditbarangict/(:any)','PengelolaJenisPermintaandanBarangController::editbtech/$1');
$routes->post('prosestambahtransaksiict','PengelolaBarangTransaksiController::tambahbtech');
$routes->get('pengelola-kondisi-barang-ict', 'PengelolaBarangTransaksiController::tampilkondisi2');
$routes->get('tambahkondisiict','PengelolaBarangTransaksiController::tampiltambahkadmin2');
$routes->post('prosestambahkbarangict','PengelolaBarangTransaksiController::tambahkadmin2');
$routes->get('hapuskbtech/(:any)','PengelolaBarangTransaksiController::hapuskadmin2/$1');
$routes->get('tambahlainnyaict','PengelolaJenisPermintaandanBarangController::tampiltambahladmin2');
$routes->post('prosestambahlainnyaict','PengelolaJenisPermintaandanBarangController::tambahladmin2');
$routes->get('pengelola-transaksi-barang-ict', 'PengelolaBarangTransaksiController::tampiltict');
$routes->get('tambahtransaksiict','PengelolaBarangTransaksiController::tampiltambahict');
$routes->post('prosestambahtransaksiict','PengelolaBarangTransaksiController::tambahbtech');
$routes->get('ubah-transaksi-barang-ict/(:any)','PengelolaBarangTransaksiController::tampilubahtict/$1');
$routes->post('prosesubahtransaksiict/(:any)','PengelolaBarangTransaksiController::edittict/$1');
$routes->get('hapusdtict/(:any)','PengelolaBarangTransaksiController::hapusbict/$1');
$routes->get('rincian-request-ict-tech/(:any)', 'RincianRequest3::rincianrequest/$1');
$routes->post('proseswork', 'RincianRequest3::simpanwork');
$routes->post('prosesubahassigned/(:any)', 'RincianRequest3::ubahAssign/$1');
$routes->post('prosesubahreq/(:any)', 'RincianRequest2::ubahreques/$1');
$routes->get('hapusassigned/(:num)/(:num)', 'RincianRequest3::hapusAssign/$1/$2');
$routes->post('prosesubahrequ/(:any)', 'RincianRequest3::ubahreques/$1');


#Manager
$routes->get('rincian-request-approve/(:any)', 'RincianRequest1::rincianrequest1/$1');
$routes->post('proseseditrincian', 'RincianRequest1::simpanapprove');
