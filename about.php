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
                <div>
                    <input type="text" placeholder="Search items..." style="border: none; padding:.5rem; border-radius:50px; display: flex;" >
                    <i class="fa fa-search" aria-hidden="true" style="background-color: black; width: 1rem;"></i>
                </div>
                
       
           </li>
            <li>
              <a href="Home.php">Home</a>  
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
                <li>
                     <a href="#">About</a>  
               </li>
               <li>
                     <a href="login.php">Login</a>  
               </li>
                  </ul>
          
        </div>
          <i class="fa fa-bars" onClick="showmenu()"> </i>
    </nav>
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