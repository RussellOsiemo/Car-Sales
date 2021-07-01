<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include connection file
require_once "connection.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["pass"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["pass"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM user_records WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
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
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Car Sales</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body> 
    <section class="header">
    <nav>
        <a href="home.html"><img src="Images/logo2.png" alt="logo" height="65px"></a>
        <div class="nav-links">
              <i class="fa fa-times" onClick="hidemenu()" id="navLinks"></i>
        <ul>
            <li><div>
                </li>
            <li>
              <a href="home.php">Home</a>  
            </li>
             <li>
                   <a href="register.php">Register</a>  
             </li>
             <li>
                   <a href="buy.php">Buy Car</a>  
             </li>
              <li>
                    <a href="sell.php">Sell Car</a>  
              </li>
               <li>
                     <a href="view.php">View Car</a>  
               </li>
                </ul>
          
        </div>
          <i class="fa fa-bars" onClick="showmenu()"></i>
    </nav>
    <!------login------->
    <section class="loginform">
        <form  action="login.php" method="post">
            <h3 class="formtitle">LOGIN</h3>
            <?php if (isset($_GET["error"])) {?>
            <p class=error> <?php echo $_GET["error"];?></p>
          
           <p class=error> <?php echo $_GET["error"];?></p>
           <?php }?>
           <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username">
          <label for="password">Password</label>
          <input type="password" name="pass" placeholder="Password">
          <button type="submit">Login</button>
          <p><a href="register.php">I Don't Have an Account</a> <a href="reset.php">Forgot Password</a></p>
        </form>
    </section>
      
<!----Contact Us---->
<section class="contact">
    <h1>Buy Cars From Us Today At a Better Price<br>better Quality Assurance To All</h1>
    <a href="tel:+254723383534" class="visit-btn">CONTACT US TODAY</a>
</section>

<!---footer---->
<section class="footer">
    <h4>About Us</h4>
    <p class="car-p">This is a bussiness website and is therefore regulated by the trade policies .
   </p>
   <div class="icons">
    <a href="http://www.facebook.com"><i class="fa fa-facebook"></a></i>
      <a href="http://www.twitter.com"><i class="fa fa-twitter" ></a></i>
      <a href="http://www.instagram.com"><i class="fa fa-instagram"></a></i>
      <a href="http://www.linkedin.com"><i class="fa fa-linkedin"></a></i>

   </div>
   <p>This has been copyrighted 2021<i class="fa fa-copyright" ></i>.Enjoy.</p>
</section>
<!-----Javascript for toggle menu---->
<script type="text/javascript">
    var navLinks = document.getElementById("navLinks");
    function showmenu(){
        navLinks.style.right="0";
    }
      function hidemenu(){
        navLinks.style.right="-200px";    
    }
</script>
</body>
</html>