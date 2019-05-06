<?php 

include 'connect.php';

$id = $_POST['id'];

echo $id;

$sql = 'SELECT * from activeGames where id = :id';
$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->execute();
$players = implode (", ", $_POST['player']);


$result = $query->fetch();

$sql = 'UPDATE activeGames SET time = :time, instructor = :instructor, players = :players WHERE id = :id ' ;

$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->bindParam(":time", $_POST['time']);
$query->bindParam(":instructor", $_POST['instructor']);
$query->bindParam(":players", $players);


$query->execute();

header("location:index.php");