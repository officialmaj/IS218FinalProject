
	<?php
session_start();

include("database/db_conection.php");

	if(isset($_POST['task']))
	{
			mysqli_query($dbcon, "INSERT INTO todos(message,isdone,owneremail,ownerid,duedate) VALUES('".$_POST['task']."','0','".$_SESSION['email']."','".$_SESSION['id']."','".date("Y-m-d H:i:s",strtotime($_POST['duedate']))."')");
			header("Location: index.php?added=1");

    }



	?>
	

<html>
<head lang="en">
	<meta charset="UTF-8">
	<link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
	<title>Edit Task</title>
</head>
<style>
	.login-panel {
		margin-top: 150px;

	</style>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Add Task</h3>
						</div>
						<div class="panel-body">
							<form role="form" method="post" action="add.php">
								<fieldset>

									<div class="form-group">
										<input class="form-control" placeholder="Add a message" type="text" name="task" value="" autofocus>
									</div>


									<div class="form-group">
										<input class="form-control"  placeholder="Due Date and Timet" type="datetime-local" name="duedate" autofocus>
									</div>



									<input class="btn btn-lg btn-success btn-block" type="submit" value="Add Task" name="add" >

								</fieldset>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>

	</body>

	</html>
