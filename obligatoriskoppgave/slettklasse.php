<?php /* slett-klasse */
/*
   Programmet lager et skjema for å kunne slette en klasse
   Programmet sletter den valgte klassen hvis ingen studenter er registrert
*/
?>
<script src="funskjoner.js"></script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
    <select name="klassekode" required>
        <option value="">velg klasse</option>
    <?php 
    // Denne funksjonen lager en <select> med alle eksisterende klassekoder
   include("dynamiske-funksjoner.php"); listeboksKlassekode();
    ?> 
    <br/>
    <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" />
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {
    include("db-tilkobling.php"); /* tilkobling til database */

    $klassekode = $_POST["klassekode"];

    // Sjekk om klassen finnes
    $sqlKontroll = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
    $res = mysqli_query($db, $sqlKontroll) or die("Feil ved sjekk av klasse");
    
    if (mysqli_num_rows($res) == 0) {
        print("Klassen med kode <b>$klassekode</b> finnes ikke.<br />");
    } else {
        // Sjekk om det finnes studenter registrert i klassen
        $sqlStudent = "SELECT * FROM student WHERE klassekode='$klassekode';";
        $resStudent = mysqli_query($db, $sqlStudent) or die("Feil ved sjekk av studenter");
        
        if (mysqli_num_rows($resStudent) > 0) {
            print("Kan ikke slette klassen <b>$klassekode</b> fordi det finnes studenter registrert.<br />");
        } else {
            // Slett klassen
            $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";
            mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen");
            
            print("Følgende klasse er nå slettet: <b>$klassekode</b><br />");
        }
    }
}
?>