<?php
$conn=mysqli_connect("localhost","root","","hospital_management");
if(!$conn)
{
    echo  "database not connected successfully". mysqli_error($conn);
}

if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    // echo $pid;
    $sql = "DELETE FROM `patient` WHERE `patient`.`Patient_id` = `$pid`";
    if(mysqli_query($conn,$sql)){
        echo "The record was deleted!";
    }else{
        echo "The record was not deleted!".mysqli_error();
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $pid = $_POST['pid'];
//     echo $pid;
//     $sql = "DELETE FROM `patient` WHERE `patient`.`Patient_id` = `$pid`";
//     mysqli_query($conn,$sql);
//     if(mysqli_query($conn,$sql)){
//         echo "The record was deleted!";
//     }else{
//         echo "The record was not deleted!".mysqli_error();
//     }
  }

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Staff</title>
    <style>
        div {

            font-size: 30px;
            font-weight: bold;
            padding: 50px 200px 200px 200px;
            color: rgb(12, 12, 17);
            text-align: center;
        }

        body {
            background-color: black;
            background-image: url("hospital.jpg");
            background-size: 1500px 1000px;
            margin: 50px 50px 50px 50px;
            padding: 50px 50px 50px 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="deletepatient.php" method="post">
        <div>
            Patient ID:<input type="text" name="pid" id="pid"><br><br>
            <input type="submit" value="Submit" id="btnsub">
            <input type="reset" value="Reset"><br>
        </div>
    </form>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th>SNO</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Patient id</th>
                <th>Gender </th>
                <th>Admission Date </th>
                <th>Admission ID </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql ="SELECT * FROM `patient`";
                $result = mysqli_query($conn,$sql);
                $Sno =0;
                // fetch 
                while($row = mysqli_fetch_assoc($result))
                { 
                    $Sno = $Sno + 1;
                    echo"<tr>
                    <th scope = 'row'>".$Sno."</th>
                    <td>".$row['Pfname']."</td>
                    <td>".$row['Plname']."</td>
                    <td>".$row['Patient_id']."</td>
                    <td>".$row['Admission_date']."</td>
                    <td>".$row['Admission_id']."</td>
                    </tr>"; 
                }
            ?>
        </tbody>
    </table>
</body>
<html>