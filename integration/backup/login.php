<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: home.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
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
    <title>Login</title>
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
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>
