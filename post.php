<?php

require("db.php");

$name=$_POST["name"];
$studentid=$_POST["studentid"];
$phone=$_POST["phone"];
$gender=$_POST["gender"];
$dob=$_POST["dob"];


$query=$con->prepare("INSERT INTO `lal`(`name`, `studentid`, `phone`, `gender`,`dob`) VALUES ('$name','$studentid','$phone','$gender','$dob')");
$result=$query->execute();

if($result==true){
    header("Location: list.php");
} else {
    echo "Could not save";
}

?>