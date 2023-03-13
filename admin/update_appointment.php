<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/xampp/sendmail/phpmailer/src/Exception.php';
require '/xampp/sendmail/phpmailer/src/PHPMailer.php';
require '/xampp/sendmail/phpmailer/src/SMTP.php';
require '../admin/connect.php';


if (isset($_POST['appointment_id'])) {
	$id=$_POST['appointment_id'];
	$status=$_POST['status_id'];

	$sql="UPDATE appointment SET status = '$status' WHERE id='$id'";
	$query=mysqli_query($conn,$sql);


	if($status == 1){
		$email_msg="your appointment accept please visit now";
	}
	else{
		$email_msg="your appointment not accept";
	} 

	$sql2="SELECT * from appointment WHERE id='$id'";
	$que=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($que) > 0){
		$mail=new PHPMailer(true);
		$mail->IsSMTP();
		$mail->Host ='ssl://smtp.gmail.com';	
		$mail->SMTPAuth = true;
		$mail->Username='maulik.eww@gmail.com';
		$mail->Password ='tlmkzahlhyuwtsiv';
		$mail->SMTPSecure='ssl';
		$mail->Body =$email_msg ;
		$mail->Port = 465;
		$mail->isHTML(true); 
		$mail->Subject = "Appointment Status";

		while($row=mysqli_fetch_assoc($que)){
			$mail->addAddress($row['email']);
		};
		if(!$mail->send()){
			echo "mailer error".$mail->ErrorInfo;
		}
		else
		{
			echo "Message has been sent";
		}	
	}	
}

?>

