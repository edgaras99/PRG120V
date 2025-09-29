<?php /* slett-klasse */
/*
/* Programmet lager et skjema for å kunne slette et klasse
/* Programmet sletter det valgte klasse
*/
?>
<script src="funksjoner.js"> </script>
<h3>Slett klasse</h3>
<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
klasse <input type="text" id="klasse" name="klasse" required /> <br/>
<input type="submit" value="Slett klase" name="slettKlasseKnapp" id="slettKlasseKnapp" />
</form>
<?php
if (isset($_POST ["slettKlasseKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$klassekode=$_POST ["klassekode"];
$sqlSetning="DELETE FROM klasse WHERE klasskode='$klassekode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende studium er n&aring; slettet: $klassekode <br />");
}
?>
