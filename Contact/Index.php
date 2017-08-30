<?php 
include 'Dataoperation.php';
include 'session.php';

	$contactlist=new DataOperation();

	$contactArray=array();


	if(isset($_GET['search']))
	{
		$searchValue=htmlspecialchars($_GET['search']);

		$contactArray=$contactlist->getContactSearch($_GET['search']);	
	}
	else
	{
		$contactArray=$contactlist->getContactList();
	}
	
	if(empty($contactArray))
	{
		$Msg='There is no result';
	}


 ?>


<html lang="en">

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
    <link rel="stylesheet" type="text/css" href="css/searchBox.css">

    <style type="text/css">
        .portfolio-item:hover
        {
            border-color: blue;
            border-width: 1px;
            border-style: solid;
        }

        .portfolio-item
        {
            padding-bottom: 10px;
        }
    </style>


</head>

<body>

    <!-- Navigation -->
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

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <form action="" method="GET">
                    <input type="text" class="col-md-11" id="namanyay-search-box" placeholder="Input the Name" name="search">
                    <input type="submit" class="col-md-1" id="namanyay-search-btn" value="Search" name="">
                </form>
            </div>
        </div>
        <br/>
        <!-- Projects Row -->

        <div class="row">
        	<div class="col-md-6"><h2>
        		<?php 
        			if(isset($Msg))
        				echo $Msg;
        		 ?>
                 </h2>
        	</div>
        </div>

        <?php 

        	$total=count($contactArray);
        	
        	$i=1;
        	foreach ($contactArray as $contact) {
        		$con=new contactInfo();
        		$con=json_decode($contact,true);
        		
        		if($i==$total and $i==1)
        		{
        			echo '<div class="row">
				            <div class="col-md-3 portfolio-item">
				                <a href="Details.php?Id='.$con['Id'].'">
				                    <img class="img-responsive" style="width:200px; height:200px" src="'.$con['Image'].'" alt="">
				                </a>
								<h3>
				                    <a href="Details.php?Id='.$con['Id'].'">'.$con['Name'].'</a>
				                </h3>
								<p>
									<img class="img-responsive" style="display:inline-block" src="img/email.png" >
									<span>'.$con['Email'].'</span>
								</p>
								<p>
									<img class="img-responsive" style="display:inline-block" src="img/phone.png" >
									<span>'.$con['Phone'].'</span>
								</p>
								<a href="Details.php?Id='.$con['Id'].'" class="btn btn-success">Details</a>
								<a href="UpdateContact.php?Id='.$con['Id'].'" class="btn btn-info">Edit</a>
								<a href="Delete.php?Id='.$con['Id'].'" class="btn btn-danger">Delete</a>
                                <br/>
				            </div>
				        </div>';
        		}
        		else if($i==1 or $i%4==1)
        		{
        			echo '<div class="row">
				            <div class="col-md-3 portfolio-item">
				               <a href="Details.php?Id='.$con['Id'].'">
				                    <img class="img-responsive" style="width:200px; height:200px" src="'.$con['Image'].'" alt="">
				                </a>
								<h3>
				                    <a href="Details.php?Id='.$con['Id'].'">'.$con['Name'].'</a>
				                </h3>
								<p>
									<img class="img-responsive" style="display:inline-block" src="img/email.png" >
									<span>'.$con['Email'].'</span>
								</p>
								<p>
									<img class="img-responsive" style="display:inline-block" src="img/phone.png" >
									<span>'.$con['Phone'].'</span>
								</p>
								<a href="Details.php?Id='.$con['Id'].'" class="btn btn-success">Details</a>
								<a href="UpdateContact.php?Id='.$con['Id'].'" class="btn btn-info">Edit</a>
								<a href="Delete.php?Id='.$con['Id'].'" class="btn btn-danger">Delete</a>
                                <br/>
				            </div>';

        		}
        		else if($i%4==0 or $i==$total)
        		{
        			echo '<div class="col-md-3 portfolio-item">
				                <a href="Details.php?Id='.$con['Id'].'">
				                    <img class="img-responsive" style="width:200px; height:200px" src="'.$con['Image'].'" alt="">
				                </a>
								<h3>
				                    <a href="Details.php?Id='.$con['Id'].'">'.$con['Name'].'</a>
				                </h3>
								<p>
									<img class="img-responsive" style="display:inline-block" src="img/email.png" >
									<span>'.$con['Email'].'</span>
								</p>
								<p>
									<img class="img-responsive" style="display:inline-block" src="img/phone.png" >
									<span>'.$con['Phone'].'</span>
								</p>
								<a href="Details.php?Id='.$con['Id'].'" class="btn btn-success">Details</a>
								<a href="UpdateContact.php?Id='.$con['Id'].'" class="btn btn-info">Edit</a>
								<a href="Delete.php?Id='.$con['Id'].'" class="btn btn-danger">Delete</a>
                                <br/>
				            </div>
				        </div>';
        		}
        		else
        		{
        			echo '<div class="col-md-3 portfolio-item">
				                <a href="Details.php?Id='.$con['Id'].'">
				                    <img class="img-responsive" style="width:200px; height:200px" src="'.$con['Image'].'" alt="">
				                </a>
								<h3>
				                    <a href="Details.php?Id='.$con['Id'].'">'.$con['Name'].'</a>
				                </h3>
								<p>
									<img class="img-responsive" style="display:inline-block" src="img/email.png" >
									<span>'.$con['Email'].'</span>
								</p>
								<p>
									<img class="img-responsive" style="display:inline-block" src="img/phone.png" >
									<span>'.$con['Phone'].'</span>
								</p>
								<a href="Details.php?Id='.$con['Id'].'" class="btn btn-success">Details</a>
								<a href="UpdateContact.php?Id='.$con['Id'].'" class="btn btn-info">Edit</a>
								<a href="Delete.php?Id='.$con['Id'].'" class="btn btn-danger">Delete</a>
                                <br/>
				            </div>';
        		}

        		$i++;
        	}

         ?>

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
