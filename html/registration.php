
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Registration</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

    </style>
    <body>

        <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
            <div class="row"><!-- row class is used for grid system in Bootstrap-->
                <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
                    <div class="login-panel panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Registration</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="registration.php">
                                <fieldset>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="First Name " name="fname" type="text" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="Last Name" name="lname" type="tex" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="Phone" name="phone" type="text" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="Birthday" name="birthday" type="date" autofocus>
                                    </div>

                                    <div class="form-group">
<select name="gender" class="form-control">
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="transgender">Transgender</option>
</select>
                                  </div>

                                  <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >

                              </fieldset>
                          </form>
                          <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </body>

  </html>

  <?php

include("database/db_conection.php");
if(isset($_POST['register']))
{

    $email=$_POST['email'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $birthday=$_POST['birthday'];
    $gender=$_POST['gender'];

if($email==''||$password==''||$fname==''||$lname==''||$phone==''||$birthday==''||$gender=='')
{
    echo"<script>alert('Please fill all the fields')</script>";
    exit();
}


$check_email_query="select * from accounts WHERE email='$email'";
$run_query=mysqli_query($dbcon,$check_email_query);

if(mysqli_num_rows($run_query)>0)
{
    echo "<script>alert('Email $email is already exist in our database, Please try another one!')</script>";
    exit();
}
//insert the user into the database.
$insert_user="insert into accounts (email,password,fname,lname,phone,birthday,gender) VALUES ('$email','$password','$fname','$lname','$phone','$birthday','$gender')";
if(mysqli_query($dbcon,$insert_user))
{
            $_SESSION['email']=$email;

header("Location: index.php");//use for page redirections
}

}

?>