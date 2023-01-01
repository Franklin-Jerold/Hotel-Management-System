<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="dmbs123";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin/Employee</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    
    <style>
         body{
            background-color: #c0c0c0;
            font-family: sans-serif;
        }
        .searchbar{
            position: absolute;
            left:83%;
            bottom:86.5%;
            transform: translate(-50%, -50%);
        }
        input{
            border: 3px solid #32e17c;
            height: 40px;
            width: 200px;
            border-radius: 50px;
            font-size: 15px;
            text-align:center;
        }
        
        .heading{
            font-size: 40px;
            text-align: center;
            margin-bottom: 40px;
        }
    
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

       

        th{
            font-size:16px;
            font-weight: 600;
            letter-spacing: 0.35px;
            background-color: #ee2828;
        }
        td {
            background-color: #ffff;
            font-size: 16px;
            letter-spacing: 0.35px;
            padding: 8px;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            font-style:italic;
            font:weight: bold;
        }

        td {
            font-weight: lighter;
        }
        a:link {
    color: black;
    background-color: ;
    text-decoration:none;
    
    font-weight: bold;
    font-size: 12px;
    letter-spacing: 0px;
}
a:hover {
    color: red;
    background-color: transparent;
}
button{
    border-radius:500px;
}

    </style>
</head>
<body>
<section>
<h1 class="heading">Employee Details</h1>

<div class="searchbar">
    <input type="text" name="search" id="Input" placeholder="Search for Name..."  onKeyup = "searchFun()">
</div>
    
        <table class="table" id="Table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Gender</th>
      <th scope="col">Contact</th>
      <th scope="col">Address</th>
      <th scope="col">Department</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * from addemployee ORDER BY emp_id ASC ";
    $result=mysqli_query($conn,$sql);
    if($result){
        while($rows=mysqli_fetch_assoc($result)){
            
            $ID=$rows['emp_id'];
            $Name=$rows['name'];
            $Age=$rows['age'];
            $Gender=$rows['gender'];
            $Contact=$rows['contact'];
            $Address=$rows['address'];
            $Department=$rows['department'];
            echo '<tr>
            <td scope="row">'.$ID.'</td>
            <td>'.$Name.'</td>
            <td>'.$Age.'</td>
            <td>'.$Gender.'</td>
            <td>'.$Contact.'</td>
            <td>'.$Address.'</td>
            <td>'.$Department.'</td>
            <td>
            <button class="btn btn-primary"><a href="Updateemployee.php?updatern='.$ID.'" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="Deleteemployee.php?deletern='.$ID.'" class="text-light">Delete</a></button>
            </td>
          </tr>';
        }
       
    }
    ?>

                    </tbody>
                </table>
            </div>
        </section>

        <script src="searchbar.js"></script>
    </body>
</html>