<?php
    include "connect.php";  

    $sql = "SELECT * FROM `games`";
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
    <script>
      
    </script>
</head>
<body>
    <?php include "include/nav.html" ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Spelnaam</th>
      <th scope="col">Skills</th>
      <th scope="col">Min spelers</th>
      <th scope="col">Max spelers</th>
      <th scope="col">Speeltijd</th>
      <th scope="col">Uitlegtijd</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach ($result as $row) {
    ?>
    <tr>
        <td><?php echo $row[id]?> </td>
        <td><?php echo $row[name]?> </td>
        <td><?php echo $row[skills]?> </td>
        <td><?php echo $row[min_players]?> </td>
        <td><?php echo $row[max_players]?> </td>
        <td><?php echo $row[play_minutes]?> </td>
        <td><?php echo $row[explain_minutes]?> </td>
        <td><a class = "btn btn-info" href="gameInfo.php?id=<?php echo $row['id']?>"><i class="fas fa-info-circle"></i></a></td>
        <td><a class= "btn btn-success" href='move.php?id=<?php echo $row[id]?>&max_players=<?php echo $row[max_players]?>&name=<?php echo $row[name]?>'><i class="fas fa-plus"></i></a></td>
    </tr>
        <?php }?>
  </tbody >
</table>
</body>
</html>