<?php /* slett-klasse */
/*
   Programmet lager et skjema for å kunne slette en klasse
   Programmet sletter den valgte klassen uten sjekk for studenter
*/
?>
<script src="funskjoner.js"></script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
    <select name="klassekode" required>
        <option value="">Velg klasse</option>
        <?php 
        include("dynamiske-funksjoner.php"); 
        listeboksKlassekode(); // lager <option>-elementer for alle klassekoder
        ?> 
    </select>
    <br/><br/>
    <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" />
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {
    include("db-tlkobling.php"); /* tilkobling til database */

    $klassekode = $_POST["klassekode"];

    // Sjekk at klassen finnes
    $sqlKontroll = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
    $res = mysqli_query($db, $sqlKontroll) or die("Feil ved sjekk av klasse");

    if (mysqli_num_rows($res) == 0) {
        print("Klassen med kode <b>$klassekode</b> finnes ikke.<br />");
    } else {
        // Slett klassen
        $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";
        mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen");
        
        print("Følgende klasse er nå slettet: <b>$klassekode</b><br />");
    }
}
?>