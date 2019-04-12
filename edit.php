<?php 
    include "connect.php";

    $id = $_GET[id];
    $max_players = $_GET['max_players'];

    $sql = "SELECT * FROM `games` WHERE id=:id";
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="addGame.php">Spellen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Mijn spellen</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <form action="send.php?id=<?php echo $id?>" method="post">
            <div class="form-group mt-4">
              <label for="text">Voeg een instructeur toe</label>
              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
        </form>
    </div>
</body>
</html>