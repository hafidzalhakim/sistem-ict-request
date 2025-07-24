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

    <title>ICT Request-ICT Tech</title>

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
    <!-- Custom Warna Table -->
    <link rel="stylesheet" href=<?=base_url('assets/css/table.css')?>>
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('ict-tech') ?>">
            <div class="sidebar-brand-icon">
            <i class="fas fa-list-ul"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin ICT Request-Tech</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('ict-tech')?>>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Inbox Of Request</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('pengelola-user-ict-tech')?>>
                <i class="fas fa-fw fa-user-alt"></i>
                <span>Pengelola User</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('ict-request-admin-tech')?>>
            <i class="fas fa-history"></i>
                <span>Request</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('pengelola-barang-ict')?>>
            <i class="fas fa-warehouse"></i>
                <span>Pengelola Barang</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('pengelola-transaksi-barang-ict')?>>
            <i class="fas fa-warehouse"></i>
                <span>Pengelola Transaksi Barang</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('pengelola-kondisi-barang-ict')?>>
            <i class="fas fa-warehouse"></i>
                <span>Pengelola Kondisi Barang</span></a>
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
            <h1 class="h3 mb-2 text-gray-800">Inbox Request</h1>
            <div class="row mb-4">
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Request</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalRequest ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Request Selesai</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalSelesai ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Barang</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalBarang ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-boxes fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
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
                        <th>Name</th>
                        <th>Division</th>
                        <th>Demand Type</th>
                        <th>Description</th>
                        <th>Date Of Request</th>
                        <th>Status</th>
                        <th>Assignment</th>
                        <th>Data Print</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataar as $requ): ?>
                      <tr class="request">
                        <td><?= $requ->nama_pengguna?></td>
                        <td><?= $requ->divisi?></td>
                        <td><?= $requ->jpermintaan?></td>
                        <td><?= $requ->description?></td>
                        <td><?= $requ->date_request?></td>
                        <td><?= $requ->status_reques?></td>
                        <td class=" d-flex align-items-center justify-content-center"><a href=<?php echo site_url('rincian-request-ict-tech').'/'.$requ->id_request?>><button class="btn btn-link" style="background-color: black; color: white;">Assign</button></a></td>
                        <td class="  align-items-center justify-content-center"><a href=<?php echo site_url('rincian-data-print').'/'.$requ->id_request?>><button class="btn btn-link" style="background-color: black; color: white;">Print</button></a></td>
                      </tr>
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

    <!-- script warna table -->
    <script src=<?=base_url('assets/js/table.js')?>></script>
  </body>
</html>
