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
    <title>IBIS/Rooms</title>
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
            left:75%;
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
            width: 80%;
            margin-left: 130px;
            border-collapse: collapse;
        }
        .table thead{
            background-color: #ee2828;
        }
        .table thead tr th{
            font-size:17px;
            font-weight: 600;
            letter-spacing: 0.35px;
            color: #FFFFFF;
            opacity: 1;
            padding: 12px;
            vertical-align: top;
            border: 1px solid #dee2e685;
        }
        .table tbody tr td{
            font-size: 16px;
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
    font-size: 13px;
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
        <h1 class="heading">Rooms</h1>

        <div class="searchbar">
            <input type="text" name="search" id="Input" placeholder="Search for Room no..."  onKeyup = "searchFun()">
        </div>

        <!-- TABLE CONSTRUCTION -->
        <table class="table" id="Table">
            <thead>
            <tr>
                <th>Room Number</th>
                <th>Availability</th>
                <th>Status</th>
                <th>Price</th>
                <th>Bed Type</th>
                <th>Operations</th>
               

            </tr>
            </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->

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
            <button class="btn btn-primary"><a href="UpdtateRoomsManager.php?updatern='.$Room_no.'" class="text-light">Update</a></button>
            </td>
          </tr>';
        }
       
    }
    ?>
            </tbody>
        </table>
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