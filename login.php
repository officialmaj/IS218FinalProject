<?php

session_start();


?>



<html>
<head lang="en">

	<meta charset="UTF-8">
	<title> Login </title> 
	<link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">

</head>

<style>
	.login-panel {

		margin-top: 150px;

	}
</style>
	<body>
	<div class ="container">
		<div class="row">

			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"> Sign In </h3>
				</div>

				<div class="panel-body">
					<form role="form" method="post"	action="login.php">

					<fieldset>
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
						</div>

						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" value="">
						</div>
					
						<input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login">

					</fieldset>
					</form>
					<center><b> Not registered? </b> <br> <a href="registration.php"> Register here </a></center>	
	
                              </div>
                    	</div>
               	 </div>
           </div>
       </div>

	</body>
</html>
						
						
