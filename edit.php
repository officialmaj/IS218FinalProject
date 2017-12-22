

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
		<?php
session_start();

include("database/db_conection.php");
	if(isset($_GET['id']))
	{

		$results = mysqli_query($dbcon, "SELECT * FROM todos where id='".$_GET['id']."' and ownerid='".$_SESSION['id']."'");
		$row = mysqli_fetch_array($results);
	}
	?>


	<?php
	if(isset($_POST['task']))
	{
		$results1 = mysqli_query($dbcon, "SELECT * FROM todos where id='".$_GET['id']."' and ownerid='".$_SESSION['id']."'");
		$row1 = mysqli_fetch_array($results1);
		if(count($row1)>0){

			mysqli_query($dbcon, "UPDATE todos set message='".$_POST['task']."' where id='".$_GET['id']."' and ownerid='".$_SESSION['id']."'");
			header("Location: index.php?edited=1");

		}

		else{

	?>
	<br/>
	<br/>

			<div class="alert alert-danger col-md-6 col-md-offset-3">
				<strong>Not a Valid Action!</strong> You don't have permission to do this action.
			</div>
			<?php
		}
	}

	?>


		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Task</h3>
						</div>
						<div class="panel-body">
							<form role="form" method="post" action="edit.php?id=<?php echo $_GET['id'];?>">
								<fieldset>

									<div class="form-group">
										<input class="form-control"  type="text" name="task" value="<?php echo $row['message']; ?>" autofocus>
									</div>

									<input class="btn btn-lg btn-success btn-block" type="submit" value="Edit Task" name="edit" >

								</fieldset>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>

	</body>

	</html>
