<?
session_start();
$connect = new PDO("mysql:host=localhost; dbname=igm; charset=utf8",'root','');
$userid = (int)$_SESSION['userid'];
$idfriend = $_GET['id'];
$val = $connect->query("SELECT * FROM friends");
$count = 0;
foreach($val as $valel){
    if($idfriend == $valel['id_friend'] && $userid == $valel['userid']){
        $count = $count + 1;
    }
    if($userid == $valel['id_friend'] && $idfriend == $valel['userid'] ){
        $count = $count + 1;
    }
}
echo $idfriend;
echo $userid;
echo $count;
if($count != 0){}else{
$connect->query("INSERT INTO friends (id, id_friend, userid) VALUES (NULL, '$idfriend', '$userid')");
echo $count;
}
header('location:../search-freinds.php');
?>