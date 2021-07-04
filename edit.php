<?php
include_once 'db.php';
if(count($_POST)>0) {
mysqli_query($con,"UPDATE location set  status='" . $_POST['status'] .  "' WHERE id='" . $_GET['id'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($con,"SELECT * FROM location WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="update.php">List</a>
</div>

<input type="text" name="status" class="txtField" value="<?php echo $row['status']; ?>">

<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>