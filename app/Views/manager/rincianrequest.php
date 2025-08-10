<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rincian Request-Area Manager</title>

  <!-- Custom fonts for this template-->
  <link
    href=<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>
    rel="stylesheet"
    type="text/css" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href=<?= base_url('assets/css/sb-admin-2.min.css') ?> rel="stylesheet" />

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('manager') ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-list-ul"></i>
        </div>
        <div class="sidebar-brand-text mx-2 fw-bold text-uppercase">ICT Request Manager</div>
      </a>



      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('manager') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inbox Of Request</span></a>
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
          class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3">
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
                aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('username')  ?></span>
                <img
                  class="img-profile rounded-circle"
                  src=<?= base_url('assets/img/undraw_profile.svg') ?> />
              </a>
              <!-- Dropdown - User Information -->
              <div
                class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a
                  class="dropdown-item"
                  href=<?= base_url('/logout') ?>
                  data-toggle="modal"
                  data-target="#logoutModal">
                  <i
                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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
          <h1 class="h3 mb-4 text-gray-800">Rincian Request</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group">
                <label for="nama_pengguna">Name</label>
                <span style="margin-left: 15%;">: <?php echo $rrincir->nama_pengguna ?></span>
              </div>
              <div class="form-group">
                <label for="divisi">Division</label>
                <span style="margin-left: 14%;">: <?php echo $rrincir->divisi ?></span>
              </div>
              <div class="form-group">
                <label for="date_request">Date Of Request</label>
                <span style="margin-left: 9%;">: <?php echo $rrincir->date_request ?></span>
              </div>
              <div class="form-group">
                <label for="time">Time</label>
                <span style="margin-left: 16%;">: <?php echo $rrincir->time ?></span>
              </div>
              <div class="form-group">
                <label for="jenis_permintaan">Jenis Permintaan</label>
                <span style="margin-left: 9%;">: <?php echo $rrincir->jpermintaan ?></span>
              </div>
              <div class="form-group">
                <label for="barang">Barang</label>
                <span style="margin-left: 14.5%;">: <?php echo $rrincir->kode_barang ?></span>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <span style="margin-left: 12%;">: <?php echo $rrincir->description ?></span>
              </div>


            </div>

          </div>
          <button type="button" class="btn btn-link float-right w-25" style="background-color: #66CDAA;color:black" data-toggle="modal" data-target="#approveModal"><i class="fas fa-plus mr-2"></i>Tambah Approval</button>
          <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="assigntModalLabel">Request Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?php echo site_url('proseseditrincian') ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_request" id="id_request" value="<?php echo $rrincir->id_request ?>">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="date_approve">Date Of Approval</label>
                      <input type="date" name="date_approve" id="date_approve" class="form-control"
                        value="<?php date_default_timezone_set('Asia/Jakarta');
                                echo date('Y-m-d'); ?>">

                      <!-- Kolom deskripsi -->
                      <label for="description" class="mt-2">Deskripsi</label>
                      <textarea name="description" id="description" class="form-control" rows="3" placeholder="Masukkan deskripsi"></textarea>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="form-group">
                      <button class="btn btn-success" name="status" value="approved" style="float: right;">Approve</button>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-success" name="status" value="not approved" style="float: right; margin-right:10px">Not Approve</button>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-danger" style="float: right; margin-right:10px" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <h1 class="h3 mb-4 text-gray-800">Approval</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Status Of Approval</th>
                      <th>Date Of Approval</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($rrinciir): ?>
                      <tr>
                        <td><?php echo $rrinciir->status ?></td>
                        <td><?php echo $rrinciir->date_approve ?></td>
                      </tr>
                    <?php endif ?>
                  </tbody>
                </table>

              </div>

              <div class="text-right mt-3">
                <a href="<?= base_url('manager') ?>" class="btn btn-danger">
                  <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
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
            <span>Copyright &copy; ICT Request <?php echo date("Y") ?></span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika yakin, silakan tekan tombol "Logout" yang ada dibawah!</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a href=<?= base_url('/logout') ?> class="btn btn-primary">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src=<?= base_url('assets/vendor/jquery/jquery.min.js') ?>></script>
  <script src=<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>></script>

  <!-- Core plugin JavaScript-->
  <script src=<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>></script>

  <!-- Custom scripts for all pages-->
  <script src=<?= base_url('assets/js/sb-admin-2.min.js') ?>></script>

</body>

</html>