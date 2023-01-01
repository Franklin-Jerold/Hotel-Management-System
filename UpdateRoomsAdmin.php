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
$sql="SELECT * from addrooms where room_no='$update'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);
$Room_no=$rows['room_no'];
$Availability=$rows['availability'];
$Status=$rows['status'];
$Price=$rows['price'];
$BedType=$rows['bedtype'];

if(isset($_POST['submit']))
{	
    $room_no = $_POST['roomnum'];
    $availability = $_POST['availability'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $bedtype=$_POST['bedtype'];
    
    $sql_query = "UPDATE addrooms set room_no='$update',room_no='$room_no',availability='$availability',status='$status',price='$price',bedtype='$bedtype' where room_no='$update'";
    $result=mysqli_query($conn,$sql_query);
     if($result){
        //echo "updated";
        header('location:RoomsAdmin.php');
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
    <title>Admin/Update Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Addemployee.css">
    <link rel="icon" href="images/logo.png" type="image/png">
</head>

<body>
    <header class="header bhover" id="header">
        <div class="head-top">
            <div class="site-name">
                <span>GEEKPROBIN</span>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="Admin.html">Home</a></li>

                </ul>

            </div>
    </header>

    <h1>Update Rooms</h1>

    <div class="container">
        <form method="post" class="row g-3 my-1">
        <div class="col-md-1 form">
                <label for="inputnumber" class="form-label">Room Number</label>
                <input type="number" class="form-control" id="roomnum" name="roomnum" required value=<?php echo "'$Room_no'";?>>
            </div>
            <div class="col-md-2 form">
                <label class="form-label">Availabilty</label>
                <select id="Availabilty" class="form-select" name="availability" required>
                <option selected></option>

                    <option value="Available"
                    <?php
                    if($Availability =='Available'){
                    echo "selected";
                    }
                    ?>
                    >Available</option>

                    <option value="Occupied"
                    <?php
                    if($Availability =='Occupied'){
                    echo "selected";
                    }
                    ?>
                    >Occupied</option>


</select>
            </div>
           
            <div class="col-md-3 form">
                <label class="form-label">Status</label>
                <select id="status" class="form-select" name="status" required>
                <option selected></option>
                
                <option value="Cleaned"
                    <?php
                    if($Status =='Cleaned'){
                    echo "selected";
                    }
                    ?>
                    >Cleaned</option>
                    <option value="Dirty"
                    <?php
                    if($Status =='Dirty'){
                    echo "selected";
                    }
                    ?>
                    >Dirty</option>

                </select>
            </div>

            <div class="col-3 form" id=pricer>
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" placeholder="$" name="price" required value=<?php echo "'$Price'";?>>
            </div>
            
            <div class="col-md-3 form">
                <label class="form-label">Bed Type</label>
                <select id="bedtype" class="form-select" name="bedtype" required>

                <option selected></option>
                    <option value="Single Bed"
                    <?php
                    if($BedType =='Single Bed'){
                    echo "selected";
                    }
                    ?>
                    >Single Bed</option>
                    <option value="Double Bed"
                    <?php
                    if($BedType =='Double Bed'){
                    echo "selected";
                    }
                    ?>
                    >Double Bed</option>


                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-dark" id="submit" name="submit">Update Room</button>
            </div>
        </form>
    </div>
</body>

</html>

