<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $to = $_POST["to"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $from = $_POST["from"];

    // Set the email headers
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 16px;
            padding: 20px;
        }

        form {
            margin: 20px auto;
            max-width: 800px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="text"],
        textarea {
            background-color: #333;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            padding: 10px;
            width: 100%;
        }

        input[type="submit"] {
            background-color: red;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            padding: 10px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #cc0000;
        }

        @media screen and (max-width: 600px) {
            body {
                font-size: 14px;
                padding: 10px;
            }

            input[type="email"],
            input[type="text"],
            textarea {
                font-size: 14px;
                padding: 5px;
            }

            input[type="submit"] {
                font-size: 14px;
                padding: 5px;
            }
        }

        /* Added CSS */
        @media screen and (min-width: 600px) {
            form {
                margin: 20px auto;
                max-width: 600px;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h2>Email Form</h2>
    <form method="post">
        <label for="from">From:</label>
        <input type="email" id="from" name="from" required>
        
        <label for="to">To:</label>
        <input type="email" id="to" name="to" required>
        
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>
        
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="10" required></textarea>
        
        <input type="submit" value="Send Email">
    </form>
</body>
</html>
