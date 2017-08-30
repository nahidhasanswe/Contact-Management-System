<?php 
include_once("config.php");
include 'algorithm.php';

session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username=input_valid($_POST['username']);
		$password=input_valid($_POST['password']);


		$stmt=$db->prepare('SELECT * FROM User WHERE username=? AND password=?');
		$stmt->bind_param("ss",$username,$password);
        $stmt->execute();
		$result=$stmt->get_result();


		$number=mysqli_num_rows($result);

		if($number>0)
		{

			$_SESSION['login_user']=$username;
			setcookie('login_user',Encryption($username),time()+(60*60*24*30));
			header("location:Index.php");

		}else
		{
			$error="Username or Password is incorrect";
		}
	}

	function input_valid($data)
	{
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlentities($data);
		$data=htmlspecialchars($data);

		return $data;
	}

 ?>


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
                <a class="navbar-brand" href="login.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <div class="card card-container">

            <img id="profile-img" class="profile-img-card" src="img/logo.png" />
            <p id="profile-name" class="profile-name-card">User Login</p>
            <form class="form-signin" action="" method="POST">
                <span id="reauth-email" class="reauth-email"><?php if(isset($error)) echo $error; ?></span>
                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->


    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>