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

if(isset($_GET['deletern'])){
    $ID=$_GET['deletern'];

    $sql="DELETE from newcustomer where ID_no='$ID'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<script>

        if(confirm("Check-Out Successful")){
            location.replace("CheckOut.php");
		}else{
		}
			</script>';
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
}
?>