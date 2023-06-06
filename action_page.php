<?php
    $to      = "ashley@scarletai.xyz";
    // Get the subject from the URL parameter
    $subject = $_GET['subject'];
    // Combine the firstname, lastname, and $subject into a message
    $message = $_GET['firstname'] . " " . $_GET['lastname'] . ":\n" . $subject;
    $headers = 'From: no-reply@scarletai.xyz' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    // Redirect back to the index.html page
    header("Location: index.html");
?>
