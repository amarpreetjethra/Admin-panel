<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>PHP Login Form</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" type="text/css" href="main.css">


</head>
<!-- NAVBAR
================================================== -->

<body>

<div class="container">
  <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form method="POST" action="example.php">
        <fieldset>
          <h2>Login In Here</h2>
          <hr class="colorgraph">
          <div class="form-group">
            <input name="user_id" type="text" id="user_id" class="form-control input-lg" placeholder="User Id">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
          </div>
          
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="submit" value="Login" class="btn btn-lg btn-success btn-block">
            </div>
            
          
        </fieldset>
      </form>
    </div>
  </div>
</div>



<?php
    include 'connect.php';
  
    if( isset($_POST['user_id']) && isset($_POST['password']))
    {
      $user_id =$_POST['user_id'];
      $password=$_POST['password'];    
        
    
      
      if (isset($_POST['submit'])) //to insert data in a table 
      {
         if(!empty($user_id) && !empty($password))
         {
          
        

          $query="SELECT `user_id` FROM `users` WHERE `user_id` = '$user_id' AND `password` = '$password'"; 
         
        
          if($query_run = mysql_query($query))
          {
           
              $query_num_rows =  mysql_num_rows($query_run);
              
              if($query_num_rows == 1)
              {
                echo '<b><font color = "red" >Welcome </font></i>';
                $_SESSION['user_id'] = $user_id;
                header('location: logged.php');
              }
              else
              { 
                echo '<b>You are not an authorized user !</b>';
              }
            }

          }
          else
          {
            echo '<b>Fields are empty!</b>';
          }

        } 
        
      }
      
    
    

    
?>
</body>
</html>
