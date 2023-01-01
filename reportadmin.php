<!-- PHP code to establish connection with the localserver -->
<?php

// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'dmbs123';

// Server is localhost with
// port number 3306
$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM reports ORDER BY email DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Admin/Report Details</title>
    <link rel="icon" href="images/logo.png" type="image/png">
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
         body{
            background-color: #c0c0c0;
            font-family: sans-serif;
        }
        .searchbar{
            position: absolute;
            left:83%;
            bottom:86.5%;
            transform: translate(-50%, -50%);
        }
        input{
            border: 3px solid #32e17c;
            height: 40px;
            width: 200px;
            border-radius: 50px;
            font-size: 15px;
            text-align:center;
        }
        
        .heading{
            font-size: 40px;
            text-align: center;
            margin-bottom: 40px;
        }
    
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;

        }

        td {
            background-color: #ffff;
            border: 1px solid black;
        }

        th{
            background-color: #ee2828;
        }
        td {

            font-size: 16px;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        
        a:link {
    color: black;
    background-color: ;
    text-decoration:none;
    
    font-weight: bold;
    font-size: 13px;
    letter-spacing: 0px;
}
a:hover {
    color: red;
    background-color: transparent;
}
button{

    border-radius:500px;
}
    </style>
</head>

<body>
	<section>
		<h1 class="heading">IBIS REPORTS</h1>
		<!-- TABLE CONSTRUCTION -->
		<div class="searchbar">
    <input type="text" name="search" id="Input" placeholder="Search for Name..."  onKeyup = "searchFun()">
</div>
    
        <table class="table" id="Table">
  <thead>

				<th>Name</th>
				<th>Email</th>
				<th>Address</th>
				<th>Report</th>
                <th>City</th>
                <th>Query</th>
                <th>Date</th>
				<th>Delete</th>
			</tr>
	</thead>
	<tbody>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				if($result){
				while($rows=mysqli_fetch_assoc($result))
				{
					$name = $rows['name'];
					$email = $rows['email'];
	 				$address = $rows['address'];
	 				$report = $rows['report'];
	 				$city = $rows['city'];
     				$query = $rows['query'];
     				$date = $rows['date'];

					echo'<tr>
			<td scope="row">'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$address.'</td>
            <td>'.$report.'</td>
            <td>'.$city.'</td>
			<td>'.$query.'</td>
			<td>'.$date.'</td>
            <td>
            
            <button class="btn btn-danger"><a href="Deletereport.php?deletern='.$name.'" class="text-light">Delete</a></button>
            </td>
          </tr>';
		  

		  }
		}
						?>
			</tbody>
		</table>
	</section>
	<script src="searchbar.js"></script>
</body>

</html>