<?php
// Include connect file
require_once "connection.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user_records WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user_records (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
	<title>Car Sale Register </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	    <section class="header">
    <nav>
        <a href="home.html"><img src="Images/logo2.png" alt="logo" height="65px"></a>
        <div class="nav-links">
              <i class="fa fa-times" onClick="hidemenu()" id="navLinks"></i>
        <ul>
            <li>
                 <div class="wrap">
                        <div>
                         <a href="home.php">Home</a>  
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
                <li>
                     <a href="about.php">About</a>  
               </li>
               </ul>
          
        </div>
          <i class="fa fa-bars" onClick="showmenu()"> </i>
    </nav>
    <br>
    

    <div class="text-box">
    
      <h1>FlameBird Car Showroom</h1>
      <p class="scroll-p" style="font-weight:700; font-size:60;">Scroll  down here to begin a memorable journey with us.Let's get started.
      </p>
      
  </div>
    </div>
</section>
<section class=row>
<div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php if ($username_err===true) {
                echo $username_password_err; }  ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php  if ($password_err===true) {
                echo $password_err; }  ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php if ($confirm_password_err===true) {
                echo $confirm_password_err; }  ?>
               </span>
            </div>
            <div class="form-group">
                <button type="submit"  value="Submit">Submit</button>
                <button type="reset"  value="Reset">Reset</button>
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    

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
     <p>This has been copyrighted 2021<i class="fa fa-copyright" ></i></i>.Enjoy.</p>
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