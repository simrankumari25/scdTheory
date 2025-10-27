<?php

include 'db.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate CV</title>
    <style>
        body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #e6f3ef, #c2ddd6);
        margin: 0;
        padding: 0;
        color: #2c3e50;
        }

        .container {
            width: 85%;
            max-width: 900px;
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
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        h2 {
            text-align: center;
            color: #3e6b5a;
            margin-bottom: 25px;
            font-size: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dfe8e5;
            font-size: 15px;
        }

        th {
            background-color: #6fa68d;
            color: white;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f3f9f7;
        }

        .btn {
            display: inline-block;
            background-color: #6fa68d;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #598c75;
            transform: scale(1.05);
        }

        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
                padding: 25px;
            }

            th, td {
                font-size: 14px;
            }

            .btn {
                font-size: 13px;
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CV Generation System</h1>
        <h2>All Candidates</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>

            <?php

            $result = $conn->query("SELECT * FROM user");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td class='actions'>
                        <a href='cv.php?id={$row['id']}' class='btn'>Generate CV</a>";
                    echo "</tr>";
                }
            }else{
                echo "<tr><td>No candidates found!</td></tr>";
            }

            ?>
        </table>
    </div>
</body>
</html>