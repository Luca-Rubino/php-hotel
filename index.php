<?php

require __DIR__ . "/listaHotel/hotel.php";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="#" />
    <title>php-hotel</title>
</head>
<body>
    <?php echo "<h1>Php-Hotel</h1>" ?> 

    <section>
        <form action="./index.php" method="get">
            <label for="star">Stelle: </label>
            <input type="number" name="star" id="star" min="1" max="5">

            <label for="parking">Presenza parcheggi: </label>
            <select name="parking" id="parking">
                <option value="0"></option>
                <option value="no">No</option>
                <option value="yes">Si</option>
            </select>

            <input type="submit" value="Filtra">
            <input type="submit" value="Reset">
        </form>
    </section>
    <br>
    <section>
        <table>
            <thead>
                <tr>
                <th scope="col">Hotel</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">voto</th>
                <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $key => $hotel) { ?>
                <tr>
                <th><?php echo $hotel['name'] ?></th>
                <td><?php echo $hotel['description'] ?></td>
                <td>
                <?php echo $hotel['parking'] ? 'Yes' : 'No' ?>
                </td>
                <td><?php echo $hotel['vote'] ?></td>
                <td><?php echo $hotel['distance_to_center'] ?>.km</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

</body>
</html>