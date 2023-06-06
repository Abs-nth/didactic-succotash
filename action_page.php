<?php
    if($_POST) {
        $visitor_name = "";
        $email_title = "New Contact Request!";
        $visitor_message = "";
        $email_body = "<div>";
        if(isset($_POST['firstname']) && isset($_POST['lastname'])) {
            $visitor_name = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            $visitor_name .= " " . filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
            $email_body .= "<div><label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span></div>";
        }
        if(isset($_POST['subject'])) {
            $visitor_message = htmlspecialchars($_POST['subject']);
            $email_body .= "<div><label><b>Visitor Message:</b></label><div>"
                .$visitor_message
                ."</div></div>";
        }
        $email_body .= "</div>";
        $headers  = 'MIME-Version: 1.0' 
            . "\r\n".'Content-type: text/html; charset=utf-8' 
            . "\r\n".'From: no-reply@scarletai.xyz'
            . "\r\n";
        if(mail("ashley@scarletai.xyz", $email_title, $email_body, $headers)) {
            // Let them know their message was sent then redirect them back to the index page after 5 seconds.
            echo '<p>Thank you for contacting us, '.$visitor_name.'. You will get a reply within 24 hours.</p>';
            header("refresh:5;url=index.html");
        } else {
            echo '<p>We are sorry but the email did not go through.</p>';
            header("refresh:5;url=index.html");
        }
    } else {
        echo '<p>Something went wrong</p>';
        header("refresh:5;url=index.html");
    }
?>
