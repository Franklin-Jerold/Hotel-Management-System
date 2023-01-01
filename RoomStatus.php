<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin/Add Rooms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Addrooms.css">
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

    <h1>Add Rooms</h1>

    <div class="container">
        <form action=" " method="POST" class="row g-3 my-1">
            <div class="col-md-2 form">
                <label for="inputnumber" class="form-label">Room Number</label>
                <input type="text" class="form-control" id="roomnum" name="roomnum" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark" id="submit" name="search">Add Room</button>
            </div>
        </form>



<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'dmbs123');


if(isset($_POST['search'])){
    $room_no = $_POST['roomnum'];
    
   

    $query = "SELECT * FROM addrooms where room_no='$room_no' ";
    $query_run = mysqli_query($connection,$query);

    while($rows = mysqli_fetch_array($query_run))
    {
        ?>
         <form action=" " method="POST" class="row g-3 my-1">
         <div class="col-md-3 form">
                <label class="form-label">Availabilty</label>
                <select id="Availabilty" class="form-select" name="availability" required>

                    <option selected><?php echo $rows['availability'] ?></option>
                    <option>Available</option>
                    <option>Occupied</option>

                </select>
            </div>
            <div class="col-md-3 form">
                <label class="form-label">Status</label>
                <select id="status" class="form-select" name="status" required>

                <option selected><?php echo $rows['status'] ?></option>
                    <option>Clean</option>
                    <option>Dirty</option>

                </select>
            </div>
    <div class="col-12">
            <?php echo'
                <button class="btn btn-dark"><a href="UpdateRoomStatus.php?deletern='.$room_no.'" class="text-light">Update</a></button>'?>
            </div>
        </form>
    </div>
</body>

</html>

<?php

    } 
}
    ?>
   

           

           