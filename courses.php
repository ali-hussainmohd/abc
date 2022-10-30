<?php
session_start();
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
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Our courses</h1>
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
        <div class="container">
        <div class="col-xl-12 mt-4">
            <h1>Hello  <?php echo $_SESSION["name"] ?></h1>
        </div>
    </div>
        <!-- Courses area start -->
        <div class="courses-area section-padding40 fix">
            <div class="container">

            <div class="row">
         


                    <?php
                    
                    
                ?>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Our featured courses</h2>
                        </div>
                    </div>
                </div>


                <div class="row">




                
                <?php  
                
                $conn = connection();
                $sql = "SELECT * FROM voulnteer";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                $count=1;
                while($row = $result->fetch_assoc()) {
                    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    
                    ?>
                     <div class="col-lg-4">
                     <div class="properties properties2 mb-30">
                         <div class="properties__card">
                             <div class="properties__img overlay1">
                                 <a href="#"><img 
                                 src="assets/img/profile/profile_<?php echo $count++?>.png" 
                                 alt="" width="180"  height ="180px" style="object-fit=cover;"> </a>
                             </div>
                             <div class="properties__caption">
                                 <p>User Experience</p>
                                 <h3><a href="#"><?php echo $row["vol_name"]; ?> </a></h3>
                                 <p><?php echo $row["subject"]; ?>
                                 </p>
                                 <div class="properties__footer d-flex justify-content-between align-items-center">
                                     <div class="restaurant-name ">
                                         <div class="rating">
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star"></i>
                                             <i class="fas fa-star-half"></i>
                                         </div>
                                         <p><span>(4.5)</span> based on 120</p>
                                         <h2><span><?php echo $row["Email"]; ?></span></h2>
                                     </div>
                                     
                                 </div>
                                    <form method="post" action="">
                                        <button class="border-btn border-btn2 mt4"
                                                type="submit"; 
                                                value="<?php echo $row["vol_id"].'_'.$row["vol_name"]; ?>" 
                                                name="ask_btn">
                                            Ask a voluntary
                                        </button>

                                    </form>
                                 
                                 
                             </div>
                         </div>
                     </div>
                 </div>

                     <?php ;
                     if($count == 7)
                     {$count=1;}
                }//while
                } else {
                echo "0 results";
                }
                if(isset($_POST['ask_btn'])){
                    $str_arr = explode ("_", $_POST['ask_btn']); 
                    $data=array( $_SESSION["uni_id"],date("Y-m-d"));
                    $sql = "insert INTO request (vol_id,vol_name, student_id, request_date ) VALUES( ?,?,?,?)";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param(
                        'dsds',
                        $str_arr[0],
                        $str_arr[1],
                        $data[0],
                        $data[1]);                                                                                 
                    //$result = $conn->query($sql);
                    //echo var_dump($data) . "<br>";
                    if ($stmt->execute()) {
                        echo '<script> alert("Order '.$str_arr[1].' created successfully")</script>';
                        echo "<meta http-equiv='refresh' content='0'>";
                      } else {
                        echo '<script> alert("Error:  '. $conn->error.' ")</script>';
                      }
                    
                }else if(isset($_POST['send_btn'])){
                     
                    $data=array( $_SESSION["uni_id"],$_SESSION["name"],date("Y-m-d h:i:sa"));
                    $sql = "insert INTO chat (vol_id,vol_name, student_id, std_name, recevied, sender, msg, date  ) 
                            VALUES ( '{$_SESSION['chat_to'][1]}','{$_SESSION['chat_to'][2]}',
                                                                 '{$data[0]}',
                                                                 '{$data[1]}',
                                                                 '{$_SESSION['chat_to'][2]}',
                                                                 '{$data[1]}',
                                                                 '{$_POST['chat_msg']}',
                                                                 '{$data[2]}')";
                                                                                                   
                    //$result = $conn->query($sql);
                    //echo var_dump($data) . "<br>";
                    if ($conn->query($sql) === TRUE) {
                        echo '<script> alert("Order '.$str_arr[1].' created successfully")</script>';
                        echo "<meta http-equiv='refresh' content='0'>";
                      } else {
                        echo '<script> alert("Error:  '. $sql.' ")</script>';
                      }
                }else if(isset($_POST['chatTOvol_btn'])){
                    //save voluntary name and id in array to call it later
                    $_SESSION['chat_to']= explode ("_", $_POST['chatTOvol_btn']);  
                    /*
                    $chat_to= explode ("_", $_POST['chatTOvol_btn']);
                    $_SESSION['chat_to_id']=$chat_to[1];
                    $_SESSION['chat_to_name']=$chat_to[2];
                      
                    */ 
                    //onclick="chatHiddeShow()"
                    echo '<script type="text/javascript">
                    
                    alert("Execute Javascript Code");
                    </script>;';
                }

                $conn->close();
                //////
                
                ?>

            <div class="container">
                    <h2>Your Requst</h2>
                               
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Voulnteer</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                
                $conn = connection();
                $id_student=$_SESSION["uni_id"];
                $sql = "SELECT * FROM request where student_id = '".$id_student."'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                $count=1;
                while($row = $result->fetch_assoc()) {
                    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    
                    ?>
                        <tr>
                            <td><?php echo $count++?></td>
                            <td><?php echo $row["request_date"];?></td>
                            <td><?php echo $row["vol_name"];?></td>
                            <td><?php echo $row["status"];?></td> 
                            <?php 
                            //////////////////////////////// Depende on status button///////////////////////////////
                            if($row["status"] == "accept")
                            {
                                ?>
                            <td>
                           
                                <form action="" method="POST">
                                    <button class="btn" 
                                            value="<?php echo  "vol_" . $row['vol_id'] . "_" . $row["vol_name"] ?>" 
                                            type="submit" 
                                            name="chatTOvol_btn"
                                            
                                            >
                                    <i class="fas fa-comment-alt"></i> Chat
                                    </button>
                                </form>
                            </td>
                            <?php } else if($row["status"] == "reject")
                            {
                                ?>
                            <td>                        
                                <form action="" method="POST">
                                    <button class="btn" 
                                            value="<?php echo  "vol_" . $row['vol_id'] ?>" 
                                            type="submit" 
                                            name="book_delete_btn"
                                            >
                                    <i class="fa fa-trash"></i> Remove
                                    </button>
                                </form>
                            </td>
                            <?php } else 
                            { ?>
                                    <td> 
                                    <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
                                    </td>        
                                <?php } //else
                                
                                //////////////////////////////// Depende on status button///////////////////////////////
                                ?>
                        </tr>


                        <?php }//while
                    }//if ($result->num_rows > 0)
                    ?>

                        </tbody>
                    </table>
                    </div>
 
                    
  
 
              
                </div>

                <section class="chat2vol " style="background-color: #eee;">
  <div class="container py-5">

    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-6">

        <div class="card" id="chat2">
          <div class="card-header d-flex justify-content-between align-items-center p-3">
            <h5 class="mb-0"><?php echo "Chat with \"{$_SESSION['chat_to'][2]}\""  ?></h5>
            <button type="button" class="btn btn-primary btn-sm" data-mdb-ripple-color="dark">Let's Chat
              App</button>
          </div>
          <?php 
                $conn = connection();
                $sql = "SELECT * FROM chat ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                //$count=1;
                
                     
          
          ?>
          <div class="card-body" style="position: relative; height: 400px; overflow-y:scroll;">
                    <!-- chat student -->
                    <?php
                        while($row = $result->fetch_assoc()) {

                            if($row['sender']==$_SESSION["name"]){
                        ?>
                    <div class="d-flex flex-row justify-content-start">
                    <img src="assets/img/profile/student_chat.png" 
                        alt="avatar 1" style="width: 45px; height: 100%;">
                    <div>
                        
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;"><?php  echo $row['msg'] ?></p>
                        

                        <p class="small ms-3 mb-3 rounded-3 text-muted"><?php  echo date("h:i:sa",strtotime( $row['date']));  ?></p>
                    </div>
                    </div>
                    <!-- end chat student -->
                    <?php 
                            }else if($row['sender']==$_SESSION['chat_to'][2]){

                    /*<div class="divider d-flex align-items-center mb-4">
                    <p class="text-center mx-3 mb-0" style="color: #a2aab7;">Today</p>
                    </div>*/

                            
                    ?>
                    
                    <!-- chat voluntary -->      
                    <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                    <div>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary"><?php  echo $row['msg'] ?></p>
                       
                        <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end"><?php  echo date("h:i:sa",strtotime( $row['date']));  ?></p>
                    </div>
                    <img src="assets/img/profile/voluntary_chat.png"
                        alt="avatar 1" style="width: 45px; height: 100%;">
                    </div>
                    <!-- end chat voluntary -->       
                            <?php
                       }//else if($row['sender']==$_SESSION['chat_to'][2]){
                    
                    }//while 

                    }else {
                        echo '<p class="text-center mx-3 mb-0" style="color: #a2aab7;">no chat start</p>';
                    }
                            ?>

          </div><form method="post" action="">
          <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
            
                 <img src="assets/img/profile/student_chat.png"
              alt="avatar 3" style="width: 40px; height: 100%;">
             
            <input type="text" 
                   class="form-control form-control-lg" 
                   id="exampleFormControlInput1"
                   placeholder="Type message"
                   name="chat_msg"
              >
                
                    <button type="submit" name="send_btn" class="text-muted fa" >&#xf1d8;</button>
               
            
          </div> </form>
        </div>

      </div>
    </div>

  </div>
</section>
<script>
    function chatHiddeShow() {
        var element = document.querySelector(".chat2vol");
        element.classList.remove("d-none");
        //console.log("hello");
            }
</script>



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
