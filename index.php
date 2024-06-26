<?php
include __DIR__ . "/configurazione.php";

$query = "SELECT guest_id, Nome, Cognome
FROM guests";

$result = $conn->query($query);

$query_prenotazioni = "SELECT check_in_date, check_out_date
FROM prenotazioni";

$result_prenotazioni = $conn->query($query_prenotazioni);


$query_rooms = "SELECT room_type
FROM rooms";

$result_rooms = $conn->query($query_rooms);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Prova MySQL+Php</title>
</head>

<body>
    <div class="header">
    <h1>My SQL + Php</h1>
    <p>
        <?php
        // check connection
        if ($conn && $conn->connect_error) {
            echo "Connessione fallita" . $conn->connect_error;
        } else {
            echo "<span>". "Connessione eseguita" . "</span>";
        }
        ?>
    </p>
    </div>

    <div class="container">
        <ul>
            <?php
            if ($result && $result->fetch_assoc()) {
                echo "<p>". "LISTA CLIENTI" ." </p>" . "<br>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["guest_id"] . " " . $row["Nome"] . " " . $row["Cognome"] . "</li>";
                }
            } else if ($result) {
                echo "0 risultati";
            } else {
                echo "query error!";
            }

            ?>
        </ul>

        <ul>
            <?php
            if ($result_prenotazioni && $result_prenotazioni->fetch_assoc()) {
                echo "<p> LISTA ARRIVI E PARTENZE" ." </p>" . "<br>";

                while ($row = $result_prenotazioni->fetch_assoc()) {
                    echo "<li>" . "Arrivo" . " " . $row["check_in_date"] . "<br>" . "Partenza" . " " . $row["check_out_date"] . "</li>";
                }
            } else if ($result) {
                echo "0 risultati";
            } else {
                echo "query error!";
            }

            ?>
        </ul>

        <ul>
            <?php
            if ($result_rooms && $result_rooms->fetch_assoc()) {
                echo "<p> "."LISTA STANZE" ." </p>" . "<br>";
                while ($row = $result_rooms->fetch_assoc()) {
                    echo "<li>" . "Tipologia di stanza:" . "  " . $row["room_type"] . "</li>";
                }
            } else if ($result) {
                echo "0 risultati";
            } else {
                echo "query error!";
            }

            $conn->close();
            ?>
        </ul>

    </div>
</body>

</html>