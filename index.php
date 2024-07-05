<?php

require __DIR__ . "/listaHotel/hotel.php";

// $hotels = [

//     [
//         'name' => 'Hotel Belvedere',
//         'description' => 'Hotel Belvedere Descrizione',
//         'parking' => true,
//         'vote' => 4,
//         'distance_to_center' => 10.4
//     ],
//     [
//         'name' => 'Hotel Futuro',
//         'description' => 'Hotel Futuro Descrizione',
//         'parking' => true,
//         'vote' => 2,
//         'distance_to_center' => 2
//     ],
//     [
//         'name' => 'Hotel Rivamare',
//         'description' => 'Hotel Rivamare Descrizione',
//         'parking' => false,
//         'vote' => 1,
//         'distance_to_center' => 1
//     ],
//     [
//         'name' => 'Hotel Bellavista',
//         'description' => 'Hotel Bellavista Descrizione',
//         'parking' => false,
//         'vote' => 5,
//         'distance_to_center' => 5.5
//     ],
//     [
//         'name' => 'Hotel Milano',
//         'description' => 'Hotel Milano Descrizione',
//         'parking' => true,
//         'vote' => 2,
//         'distance_to_center' => 50
//     ],

// ];

$hotelsfilter = $hotels;


// echo $_GET['parking'];
// echo $_GET['star'];

// filtro per la presenza dei parcheggi
if ($_GET['parking'] == "true") {
    $hoteltemp = [];
    foreach ($hotelsfilter as $hotel) {

        if ($hotel['parking'] === true) {
            $hoteltemp[] = $hotel;
        }
    }
    $hotelsfilter = $hoteltemp;
};

// filtro per la mancanza dei parcheggi
if ($_GET['parking'] == "false") {
    $hoteltemp = [];
    foreach ($hotelsfilter as $hotel) {

        if ($hotel['parking'] === false) {
            $hoteltemp[] = $hotel;
        }
    }
    $hotelsfilter = $hoteltemp;
};

// impostazione per avere un opzione nulla funzionante
if ($_GET['parking'] == "null" or "Reset") {
    $hoteltemp = [];
    foreach ($hotelsfilter as $hotel) {
            $hoteltemp[] = $hotel;
    }
    $hotelsfilter = $hoteltemp;
};

// filtro per il numero di stelle dello hotel
if ($_GET['star'] > 0 && $_GET['star'] < 6) {
    $hoteltemp = [];
    foreach ($hotelsfilter as $hotel) {
        if ($_GET['star'] == $hotel['vote']) {
            $hoteltemp[] = $hotel;
        }
    }
    $hotelsfilter = $hoteltemp;
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="#" />
    <title>php-hotel</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php echo "<h1>Php-Hotel</h1>" ?> 

    <section>
        <form class="container d-flex" action="./index.php" method="get">
            <label class="d-flex align-items-center" for="star">Stelle: </label>
            <input class="form-control" type="number" name="star" id="star" min="1" max="5">

            <label class="d-flex align-items-center" for="parking">Presenza parcheggi: </label>
            <select class="form-select" name="parking" id="parking">
                <option value="null"></option>
                <option value="false">No</option>
                <option value="true">Si</option>
            </select>

            <input class="btn btn-outline-secondary" type="submit" value="Filtra">
            <input class="btn btn-outline-secondary" type="submit" value="Reset">
        </form>
    </section>
    <br>
    <section>
        <table class="table">
            <thead>
                <tr scope="row">
                <th scope="col">Hotel</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">voto</th>
                <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($_GET['parking']) | isset($_GET['star']) | isset($_GET['parking']) && isset($_GET['star'])) { ?>
                    <?php foreach ($hoteltemp as $hoteltemp) { ?>
                        <tr scope="row">
                            <th scope="col"><?php echo $hoteltemp['name'] ?></th>
                            <td scope="col"><?php echo $hoteltemp['description'] ?></td>
                            <td scope="col"><?php echo $hoteltemp['parking'] ? 'Yes' : 'No' ?></td>
                            <td scope="col"><?php echo $hoteltemp['vote'] ?></td>
                            <td scope="col"><?php echo $hoteltemp['distance_to_center'] ?>km</td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <?php foreach ($hotels as $hotel) { ?>
                        <tr scope="row">
                        <th scope="col"><?php echo $hotel['name'] ?></th>
                        <td scope="col"><?php echo $hotel['description'] ?></td>
                        <td scope="col"><?php echo $hotel['parking'] ? 'Yes' : 'No' ?></td>
                        <td scope="col"><?php echo $hotel['vote'] ?></td>
                        <td scope="col"><?php echo $hotel['distance_to_center'] ?>km</td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>