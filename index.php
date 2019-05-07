<?php 
    include "connect.php";

    $sql = "SELECT * FROM `activeGames`";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Document</title>
    <script>
        function validation() {
            if(!confirm("Weet u zeker dat u het spel wilt verwijderen")) {
                return false;
            }else {
                alert("Het spel is verwijderd.");
                return true;
            }
        }
    </script>
</head>
<body>
    <?php include "include/nav.html" ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Spel</th>
            <th scope="col">Starttijd</th>
            <th scope="col">Speelduur</th>
            <th scope="col">Uitlegger</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($result as $row) {
        ?>
    <tr>
        <td><?php echo $row[id]?> </td>
        <td><?php echo $row[name]?> </td>
        <td><?php echo $row[time]?> </td>
        <td><?php echo $row[play_minutes]?> </td>
        <td><?php echo $row[instructor]?> </td>
        <td><a class="btn btn-warning" href="editGame.php?id=<?php echo $row[id]?>"><i class="fas fa-edit"></i></a></td>
        <td><a class="btn btn-info" href="gameInfo.php?id=<?php echo $row['id']?>"><i class="fas fa-info-circle"></i></a></td>
        <td><a class="btn btn-danger" href='delete.php?id=<?php echo $row[id]?>' onclick="return validation();"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
        <?php }?>
    </tbody>
</table>
</body>
</html>