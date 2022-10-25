<?php
session_start();
require ("site_part/template.php");
require ("functions/function.php");
header_rel();
site_header();

//echo $_GET['type'] . " <br>";
//voluntary_profile.php
//four undergraduate years: freshman, sophomore, junior, and senior.
$uni_id=$_SESSION["uni_id"];
$conn = connection();
$sql = "SELECT * FROM voulnteer where uni_id = '$uni_id' ";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$conn->close();
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
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Voluntary Profile</h1>
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
  
            

            
            <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="250px" src="https://st3.depositphotos.com/1007566/13175/v/450/depositphotos_131750410-stock-illustration-woman-female-avatar-character.jpg">
                <span class="font-weight-bold"><?php echo $row['vol_name']?></span><span class="text-black-50"><?php echo $row['Email']?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method = "post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" name="first_name" class="form-control" placeholder="first name" value="<?php echo $row['vol_name']?>"></div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" name="password" class="form-control" placeholder="enter new Password" value="<?php echo $row['pass']?>"></div>
                    <div class="col-md-12"><label class="labels">University ID</label><input type="text" class="form-control" placeholder="Enter university id" value="<?php echo $uni_id ?>" readonly></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Collage</label><input type="text" name="collage" class="form-control" placeholder="enter Collage" value="<?php echo $row['college']?>"></div>
                    
                    <div class="col-md-12"><label class="labels">Year of collage</label><input type="text"  name="Year_collage" class="form-control" placeholder="Year of collage" value="<?php echo $row['yearOFcollage']?>"></div>
                    <div class="col-md-12"><label class="labels">Major</label><input type="text"  name="major" class="form-control" placeholder="enter your major" value="<?php echo $row['major']?>"></div>
                    
                    
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" name="email" class="form-control" placeholder="enter email id" value="<?php echo $row['Email']?>"></div>
                   
                </div>
                <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value="undergraduate" readonly ></div>  
                <div class="col-md-12"><label class="labels">University</label><input type="text" class="form-control" placeholder="enter address line 2" value="Imam Abdulrahman Bin Faisal University" readonly></div>
                  
            </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>



        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Subject</span></div><br>
                <div class="col-md-12"><label class="labels">Volunteer Course</label>
                <input type="text" class="form-control" name="course" placeholder="Volunteer Course" value="<?php echo $row['subject']?>"></div> <br>
                <div class="col-md-12"><label class="labels">Available Time</label>
                <input type="text" class="form-control" name="time" placeholder="available time" value="<?php echo $row['Timing']?>"></div>
            </div>
        </div>
    </form>
    </div>
</div>
</div>

<?php 
 if($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = connection();
    $sql = "UPDATE voulnteer set vol_name=?,pass=?,Email=?,college=?, yearOFcollage=? ,major=?,subject=?,Timing=?   where uni_id = '$uni_id' ";
    //if(!empty($_POST['time'])) {
        $stm = $conn->prepare($sql);
        $stm->bind_param(
            'ssssssss',
            $_POST['first_name'],
            $_POST['password'],
            $_POST['email'],
            $_POST['collage'],
            $_POST['Year_collage'],
            $_POST['major'],
            $_POST['course'],
            $_POST['time']
            
        );
        $stm->execute();
    $conn->close();
    //refresh page
    echo "<meta http-equiv='refresh' content='0'>";
 }



?>
       
        <!-- Courses area End -->
       
        <!-- ? services-area -->
      
        </div>
    </main>
   
    <?php
site_footer();
js_secript_bottom();?>
