<?php
# You can use this script to submit your forms or to receive orders by email.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get form inputs
	$n = strip_tags(trim($_POST["name"]));
	$surname = strip_tags(trim($_POST["surname"]));
	$email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
	$phone = trim($_POST["phone"]);
	$date = trim($_POST["date"]);
	$notes = trim($_POST["notes"]);
	$number = trim($_POST["number"]);

	$guest_num = (int) $number;

	$email_content = "<html>
    <head>
        <title>Contact Form Submission</title>
    </head>
    <body>Thank You for choosing Budva Canyoning! Our team will message You shortly.<br><br>";
	$email_content .= "Your info is shown below, please double check it in case You missed something.<br><br>";
	$email_content .= "Name: $n<br>";
	$email_content .= "Surname: $surname<br>";
	$email_content .= "Mail: $email<br>";
	$email_content .= "Phone number: $phone<br>";
	$email_content .= "Date: $date<br>";
	$email_content .= "Number of guests: $number<br>";
	$email_content .= "Dimensions: <br>";
	for ($i = 1; $i <= $guest_num; $i++) {
		$email_content .= "Guest " . $i . "<br>";
		$guest_index = "guest_" . $i . "_height";
		$guest_height = $_POST[$guest_index];
		$guest_index = "guest_" . $i . "_weight";
		$guest_weight = $_POST[$guest_index];
		$guest_index = "guest_" . $i . "_shoe_size";
		$guest_shoe_size = $_POST[$guest_index];
        $guest_index = "guest_".$i."_suit_model";
        $guest_suit_model = $_POST[$guest_index];
        if (
            empty($guest_height) ||
            empty($guest_weight) ||
            empty($guest_shoe_size) ||
            empty($guest_suit_model)
		) {
            http_response_code(400);
            echo "Please go back, complete the form and try again.";
            exit;
        }
        $email_content .= "Height: $guest_height cm<br>";
		$email_content .= "Weight: $guest_weight kg<br>";
		$email_content .= "Shoe size: $guest_shoe_size<br>";
        $email_content .= "Canyoning suit model: $guest_shoe_size<br>";

	}
	$price = $guest_num * 80;
	$email_content .= "Price: $price €<br>";
	$email_content .= "Additional notes: $notes<br><br>";
	$email_content .= "Get ready for an unforgettable adventure!<br><br>Sincerely,<br>Budva Canyoning";

	$min = 10000000000;
	$max = 99999999999;

	$res_num = mt_rand($min, $max);
	$MailToAddress = "budvacanyoning@gmail.com"; // your email address
	$redirectURL = "https://www.budvacanyoning.com/thank_you.php"; // the URL of the thank you page.
	$MailSubject = 'Thank you ' . $n . ' ' . $surname . '! Reservation no. ' . $res_num; // the subject of the email

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= "From: {$MailToAddress}" . "\r\n";
	$headers .= "Reply-To: {$MailToAddress}" . "\r\n";


	if (!mail($email, $MailSubject, $email_content, $headers)) {
		echo "Error sending e-mail!";
	} else {		
		if (!mail($MailToAddress, $MailSubject, $email_content, $headers)) {
			echo "Error sending e-mail!";
		}
		header("Location: " . $redirectURL);
	}
}