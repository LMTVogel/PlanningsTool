<?php 

    include 'connect.php';

    $id = $_GET[id];

    $sql = "SELECT * FROM `games` WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
    $result = $query->fetch();

    $sql = "insert into activeGames(id, name, min_players, max_players, play_minutes, explain_minutes) values(:id, :name, :min_players, :max_players, :play_minutes, :explain_minutes)";

    $query = $conn->prepare($sql);
    $query->bindParam(":id", $result[id]);
    $query->bindParam(":name", $result[name]);
    $query->bindParam(":min_players", $result[min_players]);
    $query->bindParam(":max_players", $result[max_players]);
    $query->bindParam(":explain_minutes", $result[explain_minutes]);
    $query->bindParam(":play_minutes", $result[play_minutes]);
    $query->execute();

    header("location:index.php");