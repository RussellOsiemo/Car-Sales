
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
                            <input type="text" placeholder="Search items..." style="border: none; padding:.5rem; border-radius:50px">
                            <i class="fa fa-search" aria-hidden="true" style="background-color: black;"></i>
             
            <li>
              <a href="#"></a>  
            </li>
             <li>
                   <a href="home.html">Home</a>  
             </li>
             <li>
                   <a href="buy.html">Buy Car</a>  
             </li>
              <li>
                    <a href="sell.html">Sell Car</a>  
              </li>
               <li>
                     <a href="view.html">View Car</a>  
               </li>
                <li>
                     <a href="about.html">About</a>  
               </li>
               </ul>
          
        </div>
          <i class="fa fa-bars" onClick="showmenu()"> </i>
    </nav>


    <div class="text-box">
      <h1>FlameBird Car Showroom</h1>
      <p class="scroll-p" style="font-weight:700;">Scroll  down here to begin a memorable journey with us.Let's get started.
      </p>
      
  </div>
    </div>
</section>
<section class="signform">
      <div class="form">
            <div class="title">Welcome</div>
            <div class="subtitle">Let's create your account!</div>
            <div class="input-container ic1">
              <input id="firstname" class="input" type="text" placeholder=" " />
              <div class="cut"></div>
              <label for="firstname" class="placeholder">First name</label>
            </div>
            <div class="input-container ic2">
              <input id="lastname" class="input" type="text" placeholder=" " />
              <div class="cut"></div>
              <label for="lastname" class="placeholder">Last name</label>
            </div>
            <div class="input-container ic2">
              <input id="email" class="input" type="text" placeholder=" " />
              <div class="cut cut-short"></div>
              <label for="email" class="placeholder">Email</label>
            </div>
            <div class="input-container ic2">
                  <input id="mobilenumber" class="input" type="mobilenumber" placeholder=" " />
                  <div class="cut"></div>
                  <label for="mobilenumber" class="placeholder">Mobile</label>
                </div>
            <div class="input-container ic2">
                  <input id="password" class="input" type="password" placeholder=" " />
                  <div class="cut"></div>
                  <label for="password" class="placeholder">Password</label>
                </div>

                <div class="input-container ic2">
                  <input id="confirmpassword" class="input" type="password" placeholder=" " />
                  <div class="cut"></div>
                  <label for="confirmpassword" class="placeholder">Re-Enter</label>
                </div>
            <div>
            <button type="text" class="submit">submit</button>
            <button type="text" class="submit">Login</button>
      </div>
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