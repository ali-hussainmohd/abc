<?php
require ("site_part/template.php");
require ("functions/function.php");
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
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Our Books</h1>
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
            
                    <div class="col-12 ">
            <h2 class="contact-title">Add a book</h2>
              </div>
            <div class="col-lg-10 ">
            <form class="form-contact contact_form" action="<?php echo $_SERVER['PHP_SELF']."?type=2"; ?>" enctype="multipart/form-data" method="post" id="courseForm" novalidate="novalidate">
                <div class="row">
                    <?php
                    add_book();
                    $voluntary_id= 2020100;
                    if($_SERVER["REQUEST_METHOD"] == "POST") {

                        $subject = $_POST['subject'];  
                        $message = $_POST['message'];
                       
                        
                        //echo $message  . "  & " .  $subject  ." <br>" ;
                        $con =  connection();
                            //to prevent from mysqli injection  
                             $message  = stripcslashes($message );  
                             $subject  = stripcslashes( $subject );  
                             $message  = mysqli_real_escape_string($con, $message );  
                             $subject  = mysqli_real_escape_string($con,  $subject );
                             $target_dir = "assets/img/books/";
                             $target_file = $target_dir . basename($_FILES["inputGroupFile01"]["name"]);
                             
                             //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                             if (move_uploaded_file($_FILES["inputGroupFile01"]["tmp_name"], $target_file)) {
                                $alert=" The file ". htmlspecialchars( basename( $_FILES["inputGroupFile01"]["name"])). " has been uploaded.";
                                echo "<script> alert('".$alert."');</script>";
                             }
                             else {
                                echo "<script> alert('not successful upload . ');</script>";
                            }
                             
                             //echo  " <br>".$_FILES["inputGroupFile01"]["name"] . " <br>";
                             $img_name = $_FILES["inputGroupFile01"]["name"];
                            
                            $sql = " INSERT INTO book (book_image, book_name, book_description,  vol_id ) VALUES ('$img_name', '$subject' , '$message' , '$voluntary_id') ";  
                            //echo " <br>".$sql;
                            
                            if (mysqli_query($con, $sql)) {
                                echo "<script> alert('New record created successfully.');</script>";
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($con);
                            }
                            
                            mysqli_close($con);
                        }//if post
                ?>
            

            
            
               
           
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Our featured books</h2>
                        </div>
                    </div>
                </div>


                <div class="row">




                
                <?php  
                
                $conn = connection();
                $sql = "SELECT * FROM book";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    ?>
                     <div class="col-lg-4">
                     <div class="properties properties2 mb-30">
                         <div class="properties__card">
                             <div class="properties__img overlay1">
                                 <a href="#"><img src="assets/img/books/<?php echo $row["book_image"]; ?>" alt=""></a>
                             </div>
                             <div class="properties__caption">
                                 <p>User Experience</p>
                                 <h3><a href="#"><?php echo $row["book_name"]; ?> </a></h3>
                                 <p><?php echo $row["book_description"]; ?>
                                 </p>
                                 <div class="properties__footer d-flex justify-content-between align-items-center">
                                     <div class="restaurant-name">
                                         <div class="rating">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star-half"></i>
                                         </div>
                                         <p><span>(4.5)</span> based on 120</p>
                                     </div>
                                     <div class="price">
                                         <span><?php echo $row["book_price"]; ?></span>
                                     </div>
                                 </div>
                                 <a href="#" class="border-btn border-btn2">Find out more</a>
                             </div>
                         </div>
                     </div>
                 </div>

                     <?php ;
                }
                } else {
                echo "0 results";
                }
                $conn->close();
                
                ?>


 
 
  
 
                   
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mt-40">
                            <a href="#" class="border-btn">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses area End -->
        <!--? top subjects Area Start -->
        <div class="topic-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Explore top subjects</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic1.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic2.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic3.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic4.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic5.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic6.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic7.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="assets/img/gallery/topic8.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mt-20">
                            <a href="courses.html" class="border-btn">View More Subjects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- top subjects End -->  
        <!-- ? services-area -->
        <div class="services-area services-area2 section-padding40">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="assets/img/icon/icon1.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>60+ UX courses</h3>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="assets/img/icon/icon2.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Expert instructors</h3>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="assets/img/icon/icon3.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Life time access</h3>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
   
    <?php
site_footer();
js_secript_bottom();?>
