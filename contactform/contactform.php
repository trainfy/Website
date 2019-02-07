<?php
require("../lib/sendgrid-php/sendgrid-php.php");

// /***************** Configuration *****************/

//   // Replace with your real receiving email address
//   $contact_email_to = "moustafaelhadary96@gmail.com";

//   // Title prefixes
//   $subject_title = "Contat Form Message:";
//   $name_title = "Name:";
//   $email_title = "Email:";
//   $message_title = "Message:";

//   // Error messages
//   $contact_error_name = "Name is too short or empty!";
//   $contact_error_email = "Please enter a valid email!";
//   $contact_error_subject = "Subject is too short or empty!";
//   $contact_error_message = "Too short message! Please enter something.";

// /********** Do not edit from the below line ***********/

//   if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
//     die('Sorry Request must be Ajax POST');
//   }

//   if(isset($_POST)) {

//     $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
//     $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
//     $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
//     $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

//     if(!$contact_email_to || $contact_email_to == 'contact@example.com') {
//       die('The contact form receiving email address is not configured!');
//     }

//     if(strlen($name)<3){
//       die($contact_error_name);
//     }

//     if(!$email){
//       die($contact_error_email);
//     }

//     if(strlen($subject)<3){
//       die($contact_error_subject);
//     }

//     if(strlen($message)<3){
//       die($contact_error_message);
//     }

//     if(!isset($contact_email_from)) {
//       $contact_email_from = "contactform@" . @preg_replace('/^www\./','', $_SERVER['SERVER_NAME']);
//     }

//     $headers = 'From: ' . $name . ' <' . $contact_email_from . '>' . PHP_EOL;
//     $headers .= 'Reply-To: ' . $email . PHP_EOL;
//     $headers .= 'MIME-Version: 1.0' . PHP_EOL;
//     $headers .= 'Content-Type: text/html; charset=UTF-8' . PHP_EOL;
//     $headers .= 'X-Mailer: PHP/' . phpversion();

//     $message_content = '<strong>' . $name_title . '</strong> ' . $name . '<br>';
//     $message_content .= '<strong>' . $email_title . '</strong> ' . $email . '<br>';
//     $message_content .= '<strong>' . $message_title . '</strong> ' . nl2br($message);

//     // $sendemail = mail($contact_email_to, $subject_title . ' ' . $subject, $message_content, $headers);

//     // if( $sendemail ) {
//     //   echo 'OK';
//     // } else {
//     //   echo 'Could not send mail! Please check your PHP mail configuration.';
//     // }
    
//     $from = new SendGrid\Email(null, $contact_email_from);
//     $to = new SendGrid\Email(null, "MoustafaElhadary96@gmail.com");
//     $content = new SendGrid\Content("text/plain", "Hello, Email!");
//     $mail = new SendGrid\Mail($from, $subject, $to, $message_content);
    
//     $apiKey = getenv('SENDGRID_API_KEY');
//     $sg = new \SendGrid($apiKey);
    
//     $response = $sg->client->mail()->send()->post($mail);
//     echo $response->statusCode();
//     echo $response->headers();
//     echo $response->body();
  // }
  
  $apiKey = getenv('SENDGRID_API_KEY');
  $FROM_EMAIL = 'Moustafa@psu.edu';
	// they dont like when it comes from @gmail, prefers business emails
	$TO_EMAIL = 'THE_PERSON_YOUR_WANT_TO_CONTACT';
	// Try to be nice. Take a look at the anti spam laws. In most cases, you must
	// have an unsubscribe. You also cannot be misleading.
	$subject = "YOUR_SUBJECT";
	$from = new SendGrid\Email(null, $FROM_EMAIL);
	$to = new SendGrid\Email(null, $TO_EMAIL);
	$htmlContent = '';
	// Create Sendgrid content
	$content = new SendGrid\Content("text/html",$htmlContent);
	// Create a mail object
	$mail = new SendGrid\Mail($from, $subject, $to, $content);
	
	$sg = new \SendGrid($API_KEY);
	$response = $sg->client->mail()->send()->post($mail);
			
	if ($response->statusCode() == 202) {
		// Successfully sent
		echo 'done';
	} else {
		echo $response;
	}
?>
