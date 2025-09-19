<?php /* Oppgave 1 */
/*
/* Programmet mottar postnr fra et HTML-skjema
/* Programmet sjekker om postnr er korrekt fylt ut
*/
$postnr=$_POST ["postnr"];
$lovligPostnr=true;
if (!$postnr) /* postnr er ikke fylt ut */
{
$lovligPostnr=false;
print("Postnr er ikke fylt ut <br />");
}
else if (strlen($postnr)!=4) /* postnr består ikke av 4 tegn */
{
$lovligPostnr=false;
print("Postnr best&aring;r ikke av 4 tegn <br />");
}
else
{
if (!ctype_digit($postnr)) /* minst ett av tegnene er ikke et siffer */
{
$lovligPostnr=false;
print("Postnr best&aring;r ikke bare av siffre <br />");
}
}
if ($lovligPostnr) /* postnr er korrekt fylt ut */
{
print("Postnr er korrekt fylt ut <br />");
}
?>