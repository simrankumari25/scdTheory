<?php

include 'db.php';
session_start();
$id= $_GET['id'];

$sql1 = "SELECT * FROM user WHERE id = $id";
$result1 = $conn->query($sql1);
$candidate = mysqli_fetch_assoc($result1);

$sql2 = "SELECT * FROM user_education WHERE user_id = $id";
$result2 = $conn->query($sql2);
$education = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM user_about WHERE user_id = $id";
$result3 = $conn->query($sql3);
$about = mysqli_fetch_assoc($result3);

$sql4 = "SELECT * FROM user_experience WHERE user_id = $id";
$result4 = $conn->query($sql4);
$experience = mysqli_fetch_assoc($result4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $candidate['name'];?> - CV</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e6f3ef, #c2ddd6);
            margin: 0;
            padding: 0;
            color: #2f4f4f;
        }

        .cv {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fffefc;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .cv:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            color: #22443c;
            font-size: 30px;
            margin-bottom: 5px;
        }

        .info {
            text-align: center;
            margin-bottom: 30px;
            color: #3e6b5a;
        }

        h2 {
            color: #3e6b5a;
            border-bottom: 2px solid #7c9a92;
            padding-bottom: 5px;
            margin-top: 30px;
        }

        p {
            line-height: 1.7;
            font-size: 16px;
            margin: 5px 0 10px;
        }

        b {
            color: #2c3e50;
        }

        .section {
            margin-bottom: 25px;
        }

        .education p, .experience p {
            margin-left: 15px;
        }

        .cv-footer {
            text-align: center;
            font-size: 14px;
            color: #6b7d75;
            margin-top: 30px;
            border-top: 1px solid #d5e0dc;
            padding-top: 10px;
        }

        @media screen and (max-width: 768px) {
            .cv {
                width: 90%;
                padding: 25px;
            }
        }
    </style>
</head>
<body>
    <div class="cv">
        <h1><?php echo $candidate['name']; ?></h1>
        <p><?php echo $candidate['email']; ?></p>
        <p><?php echo $candidate['contact']; ?></p>
        <p><?php echo $candidate['address']; ?></p>

        <h2>About</h2>
        <p><?php echo $about['about_text']; ?></p>

        <h2>Skills</h2>
        <p><b>Soft Skill: </b> <?php echo $about['soft_skills']; ?></p>
        <p><b>Technical Skill: </b> <?php echo $about['tech_skills']; ?></p>

        <h2>Education</h2>
        <p><b>Matric:</b> <?php echo $education['school_name']; ?> - <?php echo $education['matric_subject']; ?> (<?php echo $education['matric_start']; ?> - <?php echo $education['matric_end']; ?>)</p>
        <p><b>Intermediate:</b> <?php echo $education['college_name']; ?> - <?php echo $education['inter_subject']; ?> (<?php echo $education['inter_start']; ?> - <?php echo $education['inter_end']; ?>)</p>
        <p><b>University:</b> <?php echo $education['uni_name']; ?> - <?php echo $education['uni_degree']; ?> (<?php echo $education['uni_start']; ?> - <?php echo $education['uni_end']; ?>)</p>

        <h2>Awards / Certificates</h2>
        <p><?php echo $about['award']; ?></p>

        <h2>Experience</h2>
        <p><b><?php echo $experience['company_name']; ?></b> — <?php echo $experience['position']; ?> (<?php echo $experience['start_date']; ?> - <?php echo $experience['end_date']; ?>)</p>
        <p><?php echo $experience['description']; ?></p>
    </div>
</body>
</html>