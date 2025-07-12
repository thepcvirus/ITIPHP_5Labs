<?php
require_once("dbsys.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $skills = $_POST['skills'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $file_name = "";
    if (empty($name) || empty($lname) || empty($email) || empty($gender)) {
        die("Please fill all required fields!");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }
    $file = fopen("data.txt", "a");
    if ($file === false) {
        die("Error opening file!");
    }

    if (isset($_FILES['file'])) {
        $errors = array();
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $ext = explode('.', $_FILES['file']['name']);
        $file_ext = strtolower(end($ext));
        $ext = pathinfo($file_name)["extension"];
        $extensions = array("jpeg", "jpg", "png", "pdf", "doc", "txt", "csv");
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "files/" . $file_name);
            echo "Success";
        } else {
            print_r($errors);
        }
    }

    $data = [
        'name' => $name,
        'lname' => $lname,
        'password' => md5($password),
        'address' => $address,
        'country' => $country,
        'gender' => $gender,
        'skills' => $skills,
        'email' => $email,
        'timestamp' => date('Y-m-d H:i:s'),
        'image' => $file_name,
    ];
    $dbs = new db_sys();
    $isDone = $dbs->insert($name, $lname, $password, $address, $country, $gender, $skills, $email, date('Y-m-d H:i:s'), $file_name);
    //function insert($name, $lname, $password, $address, $country, $gender, $skills, $email, $timestamp, $image)   {
    if (empty($errors)) {
        if ($isDone) {
            header("Location: table.php");
        } else {
            $_SESSION['SignUpError'] = "Data Not Recorded";
            header("Location: signup.php");
        }
    } else {
        $_SESSION['SignUpError'] = $errors;
        header("Location: signup.php");
    }

    $jsonData = json_encode($data, true) . "\n";
    fwrite($file, $jsonData);
    fclose($file);
    echo "<h2>Data Saved Successfully</h2>";


    if (empty($errors)) {
        header("Location: table.php");
    } else {
        $_SESSION['SignUpError'] = $errors;
        header("Location: signup.php");
    }
} else {
    header("Location: index.php");
    exit();
}
