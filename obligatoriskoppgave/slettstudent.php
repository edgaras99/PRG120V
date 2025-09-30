<?php /* slett- */
/*
   Programmet lager et skjema for å kunne slette en klasse
   Programmet sletter den valgte klassen uten sjekk for studenter
*/
?>
<script src="funskjoner.js"></script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
    <select name="klassekode" required>
        <option value="">Velg klasse</option>
        <?php 
        include("dynamiske-funksjoner.php"); 
        listeboksstudentkode(); // lager <option>-elementer for alle student
        ?> 
    </select>
    <br/><br/>
    <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>

<?php
if (isset($_POST["slettStudentKnapp"])) {
    include("db-tlkobling.php"); /* tilkobling til database */

    $brukernavn = $_POST["brukernavn"];

    // Sjekk at klassen finnes
    $sqlKontroll = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
    $res = mysqli_query($db, $sqlKontroll) or die("Feil ved sjekk av klasse");

    if (mysqli_num_rows($res) == 0) {
        print("Klassen med kode <b>$brukernavn</b> finnes ikke.<br />");
    } else {
        // Slett klassen
        $sqlSetning = "DELETE FROM student WHERE klassekode='$brukernavn';";
        mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen");
        
        print("Følgende klasse er nå slettet: <b>$brukernavn</b><br />");
    }
}
?>