<?php
 require_once('init/index.php');

require_once('view/header.php');


if( isset($_SESSION["nama"])){  
  require_once('view/subheader.php');
}
?>
    <style>
      #map {
        height: 550px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
        position: fixed;
       }
    </style>
    <title>Maps </title>

    <?php
  
    if( isset($_SESSION["nama"])){
      require_once('sidebar.php');
    }
    ?>

        <!-- page content -->
        <div class="right_col" role="main">

          <br />
          <div id="map"></div>
          <div id="wrapper-map"></div>
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
      var uluru = {lat: -25.363, lng: 131.044};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
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
      }
      
      marker.addListener('click', function(e){
        infowindow.setContent(`
          <div>
            <h1>${this.name}</h1>
            <img src="upload/${this.gambar}" width="300px" />
            <p >${this.deskripsi}</p>
          </div>
          
          `);
        infowindow.open(map, this);
        console.log(this);
      })

    }
    </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjD7YeXktbJRYkaw-aHUfu9nmD5MAZsvI&callback=initMap"
    async defer></script>

<? require_once('view/footer.php');?>
    