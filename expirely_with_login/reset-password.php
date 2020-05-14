<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<style>
.custom-header {
  background: #292c2f;
  padding: 20px 40px;
  box-sizing: border-box;
  border: 0;
  border-radius: 0;
}

.custom-header .navbar-brand {
  color: #fff;
  font: normal 28px Cookie, Arial, Helvetica, sans-serif;
  line-height: 0.5;
  margin-right: 40px;
  background: #292c2f;
}

.custom-header a.navbar-brand span {
  color: #bc40df;
}

.custom-header ul.nav.navbar-nav.links li a {
  font: 14px Arial, Helvetica, sans-serif;
  opacity: 0.9;
  text-decoration: none;
  color: #fff;
  background: #292c2f;
  border: 0;
}

.custom-header ul.nav.navbar-nav li a:hover {
  opacity: 1;
}

.custom-header .badge {
  position: absolute;
  top: 4px;
  border-radius: 2px;
  font-size: 11px;
  color: #fff;
  background-color: #2A6A92;
  padding: 2px 4px;
  font-weight: normal;
}

.custom-header li.dropdown, .custom-header li.dropdown.open {
  background: #3a3c3e;
}

.custom-header li.dropdown .dropdown-toggle {
  border-radius: 2px;
  color: #fff;
  padding: 8px 14px;
  background: #3a3c3e;
  opacity: 0.9;
  border: 0;
  margin: 0;
}

.custom-header li.dropdown .dropdown-toggle:focus, .custom-header li.dropdown .dropdown-toggle:hover, .custom-header li.dropdown .dropdown-toggle:active {
  background: #3a3c3e;
  color: #fff;
}

.custom-header ul.nav.navbar-nav.navbar-right .dropdown li a {
  font: bold 13px Arial, Helvetica, sans-serif;
}

img.dropdown-image {
  border-radius: 50%;
  width: 32px;
  margin-left: 10px;
}

.custom-header .dropdown ul {
  background-color: #3a3c3e;
  border: 0;
  min-width: 140px;
}

.custom-header .dropdown ul li {
  background-color: #3a3c3e;
  padding: 7px;
  text-align: center;
}

.custom-header .dropdown ul li a {
  background: #3a3c3e;
  border-radius: 2px;
  color: #fff;
  padding: 0;
}

.custom-header .dropdown ul li a:active, .custom-header .dropdown ul li a:focus, .custom-header .dropdown ul li a:hover {
  background: #3a3c3e;
}

.custom-header .dropdown ul li.active a {
  color: #e9ac09 !important;
}
</style>
<body style="background-color: #f9f3db">
    <nav class="navbar navbar-light navbar-expand-md custom-header">
         <div><p class="navbar-brand" style="font-size: 40px;">Expire.ly</p></div>
    </nav>   
    <div class="wrapper" style="position: fixed; top: 50%; left: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%,-50%);">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="welcome.php">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>
