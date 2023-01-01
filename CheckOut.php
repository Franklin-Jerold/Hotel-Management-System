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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBIS/Check Out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CheckOut.css">
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
                    <li><a href="Home.html">Home</a></li>

                </ul>

            </div>
    </header>


    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row">

                <div class="col-lg-7">

                    <h2>Check Out</h2>
                    <form action=" " method="POST" class="form-top">
                        <div class="form-row">
                            <div class="col-md-6 form">
                                <label for="name" class="form-label"></label>
                                <select id="name" class="form-select" name="name">
                                    <option selected>Select Name</option>
                                    <?php
                         $sql="SELECT * from newcustomer";
                         $result=mysqli_query($conn,$sql);
                        if($result){
                             while($rows=mysqli_fetch_assoc($result)){
            
                                 $name=$rows['name'];
                                echo '<option>'.$name.'</option>';
                              }
       
                             }
                            ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark" id="submit" name="search">Check</button>
                            </div>
                    </form>



                    <?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'dmbs123');


if(isset($_POST['search'])){
    $name = $_POST['name'];
    
   

    $query = "SELECT * FROM newcustomer where name='$name' ";
    $query_run = mysqli_query($connection,$query);

    while($rows = mysqli_fetch_array($query_run))
    {
        $Name=$rows['name'];
        $Room_no=$rows['room_no'];
        $ID=$rows['ID_no'];
        $Email=$rows['email'];
        $Phone= $rows['phone'];
        $PendingPay=$rows['pendingPay'];
        $CheckIn=$rows['check_in'];
        $CheckOut=$rows['check_out'];

        ?>
                    <form action=" " method="POST" class="form-bottom">

                        <div class="col-md-5 form">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" id="name" name="name" required value=<?php echo "'$Name'" ; ?> >
                        </div>

                        <div class="col-md-5 roomnum ">
                            <label for="id">Room Number</label>
                            <input type="number" id="roomnum" name="roomnum" required value=<?php echo "'$Room_no'" ;
                                ?>>
                        </div>

                        <div class="col-md-5 idnum">
                            <label for="id">ID No </label>
                            <input type="id" id="nameno" name="idnum" required value=<?php echo "'$ID'" ; ?>>
                        </div>

                        <div class="col-md-3 email">
                            <label for="mail">Mail</label>
                            <input type="email" id="email" name="email" required value=<?php echo "'$Email'" ; ?>>
                        </div>

                        <div class="col-md-5 form phone">
                            <label for="phno">Phone Number</label>
                            <input type="phone" id="phone" name="phone" required value=<?php echo "'$Phone'" ; ?>>
                        </div>

                        <div class="col-md-5 checkin">
                            <label for="checkin-date">Check In Date </label>
                            <input type="date" id="chekin-date" name="checkin" value=<?php echo $CheckIn;?>>
                        </div>

                        <div class="col-md-5 checkout">
                            <label for="checkout-date">Check Out Date </label>
                            <input type="date" id="chekout-date" name="checkout" value=<?php echo "'$CheckOut'" ;?> >
                        </div>
                        <div class="col-md-5 pendingPay">
                            <label for="id">Pending Amount </label>
                            <input type="number" id="pendingPay" name="pendingPay" required value=<?php
                                echo "'$PendingPay'" ; ?>>
                        </div>
                        <div class="col-12">
                            <?php 
                echo'
                <button type="submit" class="btn btn-dark checkoutbtn"><a href="DeleteCustomer.php?deletern='.$ID.'" class="text-light id="CheckOutbtn">Check Out</a></button>'?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>

<?php

    } 
}
    ?>