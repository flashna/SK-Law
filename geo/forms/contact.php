<?php if(isset($_POST["username"])){
	// Read the form values
	$success = false;
	$userName = isset( $_POST['username'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['username'] ) : "";
	$subject = isset( $_POST['subject'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
	$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
	$message = isset( $_POST['contact_message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['contact_message'] ) : "";
	
	//Headers
	$to = "info@sklaw.ge"; // Please insert your email here
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8";

	//body message
	$message = "Name: ". $userName . "<br>
	Subject: ". $subject . "<br>
	Email: ". $senderEmail . "<br>
	Message: " . $message . "";
	
	//Email Send Function
    $send_email = mail($to, $subject, $message, $headers);
      
    // echo ($send_email) ? '<div class="success">Your message has been sent. Thank you!</div>' : 'Could not sent message';
    echo ($send_email) ? '<div class="success">თქვენი შეტყობინება წარმატებით გაიგზავნა</div>' : 'შეტყობინების გაგზავნა ვერ მოხერხდა';
} else {
	// echo '<div class="failed">Could not sent message</div>';
	echo '<div class="failed">შეტყობინების გაგზავნა ვერ მოხერხდა</div>';
}
?>
