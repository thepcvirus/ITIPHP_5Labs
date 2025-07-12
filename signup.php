<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Method Form Example</title>
</head>

<body>
    <?php include("navbar.php") ?>
    <form action="./signvalidation.php" method="post" enctype="multipart/form-data">
        <?php 
        if($_SESSION['SignUpError'] == "" || !isset($_SESSION['SignUpError'])){
            echo 'Sign Up';
        }
        else{
            echo 'Sign Up Error';
            echo $_SESSION['SignUpError'];
        }  ?>
        <br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="name">Last Name:</label>
        <input type="text" id="lname" name="lname" required>
        <br>
        <label for="name">Address:</label>
        <textarea type="text" id="Address" name="address" required></textarea>
        <br>
        <select name="country" required>
            <option value="EG">Egypt</option>
            <option value="SA">Saudi Arabia</option>
            <option value="UA">UAE</option>
            <option value="SU">Sudan</option>
        </select>

        <br>
        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>

        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>

        <br>
        <label>Skills:</label>
        <input type="checkbox" name="skills[]" value="php">
        <label>PHP</label>

        <input type="checkbox" name="skills[]" value="mysql">
        <label>MySQL</label>

        <input type="checkbox" name="skills[]" value="js">
        <label>JavaScript</label>

        <input type="checkbox" name="skills[]" value="html">
        <label>HTML</label>

        <br>

        <label for="name">password:</label>
        <input type="password" id="lname" name="password" required>
        <br>
        <label for="email">Email:</label>
        <input value="12sdafsadfdas3@mail.com" type="email" id="email" name="email" required>
        <br>

        <label>File </label>
        <input type="file" name="file" required/>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>