<?php
session_start();
if(!isset($_SESSION['email']))
	header('location: logout.php');

include("database/db_conection.php");

$delete_id=$_GET['delete'];
$delete_query="delete from todos WHERE id='$delete_id' and ownerid='".$_SESSION['id']."'";//delete query
$run=mysqli_query($dbcon,$delete_query);
if($run)
{
//function to open in the same window
    echo "<script>window.open('index.php?deleted=1','_self')</script>";
}
else
{
	    echo "<script>window.open('index.php','_self')</script>";

}
?>