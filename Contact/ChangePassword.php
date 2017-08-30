<?php 
	include 'Dataoperation.php';
    include 'session.php';

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$oldPass=htmlspecialchars($_POST['Old']);
		$newPass=htmlspecialchars($_POST['New']);
		$ConfirmPass=htmlspecialchars($_POST['Confirm']);

		if($newPass!=$ConfirmPass)
		{
			$Error='New and Confirm is not Match';
		}else
		{
			$dataOb=new DataOperation();
			$result=$dataOb->ChangePassword('Admin',$oldPass,$newPass);

			if($result=='success')
				header("location:logout.php");
			else
				$Error=$result;
		}
	}
 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Management System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="AddNew.php">Add New</a>
                    </li>
                    <li>
                        <a href="ChangePassword.php">Change Password</a>
                    </li>
                    <li>
                        <a href="Logout.php">Sign Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/logo.png" />
            <p id="profile-name" class="profile-name-card">Change Passsword</p>
            <form class="form-signin" action="" method="POST">
                <span id="reauth-email" class="reauth-email"><?php 
                if(isset($Error))
                	echo $Error;
                 ?></span>
                <input type="password" id="inputEmail" name="Old" class="form-control" placeholder="Old Password" required autofocus>
                <input type="password" id="inputPassword" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" title="At leat 1 Upper 1 lower 1 number and 1 special with min 8" name="New" class="form-control" placeholder="New Password" required>
                <input type="password" id="inputPassword" name="Confirm" class="form-control" placeholder="Confirm Password" required>
             
             
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Request Changing</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>