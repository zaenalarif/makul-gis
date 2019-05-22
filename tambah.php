<?php
require_once('init/init.php');
// $target_dir = "uploads/";
// $gambar = $target_dir . basename($_FILES["gambar"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($gambar,PATHINFO_EXTENSION));

if(isset($_POST['tambah'])){
  $nama_tempat = $_POST['nama_tempat'];
  $deskripsi   = $_POST['deskripsi']  ;
  $longtitude  = $_POST['longtitude'] ;
  $langtitude  = $_POST['langtitude'] ;
  
  $dir = 'upload/';
  $gambar   =$_FILES['gambar']['name'];
  $temp_name = $_FILES['gambar']['tmp_name'];
  if(!empty(trim($nama_tempat)) && !empty(trim($deskripsi)) && !empty(trim($longtitude)) && !empty(trim($langtitude)) ){
      if($gambar != ""){
        if(file_exists($dir.$gambar)){
          $gambar = time() . '_' . $gambar;
        }
          $fdir = $dir.$gambar;
          move_uploaded_file($temp_name,$fdir);
            if(tambahtempat($nama_tempat,$deskripsi,$longtitude,$langtitude,$gambar)){
              header('Location: list.php ');
            }else{
              die('gagal');
            }
        }else{
          
        }
  }else{
    die('ada yang kosong');
  }
}

?>
<?php require_once('view/header.php'); ?>
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

<?php require_once('view/subheader.php');
   require_once('sidebar.php'); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Elements</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Tempat</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama-tempat">Nama Tempat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_tempat" id="nama-tempat" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deskripsi">Deskripsi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="deskripsi" class="form-control col-md-7 col-xs-12" id="deskripsi" cols="30" rows="10"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="longtitude" class="control-label col-md-3 col-sm-3 col-xs-12">Langtitude</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="longtitude" name="longtitude" class="form-control col-md-7 col-xs-12" type="text" name="langtitude">
                        </div>
                      </div>          
                      <div class="form-group">
                        <label for="langtitude" class="control-label col-md-3 col-sm-3 col-xs-12">longtitude</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="langtitude" name="langtitude" class="form-control col-md-7 col-xs-12" type="text" name="longtitude">
                        </div>
                      </div>             
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">gambar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" name="gambar" class="date-picker form-control col-md-7 col-xs-12" required="required" type="file">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->


  <?php require_once('view/footer.php');?>