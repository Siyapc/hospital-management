<?php
$conn=mysqli_connect("localhost","root","","hospital_management");
if($conn)
{
    echo "database connected successfully";
}
else 
    echo "database not connected successfully";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $sid=$_POST["sid"];
    $des=$_POST["des"];
    $sql="INSERT INTO `staff` (`first_name`, `last_name`, `staff_id`, `designation`) VALUES ('$fname', '$lname', '$sid', '$des');";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        $insert=true;
    }else{
        echo "The record was not been inserted! ". mysql_error($conn);
    }
}
?>
<!DOCTYPE html>
<head><title>STAFF DETAILS</title>
<style>
h1{
text-align:center;
}
div{
text-align:center;
padding: 40px 40px 40px 40px;
}
body{
background-image:url("staff.jpg");
background-size:1400px 800px;
font-size:150%;
}
</style>
</head>
<html>
<body>
<h1 align='center'>STAFF DETAILS</h1><br>
<div>
<form action="addstaff.php" method="post">
 <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname"><br><br><br>
 <label for="lname">Last name:</label>
  <input type="text" id="lname" name="lname"><br><br><br>
 <label for="sid">Staff id:</label>
  <input type="text" id="sid" name="sid"><br><br><br> 
 <label for="des">Designation:</label>
  <input type="text" id="des" name="des"><br><br><br> 
<input type="submit" value="Submit">
<input type="reset" value="Reset"><br>
</div>
</form>
</body>
</html>
