<?

$connect = new PDO("mysql:host=localhost; dbname=igm; charset=utf8",'root','');

session_start();

$author = $_SESSION['userid'];
$text = $_POST['text'];
$img = $_POST['url'];
$date = date("Y-m-j");

$connect->query("INSERT INTO news (id, id_author, text, data, img) VALUES (NULL, '$author', '$text', '$date', '$img')");
header("location: ../news.php");
?>