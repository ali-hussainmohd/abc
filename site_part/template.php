<?php 
//echo "templates" . '<br>';

function site_header(){
    $nav = site_meun();
   echo <<<text
    <header>
   <!-- Header Start -->
   <div class="header-area header-transparent">
       <div class="main-header ">
           <div class="header-bottom  header-sticky">
               <div class="container-fluid">
                   <div class="row align-items-center">
                       <!-- Logo -->
                       <div class="col-xl-2 col-lg-2">
                           <div class="logo">
                               <a href="index.php"><img src="assets/img/logo/logo-kon-header-trans.png" width="90" height="90" alt=""></a>
                           </div>
                       </div>
                       <div class="col-xl-10 col-lg-10">
                           <div class="menu-wrapper d-flex align-items-center justify-content-end">
                               <!-- Main-menu -->
                               <div class="main-menu d-none d-lg-block ">
                                   {$nav}
                               </div>
                           </div>
                       </div> 
                       <!-- Mobile Menu -->
                       <div class="col-12">
                           <div class="mobile_menu d-block d-lg-none"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Header End -->
</header>
text;
}
function site_meun(){
    return ' <nav>
    <ul id="navigation">                                                                                          
        <li class="active" ><a href="index.php">Home</a></li>
        <li><a href="courses.php">Courses</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="book.php">Books</a>
        </li>
        <li><a href="comment.php">Comment</a></li>
        <!-- Button -->
        <li class="button-header margin-left "><a href="#" class="btn">Join</a></li>
        <li class="button-header"><a href="login.php" class="btn btn3">Log in</a></li>
    </ul>
</nav>';
}

function add_courses(){
    
    echo <<<html
    
            
           
            <div class="col-6">
                <div class="form-group">
                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter course Subject">
                </div>
            </div>
        

        <div class="col-6">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter course description"></textarea>
                </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control valid" name="price" id="price" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Coures price">
            </div>
        </div>

            <div class="col-sm-6">
             <div class=" custom-file">
            <input type="file" class="custom-file-input" name="inputGroupFile01" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
        </div>
        
            
        <div class="form-group mt-3">
            <button type="submit" class="button button-contactForm boxed-btn">Add course</button>
        </div>
        </div>
    </form>
</div>
html;
}

function site_footer(){
    echo ' <footer>
    <div class="footer-wrappper footer-bg">
       <!-- Footer Start-->
       <div class="footer-area footer-padding">
           <div class="container">
               <div class="row justify-content-between">
                   <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                           <div class="single-footer-caption mb-30">
                               <!-- logo -->
                               <div class="footer-logo mb-25">
                                   <a href="index.php"><img src="assets/img/logo/logo-kon-footer-trans.png" alt=""></a>
                               </div>
                               <div class="footer-tittle">
                                   <div class="footer-pera">
                                       <p>The automated process starts as soon as your clothes go into the machine.</p>
                                   </div>
                               </div>
                               <!-- social -->
                               <div class="footer-social">
                                   <a href="#"><i class="fab fa-twitter"></i></a>
                                   <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                   <a href="#"><i class="fab fa-pinterest-p"></i></a>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
                       <div class="single-footer-caption mb-50">
                           <div class="footer-tittle">
                               <h4>Our solutions</h4>
                               <ul>
                                   <li><a href="#">Design & creatives</a></li>
                                   <li><a href="#">Telecommunication</a></li>
                                   <li><a href="#">Restaurant</a></li>
                                   <li><a href="#">Programing</a></li>
                                   <li><a href="#">Architecture</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                           <div class="footer-tittle">
                               <h4>Support</h4>
                               <ul>
                                   <li><a href="#">Design & creatives</a></li>
                                   <li><a href="#">Telecommunication</a></li>
                                   <li><a href="#">Restaurant</a></li>
                                   <li><a href="#">Programing</a></li>
                                   <li><a href="#">Architecture</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                           <div class="footer-tittle">
                               <h4>Company</h4>
                               <ul>
                                   <li><a href="#">Design & creatives</a></li>
                                   <li><a href="#">Telecommunication</a></li>
                                   <li><a href="#">Restaurant</a></li>
                                   <li><a href="#">Programing</a></li>
                                   <li><a href="#">Architecture</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- footer-bottom area -->
       <div class="footer-bottom-area">
           <div class="container">
               <div class="footer-border">
                   <div class="row d-flex align-items-center">
                       <div class="col-xl-12 ">
                           <div class="footer-copy-right text-center">
                               <p><!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. -->
                                 Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                 <!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Footer End-->
     </div>
 </footer> 
 <!-- Scroll Up -->
 <div id="back-top" >
   <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>
';
}

function registration(){
    echo "hellofddfdfgdgdgdf";
}

function js_secript_bottom(){
  echo '<!-- JS here -->
  <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
  <!-- Jquery, Popper, Bootstrap -->
  <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="./assets/js/popper.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <!-- Jquery Mobile Menu -->
  <script src="./assets/js/jquery.slicknav.min.js"></script>
  
  <!-- Jquery Slick , Owl-Carousel Plugins -->
  <script src="./assets/js/owl.carousel.min.js"></script>
  <script src="./assets/js/slick.min.js"></script>
  <!-- One Page, Animated-HeadLin -->
  <script src="./assets/js/wow.min.js"></script>
  <script src="./assets/js/animated.headline.js"></script>
  <script src="./assets/js/jquery.magnific-popup.js"></script>
  
  <!-- Date Picker -->
  <script src="./assets/js/gijgo.min.js"></script>
  <!-- Nice-select, sticky -->
  <script src="./assets/js/jquery.nice-select.min.js"></script>
  <script src="./assets/js/jquery.sticky.js"></script>
  <!-- Progress -->
  <script src="./assets/js/jquery.barfiller.js"></script>
  
  <!-- counter , waypoint,Hover Direction -->
  <script src="./assets/js/jquery.counterup.min.js"></script>
  <script src="./assets/js/waypoints.min.js"></script>
  <script src="./assets/js/jquery.countdown.min.js"></script>
  <script src="./assets/js/hover-direction-snake.min.js"></script>
  
  <!-- contact js -->
  <script src="./assets/js/contact.js"></script>
  <script src="./assets/js/jquery.form.js"></script>
  <script src="./assets/js/jquery.validate.min.js"></script>
  <script src="./assets/js/mail-script.js"></script>
  <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
  
  <!-- Jquery Plugins, main Jquery -->	
  <script src="./assets/js/plugins.js"></script>
  <script src="./assets/js/main.js"></script>
  
  </body>
  </html>';
}

function header_rel(){
  //<title>كن غيثا</title>
  echo '<!doctype html>
  <html class="no-js" lang="zxx">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Courses | Education</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="manifest" href="site.webmanifest">
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
  
      <!-- CSS here -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/css/slicknav.css">
      <link rel="stylesheet" href="assets/css/flaticon.css">
      <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
      <link rel="stylesheet" href="assets/css/gijgo.css">
      <link rel="stylesheet" href="assets/css/animate.min.css">
      <link rel="stylesheet" href="assets/css/animated-headline.css">
      <link rel="stylesheet" href="assets/css/magnific-popup.css">
      <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/slick.css">
      <link rel="stylesheet" href="assets/css/nice-select.css">
      <link rel="stylesheet" href="assets/css/style.css">
      
  </head>
  <body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start-->';
}

function add_book(){
    $self_call = "<?php echo \$_SERVER['PHP_SELF']; ?>";

    echo <<<html
    <div class="col-12">
    <h2 class="contact-title">Add a course</h2>
</div>
<div class="col-lg-12">
    <form class="form-contact contact_form" action="{$self_call}" method="post" id="courseForm" novalidate="novalidate">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                </div>
            </div>
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="button button-contactForm boxed-btn">Send</button>
        </div>
    </form>
</div>
html;
}