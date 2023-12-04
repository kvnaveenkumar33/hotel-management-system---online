<?php

include '../config.php';

$id = $_GET['id'];
$roombooktablesql = "SELECT * FROM payment WHERE id = $id";
$roombookresult = mysqli_query($conn, $roombooktablesql);
$nums = mysqli_num_rows($roombookresult);
$res = mysqli_fetch_array($roombookresult);

$ids = $res['id'];
$name = $res['Name'];
$email = $res['Email'];
$rt = $res['RoomType'];
$bed = $res['Bed'];
$cin = $res['cin'];
$cout = $res['cout'];
$d = $res['noofdays'];
$tot = $res['finaltotal'];
$in = "INSERT INTO alldetails(id,Name,Email,RoomType,Bed,cin,cout,noofdays,finaltotal) VALUES ('$ids','$name','$email','$rt','$bed','$cin','$cout','$d','$tot')";
$result0 = mysqli_query($conn, $in);

$deletesql = "DELETE FROM roombook WHERE id = $id";

$result = mysqli_query($conn, $deletesql);

$deletesql1 = "DELETE FROM payment WHERE id = $id";

$result1 = mysqli_query($conn, $deletesql1);
header("Location:roombook.php");

?>