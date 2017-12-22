<?php
session_start();
if(!isset($_SESSION['email']))
	header('location: logout.php');

include("database/db_conection.php");

$complete_id=$_GET['id'];
$delete_query="update todos set isdone='1' WHERE id='$complete_id' and ownerid='".$_SESSION['id']."'";
$run=mysqli_query($dbcon,$delete_query);
if($run)
{
//javascript function to open in the same window
    echo "<script>window.open('index.php','_self')</script>";
}
else
{
	    echo "<script>window.open('index.php','_self')</script>";

}
?>