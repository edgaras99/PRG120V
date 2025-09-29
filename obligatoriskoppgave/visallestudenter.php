<?php /* vis-alle-klasser */
/*
   Programmet skriver ut alle registrerte klasser
*/
include("db-tlkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */

$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die("ikke mulig å hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */

print("<h3>Vis alle studenter </h3>");
print("<table border=1>");
print("<tr><th align=left>Brukernavn</th><th align=left>Fornavn</th><th align=left>Etternavn</th><th align=left>Klassekode</th></tr>");

for ($r=1; $r<=$antallRader; $r++) {
    $rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];

    print("<tr><td>$brukernavn</td><td>$fornavn</td><td>$etternavn</td><td>$klassekode</td></tr>");
}
print("</table>");
?>