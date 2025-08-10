<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>ICT Request</title>

    <!-- Custom fonts for this template -->
    <link
      href=<?=base_url('assets/vendor/fontawesome-free/css/all.min.css')?>
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template -->
    <link href=<?=base_url('assets/css/sb-admin-2.min.css')?> rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link
      href=<?=base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>
      rel="stylesheet"
    />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a href=<?=base_url('/admin')?> class="sidebar-brand d-flex align-items-center justify-content-center" >
            <div class="sidebar-brand-icon">
            <i class="fas fa-list-ul"></i>
            </div>
            <div class="sidebar-brand-text mx-3">ICT Request</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href=<?php echo site_url('ict-request')?>>
                        <i class="fas fa-history"></i>
                        <span>ICT Request</span></a>
                </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
              <button
                id="sidebarToggleTop"
                class="btn btn-link d-md-none rounded-circle mr-3"
              >
                <i class="fa fa-bars"></i>
              </button>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <div class="topbar-divider d-none d-sm-block"></div>
              
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    ><?= session()->get('username')  ?></span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src=<?=base_url('assets/img/undraw_profile.svg')?>
                  />
                </a>
                <!-- Dropdown - User Information -->
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown"
                >
                  <a
                    class="dropdown-item"
                    href=<?=base_url('/logout')?>
                    data-toggle="modal"
                    data-target="#logoutModal"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h3 class="h3 text-gray-800">Halo <?php echo session()->get('username')  ?>, <br>Selamat Datang di ICT Request</h3>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <a href="<?php echo site_url('tambahrequest') ?>">
                    <button class="btn btn-link float-right w-100" style="background-color: #66CDAA;color:black">
                        <i class="fas fa-plus"></i> Tambah Request
                    </button>

                    </a>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>Tanggal Request</th>
                        <th>Waktu Request</th>
                        <th>Jenis Permintaan</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Rincian Request</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($rdataarr as $rdar): ?>
                      <tr>
                        <td><?= $rdar->date_request?></td>
                        <td><?= $rdar->time?></td>
                        <td><?= $rdar->jpermintaan?></td>
                        <td><?= $rdar->description?></td>
                        <td><span style="background-color: <?= $rdar->status_reques === 'Done' ? '#d4edda' : ($rdar->status_reques === 'On progress' ? '#fff3cd' : 'transparent'); ?>; color: <?= $rdar->status_reques === 'Done' ? '#155724' : ($rdar->status_reques === 'On progress' ? '#856404' : '#000'); ?>; padding: 4px 8px; border-radius: 4px; font-weight: bold; display: inline-block;"><?= $rdar->status_reques ?></span></td>
                        <td class=" d-flex align-items-center justify-content-center">
                        <button class="btn btn-link" style="background-color: black; color: white; margin-right:10px" type="button" data-toggle="modal" data-target="#requestModal<?php echo $rdar->id_request?>">Periksa</button>
                        </td>
                        
                    </tr>
                    <div class="modal fade" id="requestModal<?php echo $rdar->id_request?>" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="requestModalLabel">Request Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body border">
                            <form action="#" method="get">
                              <input type="hidden">
                            <div class="form-group" style="padding-left: 5px;">
                              <label for="nama" >Date Of Request</label>
                              <span style="margin-left: 15%;">: <?php echo $rdar->date_request?></span>
                            </div>
                            <div class="form-group" style="padding-left: 5px;">
                              <label for="nama" >Time Of Request</label>
                              <span style="margin-left: 15%;">: <?php echo $rdar->time?></span>
                            </div>
                            <div class="form-group" style="padding-left: 5px;">
                              <label for="nama" >Type Of Request</label>
                              <span style="margin-left: 15%;">: <?php echo $rdar->jpermintaan?></span>
                            </div>
                            <div class="form-group" style="padding-left: 5px;">
                              <label for="nama" >Items</label>
                              <span style="margin-left: 32%;">: <?php echo $rdar->kode_barang?></span>
                            </div>
                            <div class="form-group" style="padding-left: 5px;">
                              <label for="nama" >Description</label>
                              <span style="margin-left: 23%;">: <?php echo $rdar->description?></span>
                            </div>
                            <!-- <div class="form-group" style="padding-left: 5px;">
                              <label for="nama" >Approval Status</label>
                              <span style="margin-left: 15%;">: <?php echo $rdar->status_approve?></span>
                            </div> -->
                            <div class="form-group" style="padding-left: 5px;">
                              <label for="nama" >Date Of Approval</label>
                              <span style="margin-left: 13%;">: <?php echo $rdar->date_approved?></span>
                            </div>
                            
                            <div class="form-group" style="padding-left: 5px;">
                                <label for="nama">Status Request</label>
                                <span style="margin-left: 17%;">: <?php echo $rdar->status_reques?></span>
                            </div>

                            <div class="form-group" style="padding-left: 5px;">
                                <label for="nama">Solusi</label>
                                <span style="margin-left: 31%;">: <?php echo $rdar->solution?></span>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          </div>
                          </form>
                        </div>
                      </div>
                  </div>
                      <?php endforeach?>
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; ICT Request <?php echo date("Y")?></span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Keluar?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          Jika yakin, silakan tekan tombol "Logout" yang ada dibawah!
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a href=<?=base_url('/logout')?> class="btn btn-primary" >Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=<?=base_url('assets/vendor/jquery/jquery.min.js')?>></script>
    <script src=<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>></script>

    <!-- Core plugin JavaScript-->
    <script src=<?=base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>></script>

    <!-- Custom scripts for all pages-->
    <script src=<?=base_url('assets/js/sb-admin-2.min.js')?>></script>

    <!-- Page level plugins -->
    <script src=<?=base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>></script>
    <script src=<?=base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>></script>

    <!-- Page level custom scripts -->
    <script src=<?=base_url('assets/js/demo/datatables-demo.js')?>></script>
    <script src=<?=base_url('assets/js/requestdetails.js')?>></script>
  </body>
</html>