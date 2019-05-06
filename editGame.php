<?php
include 'connect.php';

$id = $_GET[id];

$sql = 'SELECT * from activeGames where id = :id';
$query = $conn->prepare($sql);
$query->bindParam(":id", $id);
$query->execute();

$result = $query->fetch();
$players = explode(", ", $result['players']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script>
        function confirm() {
            alert('De informatie is aangepast.');
        }
    </script>
</head>
<body>
    <?php include 'include/nav.html';?>

    <div class="container">
	    <p>Geselecteerd spel: <?php echo $result['name']?> </p>
        <form method="POST" action="editSend.php">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <div class="form-group">
            <label for="time">Pas hier de tijd aan:</label>
            <input type="time" name = "time" class="form-control" id="time" value="<?php echo $result['time']?>" placeholder = 'time'>
        </div>
        <div class="form-group">
            <label for="explain">Uitlegger:</label>
            <input type="text" name = "instructor" class="form-control" id="explain" value="<?php echo $result['instructor']?>" placeholder ="<?php echo $instructor?>">
        </div>
        <?php for ($i = 0; $i < $result['max_players']; $i++){?>
            <div class="form-group"></div>
            <label for="player">Speler:</label>
                <input type="text" name = "player[]" class name="form-control" id="player" value="<?php echo isset($players[$i]) ? $players[$i]:'' ;?>">
            <?php }?>
            <button type="submit" class="btn btn-primary" onclick="confirm()">Submit</button>
        </form>
        
    </div>
</body>
</html>