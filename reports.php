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
	 $address = $_POST['address'];
	 $report = $_POST['report'];
	 $city = $_POST['city'];
     $query = $_POST['query'];
     $date = $_POST['date'];

	 $sql_query = "INSERT INTO reports (name,email,address,report,city,query,date)
	 VALUES ('$name','$email','$address','$report','$city','$query','$date')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo '<script>
		if(confirm("Report Sent Successfully !!")){
		location.replace("Reports.html");
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