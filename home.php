<?php

include 'db.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e6f3ef, #c2ddd6);
            margin: 0;
            padding: 0;
            color: #2c3e50;
        }

        .container {
            width: 700px;
            margin: 60px auto;
            background-color: #fffefc;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            transition: 0.3s;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            color: #22443c;
            font-size: 28px;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        h2 {
            text-align: center;
            color: #3e6b5a;
            margin-bottom: 30px;
            font-size: 20px;
        }

        label {
            font-weight: 500;
            color: #2f4f4f;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            margin: 10px 0 20px 0;
            border: 1px solid #cfd8d3;
            border-radius: 8px;
            background-color: #f8f9f8;
            font-size: 15px;
            transition: 0.3s;
        }

        input:focus {
            border-color: #6fa68d;
            background-color: #ffffff;
            outline: none;
            box-shadow: 0 0 5px rgba(111, 166, 141, 0.4);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #6fa68d;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #598c75;
            transform: scale(1.02);
        }

        textarea {
            width: 100%;
            padding: 10px 12px;
            margin: 10px 0 20px 0;
            border: 1px solid #cfd8d3;
            border-radius: 8px;
            background-color: #f8f9f8;
            font-size: 15px;
            resize: none; /* disables drag-resize corner */
            transition: 0.3s;
            height: 80px;
        }

        textarea:focus {
            border-color: #6fa68d;
            background-color: #ffffff;
            outline: none;
            box-shadow: 0 0 5px rgba(111, 166, 141, 0.4);
        }
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CV Generation System</h1>
        <h2>Step 1: Personal Information</h2>
        <form method="POST">
            <label for="name">Full name</label>
            <input id="name" name="name" type="text" placeholder="Enter your name" required>

            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="Enter your email" required>
            
            <label for="conatct">Contact</label>
            <input id="contact" name="contact" type="text" placeholder="Enter your contact" required>
            
            <label for="address">Address</label>
            <textarea name="address" id="address" placeholder="Enter your address" required></textarea>

            <button type="submit" name="next">Next -> Education</button>

        </form>

        <?php

        if($_SERVER["REQUEST_METHOD"]== "POST"){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];

            $sql = "INSERT INTO user (name, email, contact, address) values ('$name', '$email', '$contact', '$address')";
            $conn->query($sql);

            $_SESSION['id'] = mysqli_insert_id($conn);
            header("Location: education.php");
            exit;
        }

        ?>
    </div>
</body>
</html>