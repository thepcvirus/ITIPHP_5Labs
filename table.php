<?php
// Read the file and convert it to a proper JSON array
$jsonData = '[' . str_replace("}\n{", "},{", file_get_contents('data.txt')) . ']';

// Decode the JSON
$rows = json_decode($jsonData, true);

// Check for errors
if (!$rows) {
    die("Error reading data: Invalid JSON format");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>

</head>
<body>
    <?php include("navbar.php") ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Password</th>
            <th>Email</th>
            <th>Address</th>
            <th>Skills</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Timestamp</th>
            <th>Image Name</th>
        </tr>

        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['lname'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['address'] ?></td>
                <td>
                    <?php 
                    if (is_array($row['skills'])) {
                        echo implode(', ', $row['skills']);
                    } else {
                        echo $row['skills'] ;
                    }
                    ?>
                </td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['country']  ?></td>
                <td><?= $row['timestamp'] ?></td>
                <td><?= $row['image'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>