<?
session_start();
require_once 'connect.php';

$userid = $_SESSION['userid'];
$b = $_POST['addtable'];
$c = 0;
$messages = $connect->query("SELECT * FROM messages ORDER BY id DESC limit 1");

foreach($messages as $msg){
    $idmsg = $msg['id'];
}
$msgs = $connect->query("SELECT * FROM messages");
foreach($msgs as $msg){
    if($msg['id_friend']==$b && $msg['myid']==$userid){
        $c=$c+1;
    }
    if($msg['id_friend']==$userid && $msg['myid']==$b){
        $c=$c+1;
    }
}
echo $c;
if ($c>0){
    header('location: ../message.php');
}else{
    $idmsg=$idmsg+1;
    $a = "chat".$idmsg;
    echo $a;
    $connect->query("INSERT INTO messages (id, id_friend, myid) VALUES (NULL, '$b', '$userid')");
    $sql = "CREATE TABLE $a (id_message INTEGER AUTO_INCREMENT PRIMARY KEY, mestext VARCHAR(500), mesdata varchar(10), ids varchar(10));";     
    $connect->query($sql);  
    header('location: ../message.php');
}
$idmsg=$idmsg+1;
    $a = "chat".$idmsg;
    echo $a;


?>