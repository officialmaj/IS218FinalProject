<?php 
session_start();
if(!isset($_SESSION['email']))
	header('location: logout.php');
include "database/db_conection.php";

$results = mysqli_query($dbcon, "SELECT * FROM accounts where email='".$_SESSION['email']."'");
$row = mysqli_fetch_array($results);

if(!isset($_SESSION['id']))
	$_SESSION['id']=$row['id'];

if(!isset($_SESSION['fname']))
	$_SESSION['fname']=$row['fname'];

if(!isset($_SESSION['lname']))
	$_SESSION['lname']=$row['lname'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>ToDo List</title>
	<link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
	<link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\style.css">
</head>
<body>
	<center>
		<h1>Welcome  <?php  echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h1>
	</center><br/><br/>

	<?php
	if(isset($_GET['deleted']))
	{
		?>
		<div class="alert alert-success col-md-6 col-md-offset-3">
			<strong>Success!</strong> Item has been deleted.
		</div>
		<?php
	}
	if(isset($_GET['edited']))
	{

	?>
		<div class="alert alert-success col-md-6 col-md-offset-3">
			<strong>Success!</strong> Item has been Edited.
		</div>

<?php
}	

if(isset($_GET['added']))
	{

	?>
		<div class="alert alert-success col-md-6 col-md-offset-3">
			<strong>Success!</strong> Item has been Added.
		</div>

<?php
}
?>

<br>
<br>
<br>



	<center><h3>
		Incomplete Todo List 
	</h3></center>
	<a href="add.php">
<button type="button" class="btn btn-primary col-md-2 col-md-offset-5">+ Add</button>
</a>
<br>
<br>

	<table>
		<thead>
			<tr>

				<th>Due Date: </th>
				<th>Due Time: </th>
				<th>Description: </th>
				<th align="center" colspan="3">Actions</th>
			</tr>
		</thead>

		<?php 
		$results = mysqli_query($dbcon, "SELECT * FROM todos where isdone=0 and ownerid='".$_SESSION['id']."' order by message asc");


		while ($row = mysqli_fetch_array($results)) { ?>
		<tr>

			<td><?php echo date("j M Y", strtotime($row['duedate'])); ?></td>
			<td><?php echo date("h:i A", strtotime($row['duedate'])); ?></td>
			<td><?php echo $row['message']; ?></td>

			<td>
				<a href="edit.php?id=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="delete.php?delete=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
			<td>
				<a href="complete.php?id=<?php echo $row['id']; ?>" class="edit_btn">Check Off</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	

	<br>
	<br>



	<center><h3>
		Completed  Todo List
	</h3></center>


	<table>
		<thead>
			<tr>


				<th>Due Date: </th>
				<th>Due Time: </th>
				<th>Description: </th>
				<th align="center" colspan="3">Actions</th>
			</tr>
		</thead>

		<?php 
		$results = mysqli_query($dbcon, "SELECT * FROM todos where isdone=1 and ownerid='".$_SESSION['id']."' order by message asc");

		while ($row = mysqli_fetch_array($results)) { ?>
		<tr>

			<td><?php echo date("j M Y", strtotime($row['duedate'])); ?></td>
			<td><?php echo date("h:i A", strtotime($row['duedate'])); ?></td>
			<td><?php echo $row['message']; ?></td>

			<td>
				<a href="edit.php?id=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="delete.php?delete=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
		<?php } ?>

	</table>
</body>
</html>