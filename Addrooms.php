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
	 $room_no = $_POST['roomnum'];
	 $availability = $_POST['availability'];
	 $status = $_POST['status'];
	 $price = $_POST['price'];
	 $bedtype = $_POST['bedtype'];
     
	 $sql_query = "INSERT INTO addrooms (room_no,availability,status,price,bedtype)
	 VALUES ('$room_no','$availability','$status','$price','$bedtype')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		
 echo '<script>
 if(confirm("New Room Added Successfully !!")){
	 location.replace("Addrooms.html");
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