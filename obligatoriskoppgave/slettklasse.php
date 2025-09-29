<?php /* slett-klasse */
/*
   Programmet lager et skjema for å kunne slette en klasse
   Programmet sletter den valgte klassen
*/
?>
<script src="funksjoner.js"></script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
    Klassekode: <input type="text" id="klassekode" name="klassekode" required /> <br/>
    <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" />
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {
    include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
    
    $klassekode = $_POST["klassekode"];
    $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";
    mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen");
    /* SQL-setning sendt til database-serveren */
    
    print("Følgende klasse er nå slettet: $klassekode <br />");
}
?>