<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $firstName = htmlspecialchars(stripslashes(trim($_POST['firstname'])));
    $lastName = htmlspecialchars(stripslashes(trim($_POST['lastname'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    $to = 'szyszka518@yahoo.co.uk'; // <<<<< Change this to your email address
    $subject = 'New Contact Form Submission';
    $msg = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $firstName $lastName\n\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Send the email
    if(mail($to, $subject, $msg, $headers)) {
        echo "Thank You! Your message has been sent.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>
