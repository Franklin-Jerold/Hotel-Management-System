












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
     
	 $sql_query = "INSERT INTO newcustomer (name,email,phone,address,ID,ID_no,gender,check_in,check_out,pendingPay,children,room_no)
	 VALUES ('$name','$email','$phone','$address','$idname','$idnum','$gender','$checkin','$checkout','$pendingPay','$children','$room_no')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo '<script>

        if(confirm("New Customer Added Successfully !!")){
            location.replace("Addcustomer.html");
		}else{
		}
			</script>';
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}



?>