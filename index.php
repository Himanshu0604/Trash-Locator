
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
                <li class="loud"><a href="index.php">Dashboard</a></li>
                <li class="loud"><a href="about.php">About</a></li>
                <li class="loud"><a href="upload_images.php">Upload</a></li>
                <li class="loud"><a href="logout.php">Logout</a></li>
                
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
        header("Location: login.php");
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
            //$sa=$row['sa'];
            /* Each row is added as a new array */
            $locations[]=array( 'name'=>$name, 'lat'=>$latitude, 'lng'=>$longitude, 'area'=>$area/*, 'sa'=>$sa*/ );
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
            '<p>Name: <?php echo $locations[$i]['name'];?> <br> Longitude: <?php echo $locations[$i]['lng'];?> <br> Latitude: <?php echo $locations[$i]['lat'];?> <br> Area: <?php echo $locations[$i]['area'];?>   </p>',
            <?php echo $locations[$i]['lat'];?>,
            <?php echo $locations[$i]['lng'];?>,
            <?php echo $locations[$i]['area'];?>,
            0
        ]<?php if($j!=sizeof($locations))echo ","; }?>
    ];
    var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);

    function initialize() {
      var mapOptions = {
        zoom: 5,
        center: origin,
        

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
                icon: 'http://maps.google.com/mapfiles/ms/icons/'+color+'-dot.png'

            });
        

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][1]);
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
        <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/classie.js"></script>
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/jqBootstrapValidation.js"></script>
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/contact_me.js"></script>


<span style="height: 20px; width: 40px; min-height: 20px; min-width: 40px; position: absolute; opacity: 0.85; z-index: 8675309; display: none; cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAUCAYAAAD/Rn+7AAADU0lEQVR42s2WXUhTYRjHz0VEVPRFUGmtVEaFUZFhHxBhsotCU5JwBWEf1EWEEVHQx4UfFWYkFa2biPJiXbUta33OXFtuUXMzJ4bK3Nqay7m5NeZq6h/tPQ+xU20zugjOxR/+7/O8539+5znnwMtNTExwJtMb3L/fiLv3botCSmUjeCaejTOb39AiFothfHxcFIrHY8RksZjBsckJcOIRMfFsHD/SsbExUYpnI8DR0dGUGjSb0byhEJp5Uqg5CTSzc2CQleJbMEj9/ywBcGRkJEk9DQqouEVQT1sK444yWI9UonmTjGqauVLEIlHa9x8lAMbj8SSpp0rwKGMVvg8P46vbg0C7na8z8JsMcgHe7jlEa+edRhiLy8n/TUMfu6EvLElk+U0WtGwrTrdfAGQf5J8iiK4LVzDU28t8JtMSocf8E+l68myaNFXm/6rXslLK7ay5TOunuRvZWpJuvwAYjUaTpOIWoquuAZ219RTaxKYp9BbjycoN5FvL9qH9TBX5rvoGdJythvXYSTxdtRnWylO/ZdqrLsGwszzhWQ593z2KlAwCYCQSSZJ6ehZ0W7bD9VBLgN0NCqr3qR7R2rBrL3pu3Sb/7nDlz2uy6cG0OXk0GTbZXzNp8trsPAQdTj6frlWzN2DcXZGKQQAMh8NJ6rpyHe+PnkCr/CAFdZyvpfpjuvkifLF9wIt1Wwlo0OHie1RvWrKa93RjzfzliTzPKz3ltB0/Tevmwp14wGUgHAzSOoUEwFAolFaaBSuhnslPRkJexUJtZ6v5HtUeLswl33n1BgEY5fvhs9sJ3FAiT+QYyyvoAQJuD0KBAFRTJNAuz5/s3gJgMBhMJwrVFRThM5tY5zUF/A4X1f2fvQTRLCuBreoim0YmAbqNJryvPEXeeq46kaNdkQ/1HCncbJKPs9ZSv2VHGfWsZ2hfkhKAfr8/pdxWKx4wwD69PmVfNSOL+lr2w+gYqHpWDtXt1xQ8AMlWU0e1lqLd/APRHoP8AJqWrQG9gYxcPMsvSJUvAA4MDKTUJ7MZLaVy8v+qT21tcDx/OemePr0RTkNrur4A6PP5xCgBsL+/X4wiQDpuuVxOeL1eMYmYeDY6sOp0z+B0OuHxeEQhxkJMFosJiSO/UinOI/8Pc+l7KKArAT8AAAAASUVORK5CYII=);"></span>
    </html>
    
