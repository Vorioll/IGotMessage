<?
require_once 'connect.php';
session_start();

$text = $_POST['text'];

$user = $_GET['user'];
$author = $_GET['author'];
$date = date("Y-m-j");

$connect->query("INSERT INTO comments (id, id_prof, id_author, text, data) VALUES (NULL,'$user', '$author', '$text', '$date')");
header("location: ../profile.php?user=$user");
?>
