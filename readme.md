Creato da 0 un database db-hotel in phpmyadmin.

db-hoel:
- guests
- prenotazioni
- rooms
- staff

In un foglio configurazione.php con DEFINE o variabili $ salvo i dati dei relativi passaggi e il $conn = new mysqli li vado a pescare da mySQL.


In un foglio index.php controllo la connessione.
Tramite un ciclo while stampo in pagina i dati passati dalla query.