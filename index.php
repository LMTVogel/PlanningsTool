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
    <title>Document</title>
</head>
<body>
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
    </tr>
        <?php }?>
  </tbody>
</table>
</body>
</html>