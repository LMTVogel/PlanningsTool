<?php 

    include 'connect.php';

    $id = $_GET[id];

    $sql = "DELETE FROM `activeGames` WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();

    header("location:index.php");