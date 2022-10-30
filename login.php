<?php
session_start();
require("site_part/template.php");
require("functions/function.php");
header_rel();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['id'];
    $password = $_POST['password'];
    $option =  $_POST['options'];
    //echo " <br>" . $username . "  & " . $password .  "  & " . $option ." <br>" ;


    if ($username == '100100' && $password == '123123') {
        $_SESSION["adminID"] = $username;
        $_SESSION["name"] = "Admin Mona";
        $_SESSION["adminpassword"] = $password;
        header("Location: adminpage.php");
    }

    $con =  connection();
    //to prevent from mysqli injection  
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($con, $username);


    $password = mysqli_real_escape_string($con, $password);
    $password = md5($password);

    $sql = "select * from $option where uni_id = '$username' and pass = '$password'";
    // echo " <br>".$sql ." <br>" ;
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);


    if ($count == 1) {
        ///////////////////// 
        if ($option == "student") {
            $_SESSION["name"] = $row['std_name'];
            $_SESSION["uni_id"] = $username;
            header('Location: courses.php');

        } else if ($option == "voulnteer") {
            $_SESSION["voulnteer_name"] = $row['vol_name'];
            $_SESSION['voulnteer_id'] = $username;
            header('Location: voluntary_profile.php');
        } else {
        }
        /////////////////////////////

    }  //if($count == 1 
    else {

        echo " <br>" . "hello is noooooot work" . " <br>";
    }  //else   

    echo "<br> line finish ";
}

?>

<main class="login-body" data-vide-bg="assets/img/login-bg.mp4">
    <!-- Login Admin -->
    <form class="form-default" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <div class="login-form">
            <!-- logo-login -->
            <div class="logo-login">
                <a href="index.html"><img src="assets/img/logo/loder.png" alt=""></a>
            </div>
            <h2>Login Here</h2>
            <div class="form-input">
                <label for="name">University Id</label>
                <input type="number" name="id" placeholder="0000">
            </div>
            <div class="form-input">
                <label for="name">Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="o-switch btn-group" data-toggle="buttons" role="group">
                <label class="btn btn-secondary active">
                    <input type="radio" name="options" id="student" autocomplete="off" value="student" checked> student
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="voluntary" autocomplete="off" value="voulnteer"> voluntary
                </label>

            </div>
            <div class="form-input pt-30">
                <input type="submit" name="submit" value="login">
            </div>

            <!-- Forget Password -->
            <a href="#" class="forget">Forget Password</a>
            <!-- Forget Password -->
            <a href="register.html" class="registration">Registration</a>
        </div>
    </form>
    <!-- /end login form -->
</main>

<?php

js_secript_bottom(); ?>