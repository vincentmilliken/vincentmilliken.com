<?php

$subject = 'From vincentmilliken.com';

//If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'vincentamilliken@gmail.com'; // Put your own email address here
		$body = "Name: $name \n\nEmail: $email  \n\nComments:\n $comments";
		$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
?>
<?php include 'header.php'; ?>

	<section class="onerow wrapper">
	
	<div class="col5 contact">
		<h2>Need to Get in Touch?</h2>
		<p>I try to get to my emails pretty quickly, so you should be hearing from my soon. If you dont like using form you can always contact me via <a href="mailto:me@vincentmilliken.com">me@vincentmilliken.com</a></p>
	</div>
		
		<div class="col12">
			
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
					
					<?php if(isset($hasError)) {  ?>
						<p class="alert-message error">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
					<?php } ?>

					<?php if(isset($emailSent) && $emailSent == true) {  ?>
						<div class="alert-message success">
							<p><strong>Message Successfully Sent!</strong></p>
							<p>Thank you for using our contact form, <strong><?php echo $name;?></strong>! </p> <p>Your email was successfully sent and we&rsquo;ll be in touch with you soon.</p>
						</div>
					<?php } ?>
					
					<fieldset class="details">	
						<div class="name">
							<input type="text" name="contactname" id="contactname" value="" class="span6 required" role="input" aria-required="true" placeholder="Name"/>
						</div>	
					
						<div class="email">
							<input type="text" name="email" id="email" value="" role="input" aria-required="true" placeholder="Email"/>
						</div>	
					</fieldset>		

					<fieldset class="message">	
					  <textarea rows="8" name="message" id="message" class="span10 required" role="textbox" aria-required="true" placeholder="Your message..."></textarea>
						<!-- <input type="submit" class="work send" name="submit" id="submitButton" class="btn primary" title="Click here to submit your message!" /> -->
						<button type="submit" name="submit" id="submitButton" class="work send">Send Email</button>
					</fieldset>
				
				</fieldset>
			</form>
			
			</div>
		
	</section>


<?php include 'footer.php'; ?>
