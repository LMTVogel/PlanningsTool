<?php
    include 'connect.php';
    
    $id = $_GET[id];

    $sql = 'SELECT * from games where id = :id';
    $query = $conn->prepare($sql);
    $query->bindParam(":id", $id);
    $query->execute();

    $result = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <?php include 'include/nav.html';?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Afbeelding</th>
                <th scope="col">Uitleg</th>
                <th scope="col">Uitrbreidingen</th>
                <th scope="col">Vaardigheden</th>
                <th scope="col">Website</th>
                <th scope="col">Video</th>
                <th scope="col">Minimum spelers</th>
                <th scope="col">Maximum spelers</th>
                <th scope="col">Speeltijd</th>
                <th scope="col">Uitlegtijd</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $row) { ?>
            <tr>
                <td><?php echo $row[name]; ?></td>
                <td><img src="images/<?php echo $row['image']?>"></td>
                <td><?php echo $row[description];?></td>
                <td><?php echo $row[expansion];?></td>
                <td><?php echo $row[skills];?></td>
                <td><a href="<?php echo $row[url];?>">Websites</a></td>
                <td><?php echo $row[youtube];?></td>
                <td><?php echo $row[min_players];?></td>
                <td><?php echo $row[max_players];?></td>
                <td><?php echo $row[play_minutes];?></td>
                <td><?php echo $row[explain_minutes];?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>