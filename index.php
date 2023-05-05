<?php
$statusMessage = "";
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
        $statusMessage = "Email sent successfully.";
    } else {
        $statusMessage = "Email sending failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FastMailerPHP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #111;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
            color: #fff;
        }

        form {
            width: 100%;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #222;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 10px;
            color: #fff;
        }

        input[type="email"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: 400;
            color: #fff;
            background-color: #333;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        input[type="email"]:focus,
        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        textarea {
            height: 150px;
            resize: none;
        }

        input[type="submit"] {
            background-color: #ff4444;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
           input[type="submit"]:hover {
        background-color: #ff3333;
    }

    @media screen and (max-width: 768px) {
        form {
            padding: 20px;
        }
    }

    @media screen and (max-width: 480px) {
        h1 {
            font-size: 28px;
        }

        form {
            max-width: 350px;
        }

        input[type="submit"] {
            font-size: 16px;
        }
    }
</style>
</head>
<body>
    <div class="container">
        <h1>FastMailerPHP</h1>
        <form method="post">
            <label for="from">From</label>
            <input type="email" id="from" name="from" required>
            <label for="to">To</label>
            <input type="email" id="to" name="to" required>
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required>
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="10" required></textarea>
            <input type="submit" value="Send">
            <p style="color: #fff;"><?php echo $statusMessage; ?></p>
        </form>
    </div>
</body>
</html>
