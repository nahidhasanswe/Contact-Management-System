<?php 
include 'Dataoperation.php';
include 'session.php';

	if(isset($_GET['Id']))
	{
		$Id=htmlspecialchars($_GET['Id']);
		$dataOb=new DataOperation();
		$contact=$dataOb->getDetails($Id);
	}else
		header("location:Index.php");
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
    .user-row {
    margin-bottom: 14px;
      }

      .user-row:last-child {
          margin-bottom: 0;
      }

      .dropdown-user {
          margin: 13px 0;
          padding: 5px;
          height: 100%;
      }

      .dropdown-user:hover {
          cursor: pointer;
      }

      .table-user-information > tbody > tr {
          border-top: 1px solid rgb(221, 221, 221);
      }

      .table-user-information > tbody > tr:first-child {
          border-top: 0;
      }


      .table-user-information > tbody > tr > td {
          border-top: 0;
      }
      .toppad
      {margin-top:20px;
      }

      .image{
        height: 100%;
        width: 80%
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

        <?php 
        	echo '<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">'.$contact->Name.'</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="'.$contact->Image.'" class="img-circle img-responsive">
                </div>
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Address:</b></td>
                        <td>'.$contact->Address.'</td>
                      </tr>
                      

                      <tr>
                        <td><b>City:</b></td>
                        <td>'.$contact->City.'</td>
                      </tr>

                      <tr>
                        <td><b>District:</b></td>
                        <td>'.$contact->District.'</td>
                      </tr>
                   
                      <tr>
                        <td><b>Zipcode</b></td>
                        <td>'.$contact->Zipcode.'</td>
                      </tr>
                      
                      <tr>
                        <td><b>Email</b></td>
                        <td><a href="#">'.$contact->Email.'</a></td>
                      </tr>
                     
                      <tr>
                        <td><b>Phone Number</b></td>
                        <td>'.$contact->Phone.'</td> 
                      </tr>
                     
                    </tbody>
                  </table>
                  <a href="#" class="btn-danger"></a>
                </div>
              </div>
            </div>
  
                 <div class="panel-footer">
                    <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                    <span class="pull-right">
                        <a href="UpdateContact.php?Id='.$contact->Id.'" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="Delete.php?Id='.$contact->Id.'" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                    </span>
                  </div>
            </div>
        </div>

        ';

        ?>

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
