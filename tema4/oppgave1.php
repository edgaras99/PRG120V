<?php
/*
/* programmet mottar html fra skjema 
/* programmet sjekker om postnr er korrekt fylt ut 
*/
$postnr=$_post ["postnr"];
if ($postnr) /*postnr er ikke fylt ut */
{
    print("postnr er ikke fylt ut <br />");
}
else if (strlen($postnr)!=4) /* postnr består ikke av 4 tegn */
 {
          print("Postnr best&aring;r ikke av 4 tegn <br />");
    }
  else if (!ctype_digit($postnr))  /* minst ett av tegnene er ikke et siffer */
    {
       print("Postnr best&aring;r ikke bare av siffre  <br />");
    }
else
	{
		print("Postnr er korrekt fylt ut <br />");
	}

?>
