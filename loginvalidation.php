<?php
$searchEmail = $_POST['email'] ?? '';
if (empty($searchEmail)) {
    die("Please enter an email to search");
}

$found = false;
$file = fopen("data.txt", "r");

while ($line = fgets($file)) {
    $record = json_decode($line, true);
    if (isset($record['email']) && $record['email'] == $searchEmail) {
        $found = true;
        echo "<h2>Found Record:</h2>";
        echo "<pre>".print_r($record, true)."</pre>";

        if ($record['password'] == md5($_POST['password'])) {
            session_start();
            $_SESSION['islogged'] = "true";
            $_SESSION["name"] = $record['name'];
            $_SESSION["lname"] = $record['lname'];
            $_SESSION["email"] = $record['email'];
            $_SESSION["image"] = $record['image'];
            echo "<h2>Logged In Successfully</h2>";
            header("Location: index.php");    
        }
        break;
    }
}

fclose($file);

if (!$found) {
    echo "No record found for: ".htmlspecialchars($searchEmail);
}