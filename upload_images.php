<!DOCTYPE html>
<html lang="en">
<head>
    <title>TRASH LOCATOR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
</head>
<header>
          <ul class="nav">
                <li class="loud"><a href="index.php">Dashboard</a></li>
                <li class="loud"><a href="about.php">About</a></li>
                <li class="loud"><a href="upload_images.php">Upload</a></li>
                <li class="loud"><a href="logout.php">Logout</a></li>
                
          </ul>
     </nav>   
            </header>
            <link rel="stylesheet" href="css/ss.css" type="text/css">
<style type="text/css">
    body {
            background: url(background.jpeg)no-repeat center center fixed;

      height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        }

           #con {
            margin-top: 0%;
 background-color: #1D1F20; 
    
    
        font-family: 'Raleway', sans-serif;
    color: #F2F2F2;
}
#head{
    background-color: #1A1C1D;
    margin-bottom: 0%;
        margin-left: 5%;
    margin-right: 5%;
        font-family: 'Raleway', sans-serif;
    color: #F2F2F2;
}
#uploadImageBtn {
    padding: 6px 25px;
    background: #373E4A;
    color: #C1C3C6;
    font-weight: bold;
    border: 0 none;
    cursor: pointer;
    border-radius: 3px;
}
</style>            
<body>
<div class="jumbotron text-center" id="head">
    <h1>Upload Multiple Images on TRASH LOCATOR</h1>
    <p>Want local authorities to pick trash near you then upload some of its images !</p>
</div>
<div class="container" id= "con">
    <form action="upload-script.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="name" required style=" color: #020812 " />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="longitude" placeholder="longitude" required style=" color: #020812 "  />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="latitude" placeholder="latitude" required style=" color: #020812 " />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="Complaint" placeholder="Complaint" style="height: 100px; color: #020812 " />
                    </div>
                </div>
               <div class="col-md-4">
                   <div class="form-group">
                       <input type="file" name="imageFile[]" required multiple class="form-control">
                   </div>
               </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="submit" name="uploadImageBtn" id="uploadImageBtn" value="Upload Images(min 4)" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <?php
        // fetch Images
        $i = 1;
        include "db.php";
        $queryGetImg = "SELECT * FROM images";
        $resultImg = $con->query($queryGetImg);
        if ($resultImg->num_rows > 0 ){
            while ($row = $resultImg->fetch_object()){ ?>
                <div class="col-sm-3">
                    <h3>Image <?php echo $i;?></h3>
                    <img src="<?php echo 'uploads/'.$row->file_name;?>" width="270" height="180" object-fit: cover/>
                </div>
           <?php $i++;
            }
        }
        ?>
    </div>
</div>
</body>
</html>