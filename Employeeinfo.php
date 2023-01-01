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
$sql = " SELECT * FROM addemployee ORDER BY emp_id ASC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IBIS/Customer Info</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    
    
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #ffff;
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

        section{
            padding:0 10%;
            margin: 40px auto 0;
        }
        .heading{
            font-size: 40px;
            text-align: center;
            margin-bottom: 40px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table thead{
            background-color: #ee2828;
        }
        .table thead tr th{
            font-size:16px;
            font-weight: 600;
            letter-spacing: 0.35px;
            color: #FFFFFF;
            opacity: 1;
            padding: 12px;
            vertical-align: top;
            border: 1px solid #dee2e685;
        }
        .table tbody tr td{
            font-size: 14px;
            letter-spacing: 0.35px;
            font-weight: normal;
            color: #f1f1f1;
            background-color: #3c3f44;
            padding: 8px;
            text-align: center;
            border: 1px solid #dee2e685;
        }
       
       
    </style>
</head>

<body>
    <section>
        <h1 class="heading">Employee Info</h1>

        <div class="searchbar">
            <input type="text" name="search" id="Input" placeholder="Search for Department..."  onKeyup = "searchFun()">
        </div>

        <!-- TABLE CONSTRUCTION -->
        <table class="table" id="Table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Department</th>

            </tr>
            </thead>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
            <tbody>
            <tr>
                <!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
                <td>
                    <?php echo $rows['emp_id'];?>
                </td>
                <td>
                    <?php echo $rows['name'];?>
                </td>
                <td>
                    <?php echo $rows['age'];?>
                </td>
                <td>
                    <?php echo $rows['gender'];?>
                </td>
                <td>
                    <?php echo $rows['contact'];?>
                </td>
                <td>
                    <?php echo $rows['address'];?>
                </td>
                <td>
                    <?php echo $rows['department'];?>
                </td>
            </tr>
            <?php
				}
			?>
            </tbody>
        </table>
    </section>


   
   <script>
    
const searchFun = () => {
    let filter = document.getElementById('Input').value.toUpperCase();

    let Table = document.getElementById('Table');

    let tr = Table.getElementsByTagName('tr');

    for (var i = 0; i < tr.length; i++) {
        let td = tr[i].getElementsByTagName('td')[6];


        if (td) {
            let textValue = td.textContent || td.innerHTML;

            if (textValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }

        }
    }

}


   </script>
</body>

</html>