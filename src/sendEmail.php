<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Update the paths to the PHPMailer files
require __DIR__ . '/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ . '/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the raw POST data
    $rawData = file_get_contents("php://input");
    $data = json_decode($rawData, true);

    $name = isset($data['name']) ? htmlspecialchars($data['name']) : null;
    $email = isset($data['email']) ? htmlspecialchars($data['email']) : null;
    $phone = isset($data['phone']) ? htmlspecialchars($data['phone']) : null;
    $message = isset($data['message']) ? htmlspecialchars($data['message']) : null;

    if (!$name || !$email || !$phone || !$message) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.strato.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'sandro@deelektraman.com'; 
        $mail->Password = 'Koniara11!!';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Set the From address to an authorized email address
        $mail->setFrom('sandro@deelektraman.com', 'De Elektraman');
        // Set the Reply-To address to the user's email address
        $mail->addReplyTo($email, $name);
        // Add the recipient address
        $mail->addAddress('sandro@deelektraman.com');

        $mail->isHTML(true);
        $mail->Subject = "Contact Form Submission from $name";
        $mail->Body = "<h2>Nieuw bericht!</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone number:</strong> $phone</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
            <hr>
            <p>This email was sent from the contact form on De Elektraman website.</p>";

        $mail->send();
        echo json_encode(["status" => "success", "message" => "Email sent successfully."]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Failed to send email. Mailer Error: {$mail->ErrorInfo}"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

?>