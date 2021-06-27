<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
                <div>
                    <input type="text" placeholder="Search items..." style="border: none; padding:.5rem; border-radius:50px; display: flex;" >
                    <button>Search</button>       
                </div>
                
                
       
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
                     <a href="about.php">About</a>  
               </li>
               <li>
                     <a href="login.php">Login</a>  
               </li>
                  </ul>
          
        </div>
          <i class="fa fa-bars" onClick="showmenu()"> </i>
    </nav>
    <section>
    <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1><br>
        <p>
        <button><a href="reset.php" class="">Reset Your Password</a></button>
        <button><a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a></button>
    </p>
    </section>

    <div class="text-box">
        <h1>FlameBird Car Showroom</h1>
        <p class="car-p">Welcome to FlameBird Car  Sales where we help you take that first step towards your first
            car ownership.We help you get a pocket friendy car that also performs to the peak of its capability 
            in your day-to-day life.We are located in Nakuru ,Nairobi and Maseno which are our Showrooms
            with experts to help you get that car that makes you smile in your dreams.
        </p>
        <a href="view.php" class="visit-btn">Visit Us To Know More</a>
    </div>
</section>
<!---Cars---->
<section class="cars">
    <h2>Cars We Sell</h2>
    <p class="car-p">Is it a Mercedes Benz , Lamborghini , Chevrolet , BMW , Isuzu no matter the brand we have it here in our showrooms</p>
<div class="row" >
    <div class="car-col">
        <a href="sportcar.php">
       <h3>Sport Cars</h3>
        <p class="car-p">For that fast feeling when racing or the engine revs when driving at
             top speed .We have the best sports cars to offer you at pocket-friendly
              price and also check-ups to ensure that your ride is in shape for the next 
        drive.Our sports cars are from different brands from Chevrolet , Lamborghini, Chevrolet,BMW and porsche </p>
        </a>
    </div>
    <div class="car-col">
    <a href="offroadcar.php">
        <h3>Off-Road Cars</h3>
        <p class="car-p">Are you looking for that car that is able to navigate on dirt-roads and uneven road surface ,
            then here we haven the solution for you with our powerful cars from Range Rovers to Isuzu to 
            Ford to help you navigate this terrain with ease and les fuel consuption.We select cars that have 
            been tested to navigate these hard terrains . Also we have our mechanics who can customize you ride
            into that ride you need. </p>
</a>
    </div>
    <div class="car-col">
    <a href="luxury.php">
        <h2>Luxury Cars</h2>
        <p class="car-p">If you are a fan of luxury cars like vintage vehicles , we have it all wether a limited edition or Renewed
            editions. We have auctions which can help you bid on that car that makes you comfortable at our showrooms 
            which hold auctions every end of the month on selected months.
            We also tint cars to look the way you need at an affordable costs .
        </p>
</a>
    </div>
</div>
</section>
<!---Showrooms---->
<section class="showroom">
    <h1>Our Showroom</h1>
    <p class="car-p">We Have Showrooms for those who need to see cars before deciding on there brand with the helpmof our 
        car experts based in the showrooms ready to serve you
    </p>
    <div class="row">
    <a href="#">
            <div class="showroom-col">
        
            <img src="Images/naks.jpg" height="100%">
            <div class="layer">
                <h3>Nakuru</h3>
             
            </div>
            </a>
        </div>
        <a href="nairobi.php">
        <div class="showroom-col">
        
            <img src="Images/1.jpg">
            <div class="layer">
                <h3>Nairobi</h3>
            
            </div>
            </a>
        </div>
        <a href="maseno.php">
        <div class="showroom-col">
        
            <img src="Images/2.jpg">
            <div class="layer">
                <h3>Maseno</h3>
           
            </div>
            </a>
        </div>
    </div>
</section>
<!----Services------>
<section class="services">
  <h1>Our Services</h1>
  <p class="car-p">We offer tinting and upgrading of cars in our auto garages.</p> 
 <div class="row">
     <div class="services-col">
         <img src="Images/nakuru.jpg">
         <h3>Car Maintenance</h3>
        <p class="car-p">Our mechanics are always available to help you sort out your
        car issues on given period of warrant-worthy </p> 
     </div>
     <div class="services-col">
         <img src="Images/driver1.jpg">
         <h3>Drive Test</h3>
         <p class="car-p">Not sure of how a car would feel like during your drives? Don't worry we give you a 
             drive test before choosing a car.</p> 
     </div>
     <div class="services-col">
         <img src="Images/5.jpg">
         <h3>Car Sell-In And Auction.</h3>
         <p class="car-p">We now buy used cars from esteemed users at reasonable prices.We also resell them and 
             customize some for auctions .Bring your car today and turn it into cash.
         </p> 
     </div> 
 </div> 
    
</section>
<!----Reviews----->
<section class="review">
    <h1>Customer Review</h1>
    <p class="car-p">Here are some of the reviews from our customers.</p>
 <div class="row">
 <div class="review-col">
     <img src="Images/nightking.jpg">
     <div>
     <p class="car-p">Awesome cars ,I swear i was tempted to buy all the customized cars at last year's auction.Best car sales company.So hot!!!!!</p>
  <h3>Night King</h3>
   <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
     <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
       <i class="fa fa-star-o"></i>
 </div>
</div>
 <div class="review-col">
     <img src="Images/Wangechi_Rachel.jpg">
    <div>
     <p  class="car-p">Satisfactory.Now on my fifth year with my Lamborghini Diablo and it has never dissapointed me</p>
 <h3>Wangechi Rachel</h3>
  <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
     <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
       <i class="fa fa-star-half-o"></i>
 </div> 
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
