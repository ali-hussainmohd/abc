<?php
session_start();
require ("site_part/template.php");
require ("functions/function.php");
header_rel();
site_header();

//echo $_GET['type'] . " <br>";
//voluntary_profile.php
//four undergraduate years: freshman, sophomore, junior, and senior.
$uni_id=$_SESSION["voulnteer_id"];
$conn = connection();
$sql = "SELECT * FROM voulnteer where uni_id = '$uni_id' ";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$_SESSION["vol_id_db"]=$row['vol_id'];
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
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" 
                            type="submit"
                            name="save_btn"
                            >
                            Save Profile
                        </button>
                </div>
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

<!------------------------------------------------------  requst table   ------------------------------------------------------------>

<div class="container">
                    <h2>Your Requst</h2>
                               
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Student</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                
                $conn = connection();
                $id_student=$_SESSION["uni_id"];
                $sql = "SELECT * FROM request 
                RIGHT JOIN student ON request.student_id = student.uni_id
                where request.vol_id = '{$_SESSION["vol_id_db"]}'";
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
                            <td><?php echo $row["std_name"];?></td>
                            <td><?php echo $row["status"];?></td> 
                            <?php 
                            //////////////////////////////// Depende on status button///////////////////////////////
                            if($row["status"] == "accept")
                            {
                                ?>
                            <td>
                           
                                <form action="" method="POST">
                                    <button class="btn" 
                                            value="<?php echo  "vol_" . $row['student_id'] . "_" . $row["std_name"] ?>" 
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

<!------------------------------------------------------  end requst table   ------------------------------------------------------------>
<!-----------------------------------------------------------  chat --------------------------------------------------------------------->
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

                            if($row['sender']==$_SESSION["voulnteer_name"]){
                        ?>
                    <div class="d-flex flex-row justify-content-start">
                    <img src="assets/img/profile/voluntary_chat.png" 
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
                    <img src="assets/img/profile/student_chat.png"
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
            
                 <img src="assets/img/profile/voluntary_chat.png"
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
<!-----------------------------------------------------------  end chat ------------------------------------------------------------------>
<?php 
        if(isset($_POST['save_btn'])) {

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
        }else if(isset($_POST['chatTOvol_btn'])){
            //value="<?php echo  "vol_" . $row['student_id'] . "_" . $row["std_name"] 
            $_SESSION['chat_to']= explode ("_", $_POST['chatTOvol_btn']); 
            }
            else if(isset($_POST['send_btn'])){
                $conn = connection();     
                $data=array( $_SESSION["vol_id_db"],$_SESSION["voulnteer_name"],date("Y-m-d h:i:sa"));
                $sql = "insert INTO chat (vol_id,vol_name, student_id, std_name, recevied, sender, msg, date  ) 
                VALUES ( '{$data[0]}',
                                                     '{$data[1]}',
                                                     '{$_SESSION['chat_to'][1]}',
                                                     '{$_SESSION['chat_to'][2]}',
                                                     '{$_SESSION['chat_to'][2]}',
                                                     '{$data[1]}',
                                                     '{$_POST['chat_msg']}',
                                                     '{$data[2]}')";

                                                                                               
                //$result = $conn->query($sql);
                //echo var_dump($data) . "<br>";
                echo $sql;
                if ($conn->query($sql) === TRUE) {
                    echo '<script> alert("Order '.$str_arr[1].' created successfully")</script>';
                    echo "<meta http-equiv='refresh' content='0'>";
                  } else {
                    echo '<script> alert("Error:  '. $sql.' ")</script>';
                  }
                  $conn->close();
            }



?>
       
        <!-- Courses area End -->
       
        <!-- ? services-area -->
      
        </div>
    </main>
   
    <?php
site_footer();
js_secript_bottom();?>
