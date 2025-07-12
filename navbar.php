<?php session_start(); ?>
<div style="background-color: antiquewhite; text-align: center; padding:5px; justify-content: space-between; display: flex;">
    <a href="index.php">Home</a>
    <a href="signup.php">signup</a>
    <a href="table.php">Table</a>
    <?php if(isset($_SESSION["islogged"])  && $_SESSION["islogged"] == "true"): ?>
        <a href="logout.php">Logout</a>
    <?php endif;
    if(!isset($_SESSION["islogged"])  || $_SESSION["islogged"] == "false"): ?>
    <a href="login.php">Login</a>
    <?php endif?>
    
</div>
