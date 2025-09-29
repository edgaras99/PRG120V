<?php /* vis-alle-klasser */
/*
/* Programmet skriver ut alle registrerte 
*/
include("db-tlkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
/* SQL-setning sendt til database-serveren */
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
print ("<h3>registrert klasser </h3>");
print ("<table border=1>");
print ("<tr><th align=left>studiumkode</th> <th align=left>studiumnavn</th> </tr>");
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
$klassekode=$rad["klassekode"];
$klassenavn=$rad["klassenavn"];
$studiumkode=$rad["studiumkode"];
print ("<tr> <td> $klassekode </td> <td> $klassenavn </td> </tr> $studiumkode</td> </tr>");
}
print ("</table>");
?>
