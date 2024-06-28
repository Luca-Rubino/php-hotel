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

    <section>

        <form action="" method="get">
            <label for="parcheggi">Presenza parcheggi: </label>
            <select name="parcheggi" id="parcheggi">
                <option value="yes">Si</option>
                <option value="no">No</option>
            </select>
            <input type="submit" value="Invia">
        </form>
        
    </section>

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