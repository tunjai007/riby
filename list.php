<!DOCTYPE HTML>
<html lang="en-US">

<?php
//including the database connection file
	include('includes/config.php');
  include('includes/db.php');

//fetching data in descending order (lastest entry first)
$result = mysqli_query( $db, "SELECT name, email, sdate FROM contacts ORDER BY contact_id DESC");
?>


<head>
	<meta charset="UTF-8">
	<title>Forms and PHP</title>
	<meta charset="utf-8">
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
							<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
							<link rel="stylesheet" href="css/custom.css">
							<link rel="stylesheet" href="css/yamm.css">
							<link rel="stylesheet" href="css/animate.css">
							<link rel="stylesheet" href="css/bootstrap-social.css">
							<link rel="stylesheet" id="font-awesome-css" href="css/font-awesome.min.css" type="text/css" media="screen">
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
							<div class="container"> 
								<div class="well">
									<div class="row">
								<div class="col-md-1">
								<a href ="index.php" class ="btn btn-success btn-xl">GO BACK</a>
								</div>
								<div class="col-md-10">
								<h2 style="color:green;text-align:center">CONTACT LIST</h2>
								<table width='100%' class="table table-bordered" >
									<tr bgcolor='#CCCCCC'>
										<td>Name</td>
										<td>Email</td>
										<td>Date</td>
									</tr>
									<?php
									while($res = mysqli_fetch_array($result)) {		
										echo "<tr>";
										echo "<td>".$res['name']."</td>";
										echo "<td>".$res['email']."</td>";
										echo "<td>".$res['sdate']."</td>";	
										//echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
									}
									?>
								</table>	
	
	
	
											<div class="col-md-1">
											
											</div>
										</div>
									</div>
								</div>
							</div>
</body>
</html>
