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
    $name=$_GET['deletern'];

    $sql="DELETE FROM reports WHERE name= '$name'";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "Deleted Succesfully";
        header('location:reportadmin.php');
    }else{
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    
}
?>