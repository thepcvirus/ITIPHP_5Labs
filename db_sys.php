<?php
require_once("dbconf.php");
class db_sys
{
    private $db;

    public function __construct()
    {
        $this->db = new Dbconf();
        var_dump($this->db->conn);
    }

    function insert($name, $lname, $password, $address, $country, $gender, $skills, $email, $timestamp, $image):bool 
    {
        $sql = "INSERT INTO `users`(`name`, `lname`, `password`, `address`, `country`, `gender`, `skills`, `email`, `timestamp`, `image`) VALUES ($name, $lname, $password, $address, $country, $gender, $skills, $email, $timestamp, $image)";
        if ($this->db->conn->query($sql)) {
            echo "New record created successfully using oop" . "<br>";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->conn->connect_error;
            return false;
        }
    }
}
