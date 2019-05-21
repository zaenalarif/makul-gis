<?php
require_once('init/init.php');
$result = getTempat();
?>

<?php require_once('view/header.php');?>
    <title>Daftar tempat</title>
    <style>
        .gambar-table{
            width: 50px;
        }
    </style>
<?php require_once('view/subheader.php');?>
<?php require_once('sidebar.php');?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Tempat</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Deskripsi</th>
                          <th>langtitude</th>
                          <th>longtitude</th>
                          <th>gambar</th>
                          <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)):?>
                        <tr>
                          <td><?= $row['nama']?></td>
                          <td><?= $row['deskripsi']?></td>
                          <td><?= $row['longtitude']?></td>
                          <td><?= $row['langtitude']?></td>
                          <td>
                            <img src="upload/<?= $row['gambar'] ?>" alt="<?= $row['gambar'] ?>" class="gambar-table">
                          </td>
                          <td>
                            <a href="edit.php?id=<?= $row['id'];?>"  class="btn btn-primary">Edit</a>
                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a>
                          </td>
                        </tr>
                        <?php endwhile;
                             }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>


<? require_once('view/footer.php'); ?>