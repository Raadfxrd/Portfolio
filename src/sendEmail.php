<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load environment variables from .env file
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

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
        $mail->Host = $_ENV['SMTP_HOST']; 
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME']; 
        $mail->Password = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $_ENV['SMTP_PORT'];

        // Set the From address to an authorized email address
        $mail->setFrom($_ENV['SMTP_USERNAME'], 'De Elektraman');
        // Set the Reply-To address to the user's email address
        $mail->addReplyTo($email, $name);
        // Add the recipient address
        $mail->addAddress($_ENV['SMTP_USERNAME']);

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
        echo json_encode(["status" => "error", "message" => "Email could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
    }
}