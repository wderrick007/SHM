<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
      <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b>. Welcome to our site.</h1>
    </div>
    
    <div class="container">
        <h1>SHM MANAGEMENT SYSTEM</h1>
<div class="pull-left">
     <a href="logout.php" class="btn btn-danger">Sign Out</a>
      <a href="student.php" class="btn btn-primary">student</a>
       <a href="reset_password.php" class="btn btn-warning">Reset Your Password</a>
</div>

    </div>
</body>
</html>