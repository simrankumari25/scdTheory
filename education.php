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
    <title>Education Details</title>
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

        h4 {
            color: #27463f;
            margin-top: 25px;
            border-left: 4px solid #6fa68d;
            padding-left: 8px;
            font-size: 18px;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            margin: 8px 0 15px 0;
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
            margin-top: 15px;
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
        <h2>Step 2: Educational Details</h2>
        <form method="POST">
            <h4>Matric</h4>
            <input type="text" id="school_name" name="school_name" placeholder="Enter your school name">
            <input type="text" id="matric_subject" name="matric_subject" placeholder="Enter your subject">
            <input type="text" id="matric_start" name="matric_start" placeholder="Start year">
            <input type="text" id="matric_end" name="matric_end" placeholder="End year">

            <h4>Intermediate</h4>
            <input type="text" id="college_name" name="college_name" placeholder="Enter your college name">
            <input type="text" id="inter_subject" name="inter_subject" placeholder="Enter your subject">
            <input type="text" id="inter_start" name="inter_start" placeholder="Start year">
            <input type="text" id="inter_end" name="inter_end" placeholder="End year">

            <h4>University</h4>
            <input type="text" id="uni_name" name="uni_name" placeholder="Enter your university name">
            <input type="text" id="degree_name" name="degree_name" placeholder="Enter your degree name">
            <input type="text" id="uni_start" name="uni_start" placeholder="Start year">
            <input type="text" id="uni_end" name="uni_end" placeholder="End year">

            <button type="submit" name="next">Next -> About</button>
        </form>

        <?php

        if($_SERVER["REQUEST_METHOD"]== "POST"){
            $school_name = $_POST['school_name'];
            $school_subject = $_POST['matric_subject'];
            $matric_start = $_POST['matric_start'];
            $matric_end = $_POST['matric_end'];

            $college_name = $_POST['college_name'];
            $college_subject = $_POST['inter_subject'];
            $inter_start = $_POST['inter_start'];
            $inter_end = $_POST['inter_end'];

            $uni_name = $_POST['uni_name'];
            $degree_name = $_POST['degree_name'];
            $uni_start = $_POST['uni_start'];
            $uni_end = $_POST['uni_end'];

            $sql = "INSERT INTO user_education(user_id, school_name, matric_subject, matric_start, matric_end,
                    college_name, inter_subject, inter_start, inter_end, uni_name, uni_degree, uni_start, uni_end) values
                    ($id, '$school_name', '$school_subject', '$matric_start', '$matric_end', '$college_name', '$college_subject',
                    '$inter_start', '$inter_end', '$uni_name', '$degree_name', '$uni_start', '$uni_end')";

            $conn->query($sql);
            header("Location: about.php");
            exit;
        }

        ?>
    </div>
</body>
</html>