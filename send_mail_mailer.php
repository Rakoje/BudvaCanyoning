<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs
    $name = strip_tags(trim($_POST["name"]));
    $surname = strip_tags(trim($_POST["surname"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $date = trim($_POST["date"]);
    $notes = trim($_POST["notes"]);
    $number = trim($_POST["number"]);

    $guest_num = (int)$number;

    // Validate inputs (simple validation, you can enhance it as needed)
    if (!empty($name) &&
        !empty($date) &&
        !empty($number) &&
        filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->SMTPDebug = 0;                                        // Disable verbose debug output
            $mail->isSMTP();                                             // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
            $mail->Username   = 'budvacanyoning@gmail.com';              // SMTP username
            $mail->Password   = 'kjiugucyixecnlch';                      // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                     // TCP port to connect to

            // Recipients
            $mail->setFrom('budvacanyoning@gmail.com', 'Budva Canyoning');
            $mail->addAddress('budvacanyoning@gmail.com', 'Budva Canyoning');
            $mail->addAddress($email, $name.' '.$surname);

            $email_content = "Thank You for choosing Budva Canyoning! Our team will message You shortly.<br><br>";
            $email_content .= "Your info is shown below, please double check it in case You missed something.<br><br>";
            $email_content .= "Name: $name<br>";
            $email_content .= "Surname: $surname<br>";
            $email_content .= "Mail: $email<br>";
            $email_content .= "Phone number: $phone<br>";
            $email_content .= "Date: $date<br>";
            $email_content .= "Number of guests: $number<br>";
            $email_content .= "Dimensions: <br>";
            for($i = 1; $i <= $guest_num; $i++){
                $email_content .= "Guest ".$i."<br>";
                $guest_index = "guest_".$i."_height";
                $guest_height = $_POST[$guest_index];
                $guest_index = "guest_".$i."_weight";
                $guest_weight = $_POST[$guest_index];
                $guest_index = "guest_".$i."_shoe_size";
                $guest_shoe_size = $_POST[$guest_index];
                $email_content .="Height: $guest_height cm<br>";
                $email_content .="Weight: $guest_weight kg<br>";
                $email_content .="Shoe size: $guest_shoe_size<br>";
                if(empty($guest_height) ||
                    empty($guest_weight) ||
                    empty($guest_shoe_size)){
                    http_response_code(400);
                    echo "Please go back, complete the form and try again.";
                    exit;
                }
            }
            $price = $guest_num * 80;
            $email_content .= "Price: $price €<br>";
            $email_content .= "Additional notes: $notes<br><br>";
            $email_content .= "Get ready for an unforgettable adventure!<br><br>Sincerely,<br>Budva Canyoning";

            $min = 10000000000;
            $max = 99999999999;

            $res_num = mt_rand($min, $max);
            $mail->Subject = 'Thank you '.$name.' '.$surname.'! Reservation no. '.$res_num;
            $mail->Body    = $email_content;
            $mail->isHTML(true);

            $mail->send();
            header('Location: thank_you.php');
            exit();
        } catch (Exception $e) {
            echo '<script type="text/javascript">';
            echo 'alert("Sorry, something went wrong. Try booking us a bit later.");';
            echo '</script>';
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'All fields are required.';
    }
} else {
    echo 'Invalid request method.';
}
?>
