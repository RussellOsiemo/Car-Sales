<div class="input-container ic1">
              <input id="firstname" class="input" name="firstname" type="text" placeholder=" "/>
              
              <br><br>
              <div class="cut"></div>
              <label for="firstname" class="placeholder">First name</label>
            </div>
            <div class="input-container ic2">
              <input id="lastname" class="input" name="lastname" type="text" placeholder=" " />
             
              <br><br>
              <div class="cut"></div>
              <label for="lastname" class="placeholder">Last name</label>
            </div>
            <div class="input-container ic2">
              <input id="email" class="input" name="email" type="text" placeholder=" " />
              
              <br><br>
              <div class="cut cut-short"></div>
              <label for="email" class="placeholder">Email</label>
            </div>
            <div class="input-container ic2">
                  <input id="mobilenumber" class="input" name="mobilenumber" type="mobilenumber" placeholder=" " />
                 
              <br><br>
                  <div class="cut"></div>
                  <label for="mobilenumber" class="placeholder">Mobile</label>
                </div>








                <?php
// Include connection file
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
        $sql = "SELECT id FROM users WHERE username = ?";
        
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
         
        if($stmt = mysqli_prepare($conn,$sql)){
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



<section>
<p class="member">Already a Member,<a href="login.php">Login Here</a></p>
</section>
          </form>
<section class="signform">
      <form class="form" enctype="multipart/form-data" method="post">
                  <div class="title">Welcome</div>
            <div class="subtitle">Let's create your account!</div>
           
                <div class="input-container ic2">
                  <input id="username"  class="input" name="username" type="username" placeholder=" " class="form-control<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>
                  " value="<?php echo $username; ?>"/>
                  <span class="invalid-feedback"><?php echo $username_err; ?></span>                  
              <br><br>
                  <div class="cut"></div>
                  <label for="username" class="placeholder">Username</label>
                </div>
            <div class="input-container ic2">
                  <input id="password" class="input" name="password" type="password" placeholder=" " 
                  class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span> 
                 
              <br><br>
                  <div class="cut"></div>
                  <label for="password" class="placeholder">Password</label>
                </div>
                <div class="input-container ic2">
                  <input id="confirm_password" class="input"  name="confirm_password" type="password"
                   placeholder=" "  class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
              <br><br>
                  <div class="cut"></div>
                  <label for="confirmpassword" class="placeholder">Re-Enter</label>
                </div>
            <div>
            <button type="submit" class="submit" name="login"> <a href="login.php">Login</a></button>
            <button type="submit" class="submit" name="submit">submit</button>
          
      </div>
      
</section>