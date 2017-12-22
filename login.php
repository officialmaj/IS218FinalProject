<?php

session_start();


?>



<html>
<head lang="en">

	<meta charset="UTF-8">
	<title> Login </title> 

</head>

<style>
	.login-panel {

		margin-top: 150px;

	}
</style>

	<div class ="container">
		<div class="row">
			<div class="login-panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"> Sign In
					</h3>
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



						
						
