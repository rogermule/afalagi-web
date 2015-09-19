<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/Admin.css" rel="stylesheet">
    <link href="../../css/custome_common.css" rel="stylesheet">

</head>

<body class="back_ground_addis">

<div class="container  margin_top_70">

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<a class="navbar-brand white active">Afalagi Login</a>
		<p class="navbar-text white">We serve any thing with a single call.</p>
		<ul class="nav navbar-nav navbar-right">

			<li class="nav"><a href="about.html">About</a></li>

		</ul>

	</div>



<!--    start of the the body-->

    <div class="margin_top_20">


    <div class="col-sm-4 col-sm-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Afalagi</h2>
            </div>
            <div class="panel-body">

	            <?php

					//this  will be seen if there is any kind of error

		            if($_SERVER['REQUEST_METHOD'] == "GET"){

			            if(isset($_GET['error'])){
				            if($_GET['error'] == 'credential_error'){
					            ?>
					            <div class="alert alert-danger">
						            <a href="#" class="alert-link">User Name and password don't Match!</a>
					            </div>
				            <?php
				            }
				            else if($_GET['error'] == 'fill_error'){
					            ?>
					            <div class="alert alert-danger">
						            <a href="#" class="alert-link">Fill Out the form correctly!</a>
					            </div>
				            <?php
				            }
			            }

		            }

	            ?>


                <form action="../../../CONTROLLER/Login_Handler.php" method="POST">

                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text"
                               id="user_name"
                               name="User_Name"
                               class="form-control"
                               placeholder="enter user name "/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                               id="password"
                               name="User_Password"
                               class="form-control"
                               placeholder="enter password"
                              >
                    </div>

                    <input type="submit" value="Login" class="btn btn-success btn-lg" />

                </form>
            </div>
        </div>

    </div>
    </div>


<!--    start of the fotter-->
    <div></div>



</div>


<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>

</body>
</html>