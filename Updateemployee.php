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
$sql="SELECT * from addemployee where emp_id='$update'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);
$ID=$rows['emp_id'];
$Name=$rows['name'];
$Age=$rows['age'];
$Gender=$rows['gender'];
$phno=$rows['contact'];
$Address=$rows['address'];
$Department=$rows['department'];

if(isset($_POST['submit']))
{	
    $id = $_POST['ID'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phno = $_POST['phno'];
    $address = $_POST['address'];
    $department=$_POST['department'];
    
    $sql_query = "UPDATE addemployee set emp_id='$update',emp_id='$id',name='$name',age='$age',gender='$gender',contact='$phno',
    address='$address',department='$department' where emp_id='$update'";
    $result=mysqli_query($conn,$sql_query);
     if($result){
        //echo "updated";
        header('location:employee.php');
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

    <h1>Update Employee</h1>

    <div class="container">
        <form method="post" class="row g-3 my-1">
        <div class="col-md-1 form">
                <label for="age" class="form-label">ID</label>
                <input type="number" class="form-control" id="ID" name="ID" required value=<?php echo "'$ID'";?>>
            </div>
            <div class="col-md-2 form">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name" required value=<?php echo "'$Name'";?>>
            </div>
            <div class="col-md-2 form">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required value=<?php echo $Age;?>>
            </div>
            <div class="col-md-3 form">
                <label class="form-label">Gender</label>
                <select id="gender" class="form-select" name="gender" required>

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

                </select>
            </div>
            <div class="col-md-3 form">
                <label class="form-label">Contact</label>
                <input type="number" id="phno" class="form-control" name="phno"  required value=<?php echo $phno;?>>
            </div>
            <div class="col-3 form" id=pricer>
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address"
                    required value=<?php echo "'$Address'"?>>
            </div>
            <div class="col-md-3 form">
                <label class="form-label">Department</label>
                <select id="department" class="form-select" name="department" required>

                    <option selected></option>

                    <option value="Chef"
                    <?php
                    if($Department =='Chef'){
                    echo "selected";
                    }
                    ?>
                    >Chef</option>

                    <option value="House Keeping"
                    <?php
                    if($Department =='House Keeping'){
                    echo "selected";
                    }
                    ?>
                    >House Keeping</option>

                    <option value="Server"
                    <?php
                    if($Department =='Server'){
                    echo "selected";
                    }
                    ?>
                    >Server</option>

                    <option value="Maintenance"
                    <?php
                    if($Department =='Maintenance'){
                    echo "selected";
                    }
                    ?>
                    >Maintenance</option>

                    <option value="Security"
                    <?php
                    if($Department =='Security'){
                    echo "selected";
                    }
                    ?>
                    >Security</option>

                    <option value="Information Technology"
                    <?php
                    if($Department =='Information Technology'){
                    echo "selected";
                    }
                    ?>
                    >Information Technology</option>

                    <option value="Driver"
                    <?php
                    if($Department =='Driver'){
                    echo "selected";
                    }
                    ?>
                    >Driver</option>

                    <option value="Electrition"
                    <?php
                    if($Department =='Electrition'){
                    echo "selected";
                    }
                    ?>
                    >Electrition</option>

                    <option value="Plumbing"
                    <?php
                    if($Department =='Plumbing'){
                    echo "selected";
                    }
                    ?>
                    >Plumbing</option>

                    <option value="Babysitter"
                    <?php
                    if($Department =='Babysitter'){
                    echo "selected";
                    }
                    ?>
                    >Babysitter</option>



                </select>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-dark" id="submit" name="submit">Update Employee</button>
            </div>
        </form>
    </div>
</body>

</html>

