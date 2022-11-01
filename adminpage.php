<?php
session_start();
require ("site_part/template.php");
require ("functions/function.php");
header_rel();
site_header();



if(!isset($_SESSION["adminID"]) && !isset($_SESSION["adminpassword"])  )
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
                <div class="container">
                <div class="col-xl-12 mt-4">
                  <h1>Hello  <?php echo $_SESSION["adminname"]?></h1>
                </div>
                </div>
        <div class="courses-area section-padding40 fix">
            <div class="container">
                  <div class="col-xl-12">
                      <table class="table table-hover">
           
                 <?php 
          if ($result->num_rows > 0) {

            ?>
             <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Student Name </th>
                <th scope="col">Student Id</th>
                <th scope="col">Email</th>
                <th scope="col">College</th>
                <th scope="col">Major</th>
                <th scope="col">collage years</th>
                <th scope="col">Subject</th>
                <th scope="col">Timing</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            
            <?php
            // output data of each row
            $count=1;
           
            while($row = $result->fetch_assoc()) {
                
                ?>   
    
    <tr>
      <th scope="row"><?php echo $count++?></th>
      <td><?php echo $row['vol_name']?></td>
      <td><?php echo $row['uni_id']?></td>
      <td><?php echo $row['Email']?></td>
      <td><?php echo $row['college']?></td>
      <td><?php echo $row['major']?></td>
      <td><?php echo $row['yearOFcollage']?></td>
      <td><?php echo $row['subject']?></td>
      <td><?php echo $row['Timing']?></td>        
      <td>
          <form action="" method="POST">
          <button class="btn" value="<?php echo  $row['vol_id'] . "_" . $row['vol_name'] ?>" type="submit" name="vol_delete_btn"><i class="fa fa-trash"></i> Remove</button>
           </form>
      </td>
    
    </tr>

           <?php 
            }//while
                    }//if
                    
            else {
                echo '<h1> No voulnteer found !</h1>';
            }
            //////////////////////////////////book //////////////////////////////////

           
            ?>
          </tbody>
                    </table>
                    <!---<button class="btn" 
                      value="<?php //echo  $row['book_id'] . "_" . $row['book_name'] ?>" 
                      type="submit" 
                      name="book_delete_btn">
                      <i class="fa fa-plus"></i> Add</button>
                        </div>
                    </div>-->


            <div class="courses-area section-padding40 fix">
            <div class="container">
            
              <div class="col-xl-10">
              <table class="table table-hover">

            <?php

            $sql = "SELECT * FROM book ";
            $result = $conn->query($sql);
           
            if ($result->num_rows > 0) {
                
            ?>
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Book image</th>
                <th scope="col">Book name</th>
                <th scope="col">Book description</th>
                
                <th scope="col">Voulnteer ID</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            
            
            <?php

              // output data of each row
              $count=1;
              while($row = $result->fetch_assoc()) {
                  
                  ?>   

      <tr>
        <th scope="row"><?php echo $count++?></th>
        <td><img src="assets/img/books/<?php echo $row['book_image']?>" height="150" ></td>
        <td><?php echo $row['book_name']?></td>
        <td><?php echo $row['book_description']?></td>
        
        <td><?php echo $row['vol_id']?></td>
        <td>
          <form action="" method="POST">
          <button class="btn" value="<?php echo  $row['book_id'] . "_" . $row['book_name'] ?>" type="submit" name="book_delete_btn"><i class="fa fa-trash"></i> Remove</button>
           </form>
      </td>
      </tr>

   
             <?php 
              }//while
?>

                    
            <?php
            }//if
              else {
                  echo '<h1> No books found !</h1>';
              }

        $conn->close();
        ?>

 </tbody>
              </table>
              <button class="btn" 
                      value="<?php echo  $row['book_id'] . "_" . $row['book_name'] ?>" 
                      type="submit" 
                      name="book_add_btn"
                      onclick="location.href = 'book_voluntary.php';">
                      
                      <i class="fa fa-plus"></i> Add</button>
                  </div>
              </div>


            </div>

            
<!------------------------------------------------------  requst table   ------------------------------------------------------------>

<div class="container">
                    <h2>Student Requst</h2>
                               
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Voluntary</th>
                            <th>Student</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                
                $conn = connection();
               
                $sql = "SELECT * FROM request RIGHT JOIN student ON request.student_id = student.uni_id
                where id IS NOT NULL " ;
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
                            <td><?php echo $row["std_name"];?></td>
                            <td><?php echo $row["status"];?></td> 
                            <?php 
                            
                                ?>
                            
                            <td>                        
                                <form action="" method="POST">
                                    <button class="btn" 
                                            value="<?php echo  "requst_"  . $row["id"] ?>" 
                                            type="submit" 
                                            name="requst_delete_btn"
                                            >
                                    <i class="fa fa-trash"></i> Remove
                                    </button>
                                </form>
                            </td>
                          
                          
                        </tr>


                        <?php }//while
                    }//if ($result->num_rows > 0)
                    ?>

                        </tbody>
                    </table>
                    </div>
 
                    
  
 
              
                </div>

<!------------------------------------------------------  end requst table   ------------------------------------------------------------>

<div class="container">
                    <h2>Student comment</h2>
                               
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Student id</th>
                            <th>Student</th>
                            <th>type</th>
                            <th>msg</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                
                $conn = connection();
               
                $sql = "SELECT * FROM comment " ;
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                $count=1;
                while($row = $result->fetch_assoc()) {
                    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    
                    ?>
                        <tr>
                            <td><?php echo $count++?></td>
                            <td><?php echo $row["date"];?></td>
                            <td><?php echo $row["student_id"];?></td>
                            <td><?php echo $row["student_name"];?></td>
                            <td><?php echo $row["type"];?></td> 
                            <td><?php echo $row["msg"];?></td> 
                            
                            <?php 
                            
                                ?>
                            
                            <td>                        
                                <form action="" method="POST">
                                    <button class="btn" 
                                            value="<?php echo  "comment_"  . $row["id"] ?>" 
                                            type="submit" 
                                            name="comment_delete_btn"
                                            >
                                    <i class="fa fa-trash"></i> Remove
                                    </button>
                                </form>
                            </td>
                          
                          
                        </tr>


                        <?php }//while
                    }//if ($result->num_rows > 0)
                    ?>

                        </tbody>
                    </table>
                    </div>
 
                    
  
 
              
                </div>

            </main>
   
   <?php
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_POST["vol_delete_btn"])){
        $data=explode("_", $_POST["vol_delete_btn"]);
        $conn = connection();
        $sql = "DELETE  FROM voulnteer where vol_id = '".$data[0]."' ";
        

        if (mysqli_query($conn, $sql)) {

          echo "<script> alert('".$data[1]."  Deleted successfully.');</script>";
              //refresh page
            echo "<meta http-equiv='refresh' content='0'>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
        mysqli_close($conn);

      }else if(isset($_POST["book_delete_btn"])){
        $data=explode("_", $_POST["book_delete_btn"]);
        $conn = connection();
        $sql = "DELETE  FROM book where book_id = '".$data[0]."' ";
        

        if (mysqli_query($conn, $sql)) {

          echo "<script> alert('".$data[1]."  Deleted successfully.');</script>";
              //refresh page
            echo "<meta http-equiv='refresh' content='0'>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
        mysqli_close($conn);
   }else if (isset($_POST["requst_delete_btn"])){
        $data=explode("_", $_POST["requst_delete_btn"]);
        $conn = connection();
        $sql = "DELETE  FROM request where id = '{$data[1]}' ";

        if (mysqli_query($conn, $sql)) {

          echo "<script> alert('".$data[1]."  Deleted successfully.');</script>";
              //refresh page
            echo "<meta http-equiv='refresh' content='0'>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
        mysqli_close($conn);


   }else if (isset($_POST["comment_delete_btn"])){
    $data=explode("_", $_POST["comment_delete_btn"]);
        $conn = connection();
        $sql = "DELETE  FROM comment where id = '{$data[1]}' ";

        if (mysqli_query($conn, $sql)) {

          echo "<script> alert('".$data[1]."  Deleted successfully.');</script>";
              //refresh page
            echo "<meta http-equiv='refresh' content='0'>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
        mysqli_close($conn);
   }
   
  }//if($_SERVER["REQUEST_METHOD"] == "POST")

}//else 
site_footer();
js_secript_bottom();?>
