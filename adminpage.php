<?php
require ("site_part/template.php");
require ("functions/function.php");
header_rel();
site_header();

session_start();


if(!isset($_SESSION["adminname"]) && !isset($_SESSION["adminpassword"])  )
{
    header("Location: login.php");
}
else
{

    $conn = connection();
    $sql = "SELECT * FROM voulnteer ";
    $result = $conn->query($sql);
  

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
                                            <h1 data-animation="bounceIn" data-delay="0.2s">Admin page</h1>
                                            <!-- breadcrumb Start-->
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                                    <li class="breadcrumb-item"><a href="#">Services</a></li> 
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
                <!-- Courses area start -->

        <div class="courses-area section-padding40 fix">
            <div class="container">

                 <?php 
          if ($result->num_rows > 0) {
            // output data of each row
            $count=1;
            echo $result->num_rows . 'br';
            while($row = $result->fetch_assoc()) {
                
                ?>   
            <div class="col-xl-10">
            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
            </table>
                </div>
            </div>
           <?php 
            }//while
                    }//if
                    
            else {
                echo '<h1> No voulnteer found !</h1>';
            }
            //////////////////////////////////book //////////////////////////////////

            echo $result = 0 . '<br>';
            ?>
            <div class="courses-area section-padding40 fix">
            <div class="container">
            

            <?php

            $sql = "SELECT * FROM book ";
            $result = $conn->query($sql);
           
            if ($result->num_rows > 0) {
                echo $result->num_rows . 'br';
              // output data of each row
              $count=1;
              while($row = $result->fetch_assoc()) {
                  
                  ?>   
              <div class="col-xl-10">
              <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">book</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
              </table>
                  </div>
              </div>
             <?php 
              }//while
                      }//if
              else {
                  echo '<h1> No books found !</h1>';
              }

        $conn->close();
        ?>
            </div>
 

            </main>
   
   <?php

}//else 
site_footer();
js_secript_bottom();?>
