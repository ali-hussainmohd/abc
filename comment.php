<?php
session_start();
require("site_part/template.php");
require("functions/function.php");
header_rel();
site_header();

//echo $_GET['type'] . " <br>";
?>
<main>
    <!--? slider Area Start-->
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Comment us</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Contact</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
                <div class="col-xl-12 mt-4">
                  <h1>  
                  <?php 
                  if(isset($_SESSION["name"]))
                        echo "Hello ". $_SESSION["name"];
                  else if(isset($_SESSION["voulnteer_name"]))
                        echo "Hello ". $_SESSION["voulnteer_name"];
                  ?>
                  </h1>
                </div>
                </div>
    <!--?  Contact Area start  -->
    <section class="contact-section d-flex justify-content-center">
        <div class="container">

            <div class="row ">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>


                <div class="col-lg-12 ">
                    <form class="form-contact contact_form " 
                          method="post"
                          action="contact_process.php"  
>

                        <div class="row">
                        <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" 
                                           name="subject" 
                                           id="subject" 
                                           type="text" 
                                           onfocus="this.placeholder = ''" 
                                           onblur="this.placeholder = 'Enter Subject'" 
                                           placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" 
                                           name="email" 
                                           id="email" 
                                           type="email" 
                                           onfocus="this.placeholder = ''" 
                                           onblur="this.placeholder = 'Enter email address'"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <select class="form-select" aria-label="Default select example" 
                                        id="inlineFormCustomSelectPref" 
                                        name="messageOptions">

                                    <option selected>Choose ....</option>
                                    <option value="Complain">Complain</option>
                                    <option value="Thanks">Thanks</option>
                                    <option value="Suggestion">Suggestion</option>

                                </select>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" 
                                              name="message" 
                                              id="message" 
                                              cols="30" 
                                              rows="9" 
                                              onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" 
                                              placeholder=" Enter Message"></textarea>
                                </div>
                            </div>
                           


                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" 
                                    class="button button-contactForm boxed-btn"
                                    name="comment_send_btn"
                                    
                                    >
                                    Send</button>
                        </div>
                    </form>
                </div>
<script>
function myFunction() {
    //onclick="myFunction()"
  alert("I am an alert box!");
}
</script>

            </div>
        </div>
    </section>
    <!-- Contact Area End -->
</main>

<?php
site_footer();
js_secript_bottom(); ?>