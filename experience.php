<?php

include 'db.php';
session_start();
$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience</title>
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
        <h2>Step 4: Experience</h2>
        <form method="POST">
            <label for="company">Company</label>
            <input type="text" name="company" id="company">
            
            <label for="position">Position</label>
            <input type="text" name="position" id="position">
            
            <label for="start_date">Start Date</label>
            <input type="text" name="start_date" id="start_date">
            
            <label for="end_date">End Date</label>
            <input type="text" name="end_date" id="end_date">
            
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>

            <button type="submit" name="finish">Finish</button>

        </form>

        <?php

        if($_SERVER["REQUEST_METHOD"]== "POST"){
            $company = $_POST['company'];
            $position = $_POST['position'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $description = $_POST['description'];

            $sql = "INSERT INTO user_experience (user_id, company_name, position, start_date, end_date, description) 
                    values ($id, '$company', '$position', '$start_date', '$end_date', '$description')";

            $conn->query($sql);
            header("Location: generate.php");
            exit;
        }

        ?>
    </div>
</body>
</html>