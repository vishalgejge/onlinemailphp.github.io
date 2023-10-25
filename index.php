<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="" method="POST">
        Name: <input type="text" name="name"><br>
        Email: <input type="email" name="email"><br>
        Message: <textarea name="message"></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    
    <?php
    if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
            exit;
        }

        echo $to = $email; 

        $subject = "New Form Submission";

        // $smtpHost = "smtp.gmail.com";
        // $smtpUsername = "vishalgejge04@gmail.com"; 
        // $smtpPassword = "LahsivMI@#654321"; 
        // $smtpPort = 587; 

        $headers = "From: $smtpUsername\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();


        // ini_set("SMTP", $smtpHost);
        // ini_set("smtp_port", $smtpPort);
        // ini_set("sendmail_from", $smtpUsername);
        // error_log("Error: Email could not be sent", 3, "error.log");


        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully";
        } else {
            echo "Email could not be sent";
        }
    }
    ?>
</body>
</html>
