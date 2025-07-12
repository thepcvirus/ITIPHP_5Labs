<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("navbar.php"); ?>
    <?php 
    session_start();
    if(isset($_SESSION['islogged']) && $_SESSION['islogged'] == "true"){

    }
    else{
        header("Location: login.php");
    }
    ?>


<h1>User Profile</h1>
    

        <img src="<?php echo 'files/' . $_SESSION['image']; ?>" alt="Profile Image" width="150">
    
    <table>
        <tr>
            <td><strong>First Name:</strong></td>
            <td><?php echo $_SESSION['name']; ?></td>
        </tr>
        <tr>
            <td><strong>Last Name:</strong></td>
            <td><?php echo $_SESSION['lname']?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo $_SESSION['email'] ?></td>
        </tr>
    </table>

</body>
</html>