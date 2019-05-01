<?php

    include "connect.php";

    $id = $_GET['id'];

    $instructor = $_POST['instructor'];
    $players = implode(' ', $_POST['player']);
    $time = $_POST['time'];

    $sql = "UPDATE activeGames SET instructor = '$instructor', players = '$players', time = '$time' WHERE id = $id";
    $query = $conn->prepare($sql);
    $query->execute();

    header('location: index.php');