<?php
include_once 'db.php';
$result = mysqli_query($con,"SELECT * FROM location");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrive data</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
 </head>
 <header>
<nav>
          <ul class="nav">
                <li class="loud"><a href="try.php">Dashboard</a></li>
                <li class="loud"><a href="about.php">About</a></li>
                <li class="loud"><a href="logout.php">Logout</a></li>
                <li class="loud"><a href="update.php">Update</a></li>
                
          </ul>
     </nav>     
          
  <style type="text/css">
     table{
      width: 90%;
      border-collapse: collapse;
      color: black;
      border: 1px solid black;
      margin-top: 10px;
     }
     td{
       border: 1px solid black;
     } 

  </style>      
    </header>
    <link rel="stylesheet" href="css/ss.css" type="text/css">
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
    <tr>
      <td>Id</td>
    <td>Name</td>
    <td>Status</td>

    </tr>
      <?php
      $i=0;
      while($row = mysqli_fetch_array($result)) {
      ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["status"]; ?></td>

    <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Update</a></td>
      </tr>
      <?php
      $i++;
      }
      ?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>