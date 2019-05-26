<?php
require_once('init/init.php');
// $target_dir = "uploads/";
// $gambar = $target_dir . basename($_FILES["gambar"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($gambar,PATHINFO_EXTENSION));

if(isset($_POST['tambah'])){
  $nama_tempat = $_POST['nama_tempat'];
  $deskripsi   = $_POST['deskripsi']  ;
  $urlmaps     = $_POST['urlmaps'] ;

  $langlong   = explode("/", $urlmaps);
  $at         = explode("@", $langlong[6]);
  $lalo       = explode(",", $at[1]);

  $langtitude = $lalo[0];
  $longtitude = $lalo[1];
  
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
            if(tambahtempat($nama_tempat,$deskripsi,$longtitude,$langtitude,$gambar,$urlmaps)){
              header('Location: list.php ');
            }else{
              echo 'gagal';
            }
        }else{
          echo 'gagal menambahkan foto';
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

<?php require_once('view/subheader.php');?>

<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="upload/admin.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2><?= $_SESSION["nama"] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"> Maps </a>
                  </li>
                </ul>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tambah.php">Tambah Tempat</a></li>
                      <li><a href="list.php">list Tempat</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="upload/admin.png" alt=""><?= $_SESSION["nama"];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->


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
                        <label for="longtitude" class="control-label col-md-3 col-sm-3 col-xs-12">URL maps</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="longtitude" name="urlmaps" class="form-control col-md-7 col-xs-12" type="text">
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