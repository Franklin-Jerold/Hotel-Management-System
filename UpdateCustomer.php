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
$update=$_GET['updatern'];
$sql="SELECT * from newcustomer where ID_no='$update'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);
       
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

if(isset($_POST['submit']))
{	
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $idname = $_POST['idname'];
    $idnum = $_POST['idnum'];
    $gender =$_POST['gender'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $pendingPay = $_POST['pendingPay'];
    $children = $_POST['children'];
    $room_no = $_POST['roomno'];
    
    $sql_query = "UPDATE newcustomer set ID_no='$update',name='$name',email='$email',phone=' $phone',address='$address',ID='$idname',ID_no=' $idnum',gender='$gender',check_in=
    '$checkin',check_out='$checkout',pendingPay='$pendingPay',children=' $children',room_no='$room_no' where ID_no='$update'";
    $result=mysqli_query($conn,$sql_query);
     if($result){
        //echo "updated";
        header('location:Customerinfo.php');
     }
     else{
        die(mysqli_error($conn));
     }
	 mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBIS/Update Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Customer.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>

<body>
    <header class="header" id="header">
        <div class="head-top">
            <div class="site-name">
                <span>
                    <h6>GEEKPROBIN</h6>
                </span>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="Home.html"><b>Home</b></a></li>

                </ul>
            </div>
    </header>

    <h1>Update Customer</h1>

    <div class="book">
        <form action="" method="post" class="book-form row g-3 my-1">
            <div class="form-item">
                <label for="name">Name: </label>
                <input type="name" id="name" name="name" required value=<?php echo "'$Name'";?>>
            </div>
            <div class="form-item">
                <label for="email">Mail ID: </label>
                <input type="email" class="form-control" id="email" name="email" required value=<?php echo "'$Email'";?>>
            </div>
            <div class="form-item">
                <label for="fa-phone-alt">Phn no: </label>
                <input name="phone"required value=<?php echo "'$Phone'";?>>
            </div>
            <div class="form-item">
                <label for="address">Address: </label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" required value=<?php echo "'$Address'";?>>
            </div>

            <div class="form-item">
                <label for="id">ID: </label>
                <select type="id" id="idname" class="form-select" name="idname">

                    <option value="">Select</option>
                    <option vlaue="Aadhar Card"                    
                    <?php
                    if($IDName =='Aadhar Card'){
                    echo "selected";
                    }
                    ?> 
                    >Aadhar Card</option>

                    <option vlaue="Pan Card"                    
                    <?php
                    if($IDName =='Pan Card'){
                    echo "selected";
                    }
                    ?> 
                     >Pan Card</option>

                    <option vlaue="Voter ID"                    
                    <?php
                    if($IDName =='Voter ID'){
                    echo "selected";
                    }
                    ?> 
                    >Voter ID</option>

                    <option vlaue="Driving License"                    
                    <?php
                    if($IDName =='Driving License'){
                    echo "selected";
                    }
                    ?> 
                    >Driving License</option>
                </select>
            </div>
            <div class="form-item">
                <label for="id">ID no: </label>
                <input type="id" id="nameno" name="idnum" value=<?php echo "'$IDNum'";?>>
            </div>
            <div class="form-item">
                <label for="gender">Gender: </label>

                <select type="id" id="idname" class="form-select" name="gender">
                    <option value="">Select</option>

                    <option value="Male"
                    <?php
                    if($Gender =='Male'){
                    echo "selected";
                    }
                    ?>
                    >Male</option>

                    <option value="Female"
                    <?php
                    if($Gender =='Female'){
                    echo "selected";
                    }
                    ?>
                    >Female</option>

                    <option value="Others"
                    <?php
                    if($Gender =='Others'){
                    echo "selected";
                    }
                    ?>
                    >Others</option>
                </select>
            </div>
            <div class="form-item">
                <label for="checkin-date">Check In Date: </label>
                <input type="date" id="chekin-date" name="checkin" required value=<?php echo "'$CheckIn'";?>>
            </div>
            <div class="form-item">
                <label for="checkout-date">Check Out Date: </label>
                <input type="date" id="checkout-date" name="checkout" required value=<?php echo "'$CheckOut'";?>>
            </div>

            <div class="form-item">
                <label for="adult">Pending Amount: </label>
                <input type="number" min="0" id="pendingPay" name="pendingPay" required value=<?php echo "'$PendingPay'";?>>
            </div>
            <div class="form-item">
                <label for="children">Children: </label>
                <input type="number" min="0" id="children" name="children" required value=<?php echo "'$Children'";?>>
            </div>
            <div class="form-item">
                <label for="rooms">Room Number: </label>
                <input type="number"id="room-no" name="roomno" required value=<?php echo "'$Room_no'";?>>
            </div>

            <div class="form-item">
                <button class="btn btn-outline-danger" id="submit" type="submit" name="submit"><b>Update Customer</b></button>

            </div>
        </form>
    </div>


</body>

</html>