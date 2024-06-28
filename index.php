<?php

require __DIR__ . "/listaHotel/hotel.php";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
</head>
<body>
    

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
    <tbody class="table-group-divider">
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

</body>
</html>