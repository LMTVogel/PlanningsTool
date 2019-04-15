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
    <?php include "include/nav.html" ?>
    <div class="container">
        <form action="send.php?id=<?php echo $id; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <div class="form-group mt-4">
              <label for="text">Voeg een instructeur toe:</label>
              <input type="text" name="instructor" class="form-control w-50" pattern="[^' ']+" required>
            </div>
            <div class="form-group mt-5">
            <label for="names">Voeg hier de namen toe van de deelnemers:</label>
            <?php for ($i = 1; $i <= $max_players; $i++){?>
                <div class="form-group"></div>
                <label for="player">Speler:</label>
                    <input type="text" name="player[]" class name="form-control" id="player">
                <?php } ?>
            </div>
            <div class="form-group">
              <label for="time">Vul hier de tijd in:</label>
              <input type="time" name="time" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Verzenden</button>
        </form>
    </div>
</body>
</html>