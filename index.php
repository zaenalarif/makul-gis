<?php
require_once('init/index.php');

require_once('view/header.php');


if( isset($_SESSION["nama"])){  
  require_once('view/subheader.php');
}
?>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <style>
     .background{
       height: 150px;
       background-image: linear-gradient(to right, #2a1d6b, #40c9c9);
       
     }
     .background > h1 {
       color: white;
       text-align: center;
       font-family: 'Poppins', sans-serif;
       margin-bottom : 0px;

     }
     .background > p {
       margin : 0px;
       padding: 0px;
       margin-left: 55px;
       color: white;
       font-size: 20px;
       font-family: 'Poppins', sans-serif;
     }
      #map {
        height: 500px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
        position: fixed;
       }
    </style>
    <title>Maps </title>

    <?php
  
    if( isset($_SESSION["nama"])){?>
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

    <?php } ?>
    ?>

        <!-- page content -->
        <a href="login.php" style="width:50%; margin: 0 auto;">Login</a>
        <div class="right_col" role="main">
          <?php if( !isset($_SESSION['nama'])){?>
            <div class="background">
              <h1>SIG Pemetaan Lokasi Tempat Olahraga di akbupaten kudus Kecamatan Kota</h1>
              <p>Nama : Zainal Arifin</p>
              <p>NIM  : 201751044</p>
              <p>Kelas 4B</p>
            </div>  
            <?php } ?>
          
          <br />
          <div id="map"></div>
          <div id="wrapper-map"></div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        
      </div>
    </div>
    <?php
      $location = [];
      $result = getTempat();
        while($row = mysqli_fetch_assoc($result)){ 
            $nama       = $row['nama'];
            $deskripsi  = $row['deskripsi'];
            $longtitude = $row['longtitude'];
            $langtitude = $row['langtitude'];
            $gambar       = $row['gambar'];

            $location[] = ['name' => $nama, 'deskripsi' => $deskripsi, 'lat' => $langtitude, 'lng' => $longtitude, 'gambar' => $gambar ];

        }
        $markers = json_encode($location); 
    // ?>
   
    <script>
      <?php
        echo "var markers=$markers";
        echo "\n";
      ?>

    function initMap() {
      var uluru = {lat: -6.8086921, lng: 110.8403742};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: uluru
      });
    
      var infowindow = new google.maps.InfoWindow();
      var json= markers;

      for (var o in json){
        lat           = json[o].lat;
        lng           = json[o].lng;
        name          = json[o].name;
        deskripsi     = json[o].deskripsi;
        gambar        = json[o].gambar;

          marker = new google.maps.Marker({
            
            position: {lat : parseFloat(lat), lng : parseFloat(lng)},
            name: name,
            deskripsi : deskripsi,
            gambar: gambar,
            map: map
          })

          marker.addListener('click', function(e){
          infowindow.setContent(`
            <div>
              <h4>${this.name}</h4>
              <img src="upload/${this.gambar}" width="200px" height="100px"; />
              <p >${this.deskripsi}</p>
            </div>
            `);
          infowindow.open(map, this);
          console.log(this);
        })

      }
      
      

    }
    </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjD7YeXktbJRYkaw-aHUfu9nmD5MAZsvI&callback=initMap"
    async defer></script>

<?php require_once('view/footer.php');?>
    