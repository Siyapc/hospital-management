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
    $Pfname=$_POST["Pfname"];
    $Plname=$_POST["Plname"];
    $Patient_id=$_POST["Patient_id"];
    $Gender=$_POST["Gender"];
    $Admission_date=$_POST["Admission_date"];
    $Admission_id=$_POST["Admission_id"];
    $sql="INSERT INTO `patient` (`Pfname`, `Plname`, `Patient_id`, `Gender`, `Admission_date`, `Admission_id`) VALUES ('$Pfname', '$Plname', '$Patient_id', '$Gender', '$Admission_date', '$Admission_id');";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
    $insert=true;
    }else{
    echo "The record was not inserted!".mysql_error($conn);
    }
  }
?>
<!DOCTYPE html>
<head><title>Patient details</title>
<style>
div{
text-align:center;
padding:20px 100px 100px 100px;
margin:20px 350px 400px 350px;
font-size: 28px;
background-color:#add8e6;
}
body{
background-image:url("hospital.jpg");
background-size:1500px 1000px;
}
h1
{
margin:50px 20px 50px 20px;
padding:50px 100px 10px 100px;
font-size: 38px;
background-color:#add8e6;
}
</style>
</head>
<html>
<body>
<h1 align='center'> PATIENT DETAILS</h1><br>
<div>
<form  action="addpatient.php" method="post">
<b>
  <label for="Pfname">First name: </label> 
  <input type="text" id="Pfname" name="Pfname"><br><br>

  <label for="Plname">Last name: </label>
  <input type="text" id="Plname" name="Plname"><br><br>

 <label for="Patient_id">Patient Id : </label>
  <input type="text" id="Patient_id" name="Patient_id"><br><br>

Gender: M<input type="radio" id="Gender" name="Gender" value="Male">
        F<input type="radio" id="Gender" name="Gender" value="Female">
        O<input type="radio" id="Gender" name="Gender" value="Others">
<br><br>
<label for="Admission_date">Admission Date: </label>
  <input type="text" id="Admission_date" name="Admission_date"><br><br>

<label for="Admission_id">Admission Id: </label>
  <input type="text" id="Admission_id" name="Admission_id"><br><br> 

<input type="submit" value="Submit">
<input type="reset" value="Reset">
</b>
</form>
</div>
</body>
</html>