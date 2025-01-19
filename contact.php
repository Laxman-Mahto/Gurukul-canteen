<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form input to avoid XSS and other issues
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Check if all fields are filled out
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Set the recipient email address (replace with your email)
        $to = "laxmanmahto003@gmail.com";  // Replace with your email
        $subject = "New message from $name";
        
        // Compose the email body
        $body = "You have received a new message from $name ($email).\n\nMessage:\n$message";
        
        // Set the headers
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        
        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            // Success: Display a thank-you message
            echo "<p>Thank you for your message, $name! We'll get back to you soon.</p>";
        } else {
            // Failure: Display an error message
            echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
        }
    } else {
        // If any field is empty, show an error message
        echo "<p>Please fill in all fields.</p>";
    }
} else {
    // If the form wasn't submitted correctly, redirect to the contact page
    header("Location: index.html");
}
?>
