<?php
   include('session.php');
   $con = new mysqli("localhost", "huyeah", "admin", "munalaycanabli");
   $sql = "SELECT * FROM contacts WHERE email = $user_check;";
   $result = mysqli_query($con, $sql);
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $first_name ?>'s Drive || NitipBung.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
.panel-table .panel-body{
  padding:0;
}

.panel-table .panel-body .table-bordered{
  border-style: none;
  margin:0;
}

.panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
    text-align:center;
    width: 100px;
}

.panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
.panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
  border-right: 0px;
}

.panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
.panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
  border-left: 0px;
}

.panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td{
  border-bottom: 0px;
}

.panel-table .panel-body .table-bordered > thead > tr:first-of-type > th{
  border-top: 0px;
}

.panel-table .panel-footer .pagination{
  margin:0; 
}

/*
used to vertically center elements, may need modification if you're not using default sizes.
*/
.panel-table .panel-footer .col{
 line-height: 34px;
 height: 34px;
}

.panel-table .panel-heading .col h3{
 line-height: 30px;
 height: 30px;
}

.panel-table .panel-body .table-bordered > tbody > tr > td{
  line-height: 34px;
}


    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	
</head>
<body>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
	
	<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="landing.html">NitipBung</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
    <div class="row">
    <br><br><br>

	<br>
        <div class="col-md-10 col-md-offset-1">
			<h1>Hi, <?php echo $first_name; ?>  !</h1>
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-12">
					  <form class="form-inline" action="upload.php" method="post" enctype="multipart/form-data">
						  <input type="file" name="file" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput">
						  <button type="submit" name="btn-upload" class="btn btn-primary">Upload</button>
						<?php
							if(isset($_GET['status'])){
								echo '<script language="javascript">';
								echo 'alert("Your file has been succesfully uploaded.")';
								echo '</script>';
							}
						?>
					  </form>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th>File Name</th>
                        <th>Type</th>
						<th>Modified</th>
                    </tr> 
                  </thead>
                  <tbody>
					<?php
						$SQL = "SELECT * FROM `".$user_check."`";
						$result = mysqli_query($con, $SQL);
						
						if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								$name = $row["name"];
								echo "<tr>
											<td align=\"center\">
												<a href=\"download.php?download_file=$name\" class=\"btn btn-default\"><em class=\"fa fa-download\"></em></a>
												<a href=\"#\" class=\"btn btn-default\"><em class=\"fa fa-send\"></em></a>
												<a href=\"delete.php?action=delete&id=$name\" class=\"btn btn-danger\"><em class=\"fa fa-trash\"></em></a>
											</td>
											<td>$name</td>
											<td>" . $row["type"] . "</td>
											<td>" . $row["modified"] . "</td>
										</tr>";
							}
						}
					?>
                  </tbody>
                </table>
            </div>

</div></div></div>

<!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright text-muted small">Copyright &copy; Yuka Langbuana. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
	
<script type="text/javascript">

</script>
</body>
</html>
