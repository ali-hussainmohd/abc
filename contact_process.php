<?php
session_start();
require("functions/function.php");
/*$to = "rockybd1995@gmail.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $number = $_REQUEST['number'];
    $cmessage = $_REQUEST['message'];

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "You have a message from your Bitmap Photography.";

    $logo = 'img/logo.png';
    $link = '#';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);*/





	$con =  connection();

	


			if (isset($_POST['comment_send_btn'])) {
				$messOption = $_POST['messageOptions'];
				$message = $_POST['message'];

				if(isset($_SESSION["name"])){
					$__name = $_SESSION["name"];
					$userID= $_SESSION["uni_id"];
				}
				
				else{
					$__name = $_SESSION["voulnteer_name"];
					$userID= $_SESSION["voulnteer_id"];
				}
				

				$_email = $_POST['email'];
				$__subject = $_POST['subject'];


				$sql = "INSERT INTO `comment`(`student_id`, `student_name`, `type`, `msg`, `date`)
				VALUES ('".$userID."','".$__name."','".$messOption."','".$message."','". date("Y-m-d")."')";

				 
				if (mysqli_query($con, $sql)) {

					echo "<script> alert('{$data[1]} {$__name}  add comment successfully.');</script>";
						//refresh page
					  //echo "<meta http-equiv='refresh' content='0'>";
					  header('Location: comment.php');
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($con);
				}
				$con->close();
			}

