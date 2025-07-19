<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Assignment-Divisi ICT</title>

    <!-- Custom fonts for this template-->
    <link
      href=<?=base_url('assets/vendor/fontawesome-free/css/all.min.css')?>
      rel="stylesheet"
      type="text/css"
    />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=<?=base_url('assets/css/sb-admin-2.min.css')?> rel="stylesheet" />
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                <i class="fas fa-list-ul"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ICT Request Divisi ICT</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('divisi-ict')?>>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Inbox Of Request</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('pengelola-user')?>>
                <i class="fas fa-fw fa-user-alt"></i>
                <span>Pengelola User</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('ict-request-admin')?>>
            <i class="fas fa-history"></i>
                <span>Request</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('pengelola-barang')?>>
            <i class="fas fa-warehouse"></i>
                <span>Pengelola Barang</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('pengelola-transaksi-barang')?>>
            <i class="fas fa-warehouse"></i>
                <span>Pengelola Transaksi Barang</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=<?php echo site_url('pengelola-kondisi-barang')?>>
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
                    <h1 class="h3 mb-4 text-gray-800">Rincian Request</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered">
                            <thead>
                      <tr>
                        <th>Date Of Request</th>
                        <th>Time Of Request</th>
                        <th>Name</th>
                        <th>Division</th>
                        <th>Demand Type</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($rrinci):?>
                      <tr>
                        <td><?php echo $rrinci->date_request?></td>
                        <td><?php echo $rrinci->time?></td>
                        <td><?php echo $rrinci->nama_pengguna?></td>
                        <td><?php echo $rrinci->divisi?></td>
                        <td><?php echo $rrinci->jpermintaan?></td>
                      </tr>
                      <?php endif?>
                         </tbody>
                        </table>
                      </div>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                          <th>Kode Barang</th>
                          <!-- <th>Status Of Approval</th> -->
                          <th>Date Of Approve</th>
                          <th>Description</th>
                          <th>Need Approval</th>
                          <th>Status Of Request</th>
                          <th>Solutions</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if($rrinci):?>
                      <tr>
                        <td><?php echo $rrinci->kode_barang?></td>
                        <!-- <td><?php echo $rrinci->status_approve?></td> -->
                        <td><?php echo $rrinci->date_approved?></td>
                        <td><?php echo $rrinci->description?></td>
                        <td><?php echo $rrinci->akses?></td>
                        <td><?php echo $rrinci->status_reques?></td>
                        <td><?php echo $rrinci->solution?></td>
                        <td><button type="button" class="btn btn-link " style="background-color: #00FF00;color:black" data-toggle="modal" data-target="#requestModalEdit<?= $rrinci->id_request?>">Edit Request</button></td>
                      </tr>
                      <div class="modal fade" id="requestModalEdit<?= $rrinci->id_request?>" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="assigneditModalLabel">Edit Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                               </button>
                              </div>
                            <div class="modal-body">
                            <form action="<?php echo site_url('prosesubahreq/' . $rrinci->id_request) ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_request" id="id_request" value="<?php echo $rrinci->id_request?>">
                                
                            <div class="form-group">
                                    <label for="akses">Need Approval</label> <br>
                                    <select name="akses" id="akses" class="form-control">
                                        <option value="" selected disabled>--Option--</option>
                                        <?php 
                                        $counter = 0;
                                        foreach ($jenispermintaan as $key => $value) {
                                            if ($counter < 2) { // Hanya menampilkan dua pilihan pertama
                                        ?>
                                            <option value="<?= $value['akses_approval'] == 1 ? 'Perlu Approval' : 'Tidak Perlu' ?>"  <?= ($rrinci->akses == ($value['akses_approval'] == 1 ? 'Perlu Approval' : 'Tidak Perlu')) ? 'selected' : '' ?>>
                                                <?= $value['akses_approval'] == 1 ? 'Perlu Approval' : 'Tidak Perlu' ?>
                                            </option>
                                        <?php 
                                                $counter++;
                                            } else {
                                                break;
                                            }
                                        } 
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="status_reques">Status Of Request</label><br>
                                    <select name="status_reques" id="status_reques" class="form-control">
                                      <option value="" selected disabled >---Option---</option>
                                      <option value="done" <?php if ($rrinci->status_reques === 'done') echo 'selected'; ?>>Done</option>
                                      <option value="on progress" <?php if ($rrinci->status_reques === 'on progress') echo 'selected'; ?> >On Progress</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label for="date_approved">Date Of Approval</label>
                                  <input type="date" name="date_approved" id="date_approved" class="form-control" value="<?= $rrinci->date_approved?>">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="status_approve">Status Of Approval</label><br>
                                    <select name="status_approve" id="status_approve" class="form-control">
                                      <option value="" selected disabled >---Option---</option>
                                      <option value="approved" <?php if ($rrinci->status_approve === 'approved') echo 'selected'; ?>>Approved</option>
                                      <option value="not approved" <?php if ($rrinci->status_approve === 'not approved') echo 'selected'; ?> >Not Approved</option>
                                    </select> -->
                                </div>
                                <div class="form-group">
                                    <label for="Solution">Solutions</label><br>
                                    <textarea name="solution" id="solution" rows="10" class="form-control w-100"><?php echo $rrinci->solution?></textarea>
                                </div>
                            </div>
                            
                        <div class="modal-footer">
                        <div class="form-group">
                                <button class="btn btn-success" type="submit" style="float: right;">Simpan</button>
                                </div>
                                <div class="form-group">
                                <button type="button" class="btn btn-danger" style="float: right; margin-right:10px" data-dismiss="modal">Cancel</button>
                                </div>
                          </div>
                          </form>
                        </div>
                      </div>
                      </div>
                      <?php endif?>
                    </tbody>
                            </table>
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
                                  <th>Approver</th>
                                  <th>Status Of Approval</th>
                                  <th>Position</th>
                                  <th>Date Of Approval</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <?php if($rriincii):?>
                                    <td><?php echo $rriincii->nama_pengguna?></td>
                                    <td><?php echo $rriincii->status?></td>
                                    <td><?php echo $rriincii->divisi?></td>
                                    <td><?php echo $rriincii->date_approve?></td>
                                  <?php endif?>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-link float-right w-25" style="background-color: #66CDAA;color:black" data-toggle="modal" data-target="#assignModal"><i class="fas fa-plus"></i>Add Asign</button>
                    <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="assigntModalLabel">Request Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                               </button>
                              </div>
                              <form action="<?php echo site_url('prosesassign') ?>" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_request" id="id_request" value="<?php echo $rrinci->id_request?>">
                            <div class="modal-body">
                              <div class="form-group">
                                    <label for="assigned">Assign To</label><br>
                                    <select name="assigned" id="assigned" class="form-control">
                                      <option value="" selected disabled>---Option---</option>
                                      <?php foreach ($userict as $key => $value) { ?>
                                          <option value="<?= $value['id_pengguna']?>"><?=$value['nama_pengguna']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date_assign">Date Of Assignment</label><br>
                                    <input type="date" name="date_assign" id="date_assign" class="form-control" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('Y-m-d')?>">
                                </div>
                                
                            </div>
                        <div class="modal-footer">
                          <div class="form-group">
                                <button class="btn btn-success" type="submit" style="float: right;" name="tambah">Simpan</button>
                                </div>
                                <div class="form-group">
                                <button type="button" class="btn btn-danger" style="float: right; margin-right:10px" data-dismiss="modal">Cancel</button>
                                </div>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    
                    <h1 class="h3 mb-4 text-gray-800">Assignment</h1>
                    
                   <div class="card shadow mb-4">
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                            <thead>
                      <tr>
                        <th>Assigned To</th>
                        <th>Date Of Assignment</th>
                        <th>Work Status</th>
                        <th>Date Complete</th>
                        <th>Status Of Request</th>
                        <th>Solution</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                       <tbody>
                      <?php foreach($rrincii as $rrin):?>
                      <tr>
                        <td><?= $rrin->assigned?></td>
                        <td><?= $rrin->date_assign?></td>
                        <td><?= $rrin->status_pengerjaan?></td>
                        <td><?= $rrin->date_complete?></td>
                        <td><?= $rrin->status_request?></td>
                        <td><?= $rrin->solusi?></td>
                        <td>
                          <button type="button" class="btn btn-link " style="background-color: #00FF00;color:black" data-toggle="modal" data-target="#assignModalEdit<?= $rrin->id_assign?>">Edit Asign</button>
                          <a href="<?php echo site_url('hapusassign').'/'.$rrin->id_assign.'/'.$rrinci->id_request?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">
                              <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </a>
                          </td>
                      </tr>
                      <div class="modal fade" id="assignModalEdit<?= $rrin->id_assign?>" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="assigneditModalLabel">Assignment Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                               </button>
                              </div>
                            <div class="modal-body">
                            <form action="<?php echo site_url('prosesubahassign/' . $rrin->id_assign) ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_request" id="id_request" value="<?php echo $rrinci->id_request?>">
                                <div class="form-group">
                                    <label for="date_assign">Date Of Assignment</label><br>
                                    <input type="date" name="date_assignedit" id="date_assignedit" class="form-control" value="<?php echo $rrin->date_assign?>">
                                </div>
                                <div class="form-group">
                                  <label for="assigned">Assign To</label><br>
                                  <select name="assignededit" id="assignededit" class="form-control">
                                      <option value="" selected disabled>---Option---</option>
                                      <?php foreach ($userict as $key => $value) { ?>
                                          <option value="<?= $value['id_pengguna']?>" <?= ($value['nama_pengguna'] == $rrin->assigned) ? 'selected' : '' ?>><?= $value['nama_pengguna'] ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                                <div class="form-group">
                                    <label for="status_request">Status Of Request</label><br>
                                    <select name="status_requestedit" id="status_requestedit" class="form-control">
                                      <option value="" selected disabled >---Option---</option>
                                      <option value="done" <?php if ($rrin->status_request === 'done') echo 'selected'; ?>>Done</option>
                                      <option value="on progress" <?php if ($rrin->status_request === 'on progress') echo 'selected'; ?> >On Progress</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status_pengerjaan">Work Status</label><br>
                                    <select name="status_pengerjaanedit" id="status_pengerjaanedit" class="form-control">
                                      <option value="" selected disabled >---Option---</option>
                                      <option value="complete" <?php if ($rrin->status_pengerjaan === 'complete') echo 'selected'; ?>>Complete</option>
                                      <option value="not complete"<?php if ($rrin->status_pengerjaan === 'not complete') echo 'selected'; ?>>Not Complete</option>
                                      <option value="re-assign"<?php if ($rrin->status_pengerjaan === 're-assign') echo 'selected'; ?>>Re-Assign</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date_approve">Date Complete</label><br>
                                    <input type="date" name="date_completeedit" id="date_completeedit" class="form-control" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date('Y-m-d')?>">
                                </div>
                                <div class="form-group">
                                    <label for="Solusi">Solutions</label><br>
                                    <textarea name="solusiedit" id="solusiedit" rows="10" class="form-control w-100"><?php echo $rrin->solusi?></textarea>
                                </div>
                            </div>
                        <div class="modal-footer">
                        <div class="form-group">
                                <button class="btn btn-success" type="submit" style="float: right;">Simpan</button>
                                </div>
                                <div class="form-group">
                                <button type="button" class="btn btn-danger" style="float: right; margin-right:10px" data-dismiss="modal">Cancel</button>
                                </div>
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