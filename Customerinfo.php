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
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IBIS/Customer Info</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    
    
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #ffff;
            font-family: sans-serif;
        }

        .searchbar{
            position: absolute;
            left:87%;
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

        section{
            padding:0 10%;
            margin: 40px auto 0;
        }
        .heading{
            font-size: 40px;
            text-align: center;
            margin-bottom: 40px;
        }
        .table {
            width:123.5%;
            margin-left: -145px;
            border-collapse: collapse;
        }
        .table thead{
            background-color: #ee2828;
        }

        .table thead tr th{
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.35px;
            color: #FFFFFF;
            opacity: 1;
            padding: 10px;
            vertical-align: top;
            border: 1px solid #dee2e685;
        }
        .table tbody tr td{
            font-size: 14px;
            letter-spacing: 0.35px;
            font-weight: normal;
            color: #f1f1f1;
            background-color: #3c3f44;
            padding: 8px;
            text-align: center;
            border: 1px solid #dee2e685;
        }
        a:link {
    color: black;
    background-color: ;
    text-decoration:none;
    
    font-weight: bold;
    font-size: 14px;
    letter-spacing: 0px;
}
a:hover {
    color: red;
    background-color: transparent;
}
button{
    border-radius:500px;
    width:60px;
}
       
    </style>
</head>

<body>
    <section>
        <h1 class="heading">Customer Info</h1>

        <div class="searchbar">
            <input type="text" name="search" id="Input" placeholder="Search for name..."  onKeyup = "searchFun()">
        </div>

        <!-- TABLE CONSTRUCTION -->
        <table class="table" id="Table">
            <thead>
            <tr>
                
                 <th>Name</th>
                <th>Email</th>
                <th>Phone_no</th>
                <th>Address</th>
                <th>ID</th>
                <th>ID_no</th>
                <th>Gender</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Pending Amount</th>
                <th>Children</th>
                <th>Room_no</th>
                <th>Operations</th>
               

            </tr>
            </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->

            <tbody>
            
            <?php
    $sql="SELECT * from newcustomer ORDER BY name ";
    $result=mysqli_query($conn,$sql);
    if($result){
        while($rows=mysqli_fetch_assoc($result)){
            
           
    $Name = $rows['name'];
    $Email = $rows['email'];
    $Phone = $rows['phone'];
    $Address = $rows['address'];
    $IDName = $rows['ID'];
    $IDNum = $rows['ID_no'];
    $Gender =$rows['gender'];
    $CheckIn = $rows['check_in'];
    $CheckOut = $rows['check_out'];
    $PendingPay = $rows['pendingPay'];
    $Children = $rows['children'];
    $Room_no = $rows['room_no'];
           
            echo '<tr>
            <td>'.$Name.'</td>
            <td>'.$Email.'</td>
            <td>'.$Phone.'</td>
            <td>'.$Address.'</td>
            <td>'.$IDName.'</td>
            <td>'.$IDNum.'</td>
            <td>'.$Gender.'</td>
            <td>'.$CheckIn.'</td>
            <td>'.$CheckOut.'</td>
            <td>'.$PendingPay.'</td>
            <td>'.$Children.'</td>
            <td>'.$Room_no.'</td>
            <td>
            <button class="btn btn-primary"><a href="UpdateCustomer.php?updatern='.$IDNum.'" class="text-light">Update</a></button>
            </td>
          </tr>';
        }
       
    }
    ?>
            </tbody>
        </table>
    </section>


   
   <script src="searchbar.js"></script>
</body>

</html>