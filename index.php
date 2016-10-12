<?php 
  
  include('includes/config.php');
  include('includes/db.php');

?>

<?php
  
	if(isset($_POST['submit'])){
		
	
	if(strlen($_POST['name'])<3){
		header("Location:index.php?err=" .urlencode("Your full name must be at least 3 characters long")); 
		exit(); 
	}
	
	
	$email =($_POST['email']);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))

	{
		header("Location:create.php? err=" .urlencode("Please provide a valid mail")); 
		exit(); 
	}
	
	
	
	else {
	  $fname = mysqli_real_escape_string($db, $_POST['name']);
	  $femail = mysqli_real_escape_string($db, $_POST['email']);
	  

		$query = "insert into contacts (name,email,sdate) values('$fname','$femail',now()) ";
		$db->query($query);
		
		
	  header("Location:index.php?success1=" .urlencode("New Contact details has been created successfully!!!")); 
	  exit();
	}
	
 }
	
?>










<!DOCTYPE HTML>
<html lang="en-US">
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
<br />

<br />


							<div class="container"> 
								<div class="well">
									<div class="row">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">

			<?php if(isset($_GET['success1'])) { ?>
				<div class="alert alert-success"><!--<a href="#" class="close" data-dismiss="alert">X</a>-->
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo $_GET['success1']; ?>
				</div>
			<?php } ?>
				
							<?php if(isset($_GET['err'])) { ?>
										<div class="alert alert-danger">
											<?php echo $_GET['err']; ?>
										</div>
										<?php } ?>
				
				
	<form method="post" action="index.php" >
		<legend>Welcome To Contact Manager</legend>
		<table>
			<tr>
				<td>Full Name</td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" /></td>
				<td></td>
			</tr>
		</table>
	</form>
	
	</div>	
											<div class="col-md-3" style="text-align:center;">
											Click here to view contact list
											<a href ="list.php" class ="btn btn-success btn-xl">CONTACTS LIST</a>
											</div>
										</div>
									</div>
								</div>
							</div>
</body>
</html>