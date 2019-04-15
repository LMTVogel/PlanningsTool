<?php

    include "connect.php";

    $id = $_POST['id'];

    echo $id;

    $sql = "SELECT * FROM `activeGames` WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
    $players = implode (", ", $_POST['player']);

    $result = $query->fetch();

    $sql = 'INSERT into activeGames ( name, play_minutes, explain_minutes, min_players, max_players, instructor, players, time) VALUES ( :name, :play_minutes, :explain_minutes, :min_players, :max_players, :instructor, :players, :time)';
    
    $query = $conn->prepare($sql);

    $query->bindParam(":name", $result['name']);
    $query->bindParam(":min_players", $result['min_players']);
    $query->bindParam(":max_players", $result['max_players']);
    $query->bindParam(":play_minutes", $result['play_minutes']);
    $query->bindParam(":explain_minutes", $result['explain_minutes']);
    $query->bindParam(":instructor", $_POST['instructor']);
    $query->bindParam(":players", $players);
    $query->bindParam(":time", $_POST['time']);

    $query->execute();

    header('location:index.php');
