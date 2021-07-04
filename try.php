
<html>
<head><meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">  </head>

<header>
<nav>
          <ul class="nav">
                <li class="loud"><a href="try.php">Dashboard</a></li>
                <li class="loud"><a href="about.php">About</a></li>
                <li class="loud"><a href="logout.php">Logout</a></li>
                <li class="loud"><a href="update.php">Update</a></li>
                
          </ul>
     </nav>     
          
        
    </header>
           
<h1>
    <link rel="stylesheet" href="css/ss.css" type="text/css">
    <script src="js/nav.js"></script>
<style type="text/css">    
 
#map-canvas{
    height: 85%;
    width: 90%;
    margin-left: 5%;
    margin-right: 5%;
    margin-top: 0px;
    margin-bottom: 10px;
    position: relative;
    overflow: auto;
      display: flex;
  flex-wrap: wrap;
  justify-content: center;
}
body {
            background: url(background.jpeg)no-repeat center center fixed;

      height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        }

</style>


<div id="map-canvas">
<?php
        session_start();
        if(!isset($_SESSION["username"])){
        header("Location: admin.php");
        exit(); }
        $locations=array(); 
        require('db.php');
        $query =  $con->query("SELECT * FROM location");
        //$number_of_rows = mysql_num_rows($db);  
        //echo $number_of_rows;

        while( $row = $query->fetch_assoc() ){
            $name = $row['name'];
            $longitude = $row['longitude'];                              
            $latitude = $row['latitude'];
            $area=$row['area'];
            $status=$row['status'];
            //$sa=$row['sa'];
            /* Each row is added as a new array */
            $locations[]=array( 'name'=>$name, 'lat'=>$latitude, 'lng'=>$longitude, 'area'=>$area, 'status'=>$status );
        }
       


        //echo $locations[0]['name'].": In stock: ".$locations[0]['lat'].", sold: ".$locations[0]['lng'].".<br>";
        //echo $locations[1]['name'].": In stock: ".$locations[1]['lat'].", sold: ".$locations[1]['lng'].".<br>";
    ?>


    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBYCqKVjkXLHBZ1b_NEX-OO2FQln2g7AKc&region=IN"></script> 


    <script type="text/javascript">
    var map;
    var Markers = {};
    var infowindow;
    
    var locations = [
        <?php for($i=0;$i<sizeof($locations);$i++){ $j=$i+1;?>
        [
            'Trash locator',
            '<p>Name: <?php echo $locations[$i]['name'];?>  <br> Longitude: <?php echo $locations[$i]['lng'];?> <br> Latitude: <?php echo $locations[$i]['lat'];?> <br> Area: <?php echo $locations[$i]['area'];?> <br> status: <?php echo $locations[$i]['status'];?> <br> Direction: <a href="http://maps.google.co.uk/maps?q=<?php echo $locations[$i]['lat'];?>,<?php echo $locations[$i]['lng'];?>"> View on Google maps </a>  </p>',
            <?php echo $locations[$i]['lat'];?>,
            <?php echo $locations[$i]['lng'];?>,
            <?php echo $locations[$i]['area'];?>,
            0
        ]<?php if($j!=sizeof($locations))echo ","; }?>
    ];
    var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);

    function initialize() {
      var mapOptions = {
        zoom: 4,
        center: new google.maps.LatLng(51.508742,-0.120850),
        

      };


      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        infowindow = new google.maps.InfoWindow();


        for(i=0; i<locations.length; i++) {
            var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
        if (locations[i][4]<100) {
            var color = 'green'; 
        }
                else if(locations[i][4]>=100 && locations[i][4]<200 )
        {
                var color = 'orange'; 
        }

        else if(locations[i][4]>=200)
        {
                var color = 'red'; 
        }
            var marker = new google.maps.Marker({
                position: position,
                map: map,
                icon: 'http://maps.google.com/mapfiles/ms/icons/'+color+'-dot.png',


            });
      

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][1] );
                    infowindow.setOptions({maxWidth: 200 });
                    infowindow.open(map, marker);
                    
                }
            }) (marker, i));
            Markers[locations[i][5]] = marker;
        }

        locate(0);

    }


    function locate(marker_id) {
        var myMarker = Markers[marker_id];
        var markerPosition = myMarker.getPosition();
        map.setCenter(markerPosition);
        google.maps.event.trigger(myMarker, 'click');

    }

    google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</h1>
</div> 

    <body >



    </body>
 
    </html>
    
