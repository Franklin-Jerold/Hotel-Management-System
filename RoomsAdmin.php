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
    <title>Admin/Rooms</title>
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
            width: 70%;
            margin-left: 130px;
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        td {
            background-color: #ffff;
            border: 1px solid black;
        }

        th{
            background-color: #ee2828;
        }
        td {

            font-size:17px;
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
        a:link {
    color: black;
    background-color: ;
    text-decoration:none;
    
    font-weight: bold;
    font-size: 13px;
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
<h1 class="heading">Rooms</h1>

<div class="searchbar">
    <input type="text" name="search" id="Input" placeholder="Search for Room..."  onKeyup = "searchFun()">
</div>
    
        <table class="table" id="Table">
  <thead>
    <tr>
      <th scope="col">Room_no</th>
      <th scope="col">Availability</th>
      <th scope="col">Status</th>
      <th scope="col">Price</th>
      <th scope="col">Bed Type</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * from addrooms ORDER BY room_no ASC ";
    $result=mysqli_query($conn,$sql);
    if($result){
        while($rows=mysqli_fetch_assoc($result)){
            
            $Room_no=$rows['room_no'];
            $Availability=$rows['availability'];
            $Status=$rows['status'];
            $Price=$rows['price'];
            $BedType=$rows['bedtype'];
           
            echo '<tr>
            <td scope="row">'.$Room_no.'</td>
            <td>'.$Availability.'</td>
            <td>'.$Status.'</td>
            <td>'.$Price.'</td>
            <td>'.$BedType.'</td>
            <td>
            <button class="btn btn-primary"><a href="UpdateRoomsAdmin.php?updatern='.$Room_no.'" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="DeleteRooms.php?deletern='.$Room_no.'" class="text-light">Delete</a></button>
            </td>
          </tr>';
        }
       
    }
    ?>

                    </tbody>
                </table>
            </div>
        </section>

        <script>
    
const searchFun = () => {
    let filter = document.getElementById('Input').value.toUpperCase();

    let Table = document.getElementById('Table');

    let tr = Table.getElementsByTagName('tr');

    for (var i = 0; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName('td')[0];


        if (td) {
            let textValue = td.textContent || td.innerHTML;

            if (textValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }

        }
    }

}


   </script>
    </body>
</html>