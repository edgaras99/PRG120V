<?php /* slett-student */
/*
   Programmet lager et skjema for å kunne slette en student
   Programmet sletter den valgte studenten
*/
?>
<script src="funskjoner.js"></script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
    <select name="brukernavn" required>
        <option value="">Velg student</option>
        <?php 
        include("dynamiske-funksjoner.php"); 
        listeboksStudent(); // lager <option>-elementer for alle studenter
        ?> 
    </select>
    <br/><br/>
    <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>

<?php
if (isset($_POST["slettStudentKnapp"])) {
    include("db-tlkobling.php"); /* tilkobling til database */

    $brukernavn = $_POST["brukernavn"];

    // Sjekk at studenten finnes
    $sqlKontroll = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
    $res = mysqli_query($db, $sqlKontroll) or die("Feil ved sjekk av student");

    if (mysqli_num_rows($res) == 0) {
        print("Student med brukernavn <b>$brukernavn</b> finnes ikke.<br />");
    } else {
        // Slett studenten
        $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";
        mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen");
        
        print("Følgende student er nå slettet: <b>$brukernavn</b><br />");
    }
}
?>