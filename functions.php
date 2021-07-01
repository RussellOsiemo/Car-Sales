<?php
function emptyinputregister($firstname,$lastname,$username,$email,$mobilenumber,$password,$confirmpassword){
    $results;
    if (empty($firstname) ||empty($lastname) ||empty($username) || empty($email) ||empty($mobilenumber)|| empty($password) ||empty($confirmpassword)){
    $results=true;
    }
    else{
        $results=false;
    }
    return $results;
}
   function invalidfirstname($firstname){
    $results;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $firstname)) {
    $results=true;
    }
    else{
        $results=false;
    }
    return $results;
}
function invalidlastname($lastname){
    $results;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $lastname)) {
    $results=true;
    }
    else{
        $results=false;
    }
    return $results;
}
function invalidusername($username){
    $results;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $lastname)) {
    $results=true;
    }
    else{
        $results=false;
    }
    return $results;
}
function invalidmobilenumber($mobilenumber){
    $results;
    if (!preg_match("/^[0-9]{",$mobilenumber) {
    $results=true;
    }
    else{
        $results=false;
    }
    return $results;
}
function passwordmismatch($password,$confirmpassword){
    $results;
    if($password !==$confirmpassword){
        $results=true;
    }
    else{
        $results=false;
    }
    return $results;
}
function invalidemail($email){
    $results;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $results=true;
    }
    else{
        $results=false;
    }
    return $results;
}
function usernameexist( $conn ,$firstname,$lastname,$mobilenumber,$username,$email) {
    $sql="SELECT * FROM users WHERE usename=? OR email=?;";
  //create a prepared statement for database security
  $stmt = mysqli_stmt_init($conn);
  //check for mistakes in the sql
  if (mysqli_stmt_prepare($stmt,$sql)){
      header("register.php?error=stmtfailed")
      exit();
  }
  //incase user enters correct data,,we get the data
  mysqli_stmt_bind_param($stmt,"sssns",$firstname,$lastname,$username,$mobilenumber,$email);
  mysqli_stmt_execute($stmt);
  //get user input
 $resultsData=myqli_stmt_get_resulst($stmt);
//check if there is a result in the $stmt
 if (mysqli_fetch_assoc($resultsData)){
//we leave this empty for now since we might give this function another purpose in our login form 
 return $row;
}
 else{
     $results=false;
     return $results;
 } 
msqli_stmt_close($stmt);
}
function createuser(  $conn ,$firstname,$lastname,$mobilenumber,$username,$email,$password){
    $sql="INSERT INTO users(`firstname`, `lastname`, `username`, `password`, `mobilenumber`, `email`) VALUES
     ('?','?','?','?','?','?');";
  
  $stmt = mysqli_stmt_init($conn);
  //check for mistakes in the sql
  if (mysqli_stmt_prepare($stmt,$sql)){
      header("register.php?error=stmtfailed")
      exit();
  }
  //we secure the password first before accepting it into the database by hashing it
  $hashedpassword=password_hash($password,PASSWORD_DEFAULT);
  //incase user enters correct data,,we get the data
  mysqli_stmt_bind_param($stmt,"ssssss",$firstname,$lastname,$username,$mobilenumber,$email,$hashedpassword);
  mysqli_stmt_execute($stmt); 
msqli_stmt_close($stmt);
header("home.php?welcomehome");
exit();
}



