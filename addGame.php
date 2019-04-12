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
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="addGame.php">Spellen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Mijn spellen</a>
                </li>
            </ul>
        </div>
    </nav>
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
            <td><a href='edit.php?id=<?php echo $row[id]?>'>Add</a></td>
    </tr>
        <?php }?>
  </tbody>
</table>
</body>
</html>