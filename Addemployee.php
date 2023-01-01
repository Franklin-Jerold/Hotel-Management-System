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
	$id = $_POST['ID'];
	 $name = $_POST['name'];
	 $age = $_POST['age'];
	 $gender = $_POST['gender'];
	 $contact = $_POST['phno'];
	 $address = $_POST['address'];
     $department = $_POST['department'];
     
	 $sql_query = "INSERT INTO addemployee (emp_id,name,age,gender,contact,address,department)
	 VALUES ('$id','$name','$age','$gender','$contact','$address','$department')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		//echo "New Details Entry inserted successfully !";
		echo '<script>
		if(confirm("New Employee Added !!")){
			location.replace("Addemployee.html");
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