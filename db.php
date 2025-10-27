<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "generate_cv_db";

$conn = new mysqli($servername, $username, $password);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

$conn->query("CREATE TABLE IF NOT EXISTS user (id int auto_increment primary key, name varchar(100), email varchar(100), contact varchar(100), address TEXT)");
$conn->query("CREATE TABLE IF NOT EXISTS user_education (id int auto_increment primary key, user_id int references user(id),
            school_name varchar(200),matric_subject varchar(100), matric_start varchar(10), matric_end varchar(10),
            college_name varchar(200),inter_subject varchar(100), inter_start varchar(10), inter_end varchar(10),
            uni_name varchar(200),uni_degree varchar(100), uni_start varchar(10), uni_end varchar(10))");
$conn->query("CREATE TABLE IF NOT EXISTS user_about (id int auto_increment primary key, user_id int references user(id), 
            about_text TEXT, soft_skills TEXT, tech_skills TEXT, award TEXT)");
$conn->query("CREATE TABLE IF NOT EXISTS user_experience (id int auto_increment primary key, user_id int references user(id), 
            company_name varchar(200), position varchar(200), start_date varchar(20), end_date varchar(20), description TEXT)");

?>