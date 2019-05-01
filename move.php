<?php 

    include 'connect.php';

    $id = $_GET['id'];
    $max_players = $_GET['max_players'];

    $sql = "SELECT * FROM `games` WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
    $result = $query->fetch();

    $sql = "INSERT INTO activeGames(id, name, min_players, max_players, play_minutes, explain_minutes) VALUES(:id, :name, :min_players, :max_players, :play_minutes, :explain_minutes)";

    $query = $conn->prepare($sql);
    $query->bindParam(":id", $result[id]);
    $query->bindParam(":name", $result[name]);
    $query->bindParam(":min_players", $result[min_players]);
    $query->bindParam(":max_players", $result[max_players]);
    $query->bindParam(":explain_minutes", $result[explain_minutes]);
    $query->bindParam(":play_minutes", $result[play_minutes]);
    $query->execute();

    header("location:edit.php?id=$id&max_players=$max_players");