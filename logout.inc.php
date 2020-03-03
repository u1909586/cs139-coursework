<?php require 'header.php';
$db = new SQLite3('ive_got_bills.db');
$notification = $_SESSION['expenses'];
$userID = $_SESSION['userID'];
$stmt = $db->exec("UPDATE User SET Notification = $notification WHERE UserID = $userID;");
echo "<h1>$notification</h1>";
session_start();
unset($_SESSION['userID']);
session_destroy();
header('Location: index.php');
?>
