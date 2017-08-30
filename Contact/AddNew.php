
<?php 
    include 'Dataoperation.php';
    include 'session.php';

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $contact=new contactInfo();

        $contact->Name=input_valid($_POST['firstName']).' '.input_valid($_POST['lastName']);
        $contact->Address=input_valid($_POST['Address']);
        $contact->City=input_valid($_POST['City']);
        $contact->District=input_valid($_POST['District']);
        $contact->Zipcode=input_valid($_POST['Zip']);
        $contact->Email=input_valid($_POST['Email']);
        $contact->Phone=input_valid($_POST['Phone']);
        $contact->Image='contactImage/'.$_FILES['Image']['name'];

        $Error=ImageCheck();

        if(!empty($Error))
        {
           $Msg=$Error;

        }else
        {
            $operation=new DataOperation();
            $result=$operation->addContact($contact);

            if($result)
                header("location:Index.php");
            else
                $Msg='Somethis went wrong';
        }

    }

    function ImageCheck()
    {
        $message='';
        if($_FILES['Image']['name'])
        {
            if(!$_FILES['Image']['error'])
            {
                $valid=true;

                if($_FILES['Image']['size']>2048000)
                {
                    $valid=false;
                    $message='Image is too large';
                }
                if($valid)
                {
                    $fileName = $_FILES['Image']['name'];
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    $allowed = array('jpg','png','gif','jpeg');

                    if(in_array( $ext, $allowed ) )
                    {
                        move_uploaded_file($_FILES['Image']['tmp_name'],'contactImage/'.$fileName);

                    }else
                    {
                        $message='Image extension is not valid';
                    }
                }else
                    $message='Image Size is too large';
                
            }else
                $message='Something is wrong';
        }

        return $message;
    }

    function input_valid($data)
    {
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        $data=htmlentities($data);

        return $data;
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

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add new contact</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->

    <div class="col-lg-12 well">
		<div class="row">
				<form action="" name="contact" method="post" role="form" enctype="multipart/form-data">
					<div class="col-sm-12">
                        <div class="row">
                            <p style="color: red" name="warning">
                                <?php 
                                    if(!empty($Msg))
                                        echo $Msg;
                                 ?>
                            </p>
                        </div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" name="firstName" pattern="[A-Za-z]{1,20}" title="Only Alphabit is allow" placeholder="Enter First Name Here.." name="InputFirstName" id="inputFirst" class="form-control" required="Name is required">
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" name="lastName" pattern="[A-Za-z]{1,20}" title="Only Alphabit is allow" placeholder="Enter Last Name Here.." class="form-control" required>
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea placeholder="Enter Address Here.." name="Address" rows="3" class="form-control" required></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" placeholder="Enter City Name Here.." pattern="[A-Za-z]{4,20}" title="Input Valid City Name" name="City" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>District</label>
								<input type="text" placeholder="Enter State Name Here.."
                                pattern="[A-Za-z]{4,20}" title="Input valid District Name" name="District" class="form-control" required>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" placeholder="Enter Zip Code Here.." pattern="[0-9]{4}" title="4 digit Only" name="Zip" class="form-control" required>
							</div>		
						</div>					
					
					<div class="row">
						<div class="col-sm-4 form-group">
							<label>Phone Number</label>
							<input type="text" placeholder="Enter Phone Number Here.." pattern="[0-9]{11}" title="Only Number is allow and less than 12" name="Phone" class="form-control" required>
						</div>
						<div class="col-sm-4 form-group">
							<label>Email Address</label>
							<input type="email" placeholder="Enter Email Address Here.." pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" title="Input Valid Email"  name="Email" id="email" class="form-control" required>
						</div>
						<div class="col-sm-4 form-group">
							<label for="exampleInputFile">Image</label>
							<input type="file" class="form-control-file" id="exampleInputFile" name="Image" aria-describedby="fileHelp" required>
						</div>
						
					</div>
					
					<button type="submit" class="btn btn-lg btn-info">Submit</button>					
					</div>
				</form> 
			</div>
	</div>

        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
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
     <script src="js/formValidation.js"></script>

</body>

</html>
