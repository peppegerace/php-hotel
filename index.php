<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filteredHotels = [];

// var_dump($hotels)

    if (isset($_POST['parking']) && $_POST['parking'] == 'on') {
        $filteredHotels = array_filter($hotels, function ($hotel) {
            return $hotel['parking'];
        });
    } else {
        $filteredHotels = $hotels;
    };


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <title>Hotels</title>
</head>
<body>

  <div class="container my-5">

    <h1 class="my-3">Hotels</h1>

    <form action="index.php" method="POST" class="my-3">
        <div class="row">
            <div class="col">
                <input type="checkbox" class="form-check-input" name="parking" id="parking" >
                <label for="parking" class="form-check-label">Solo Hotel con parcheggio</label>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Cerca</button>
            </div>
        </div>
    </form>

    <table class="table table-hover">
  
      <thead>
          <tr>
          <th scope="col">Nome</th>
          <th scope="col">Descrizione</th>
          <th scope="col">Parcheggio</th>
          <th scope="col">Voto</th>
          <th scope="col">Distanza dal centro</th>
          </tr>
      </thead>
  
      <tbody>
        <?php foreach ($filteredHotels as $index => $hotel) { ?>
          <tr>
              <th scope="row"><?php echo $hotel['name']; ?></th>
              <td><?php echo $hotel['description']; ?></td>
              <td><?php echo $hotel['parking'] ? 'Sì' : 'No' ?></td>
              <td><?php echo $hotel['vote']; ?></td>
              <td><?php echo $hotel['distance_to_center']; ?> Km</td>
          </tr>
        <?php }  ?>  
      </tbody>
  
    </table>

  </div>

  
</body>
</html>