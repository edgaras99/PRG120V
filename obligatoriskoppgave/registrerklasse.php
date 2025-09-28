<?php  /* registrer-klasse */
/*
/*  Programmet lager et html-skjema for å registrere et klasse
/*  Programmet registrerer data (klassekode, klassenavn og studiumkode) i databasen
*/
?> 

<h3>Registrer klasse </h3>

<form method="post" action="" id="registrerKlasseSkjema" name="registrerklasseSkjema">
  klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
  klassenavn <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
  studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/> 
  <input type="submit" value="Registrer klasse" id="registrerKlasseKnapp" name="registrerKlasseKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  if (isset($_POST ["registrerKlasseKnapp"]))
    {
      $klassekode=$_POST ["klassekode"];
      $klassenavn=$_POST ["klassenavn"];
    

      if (!$klassekode || !$klassenavn )
        {
          print ("B&aring;de postnr og poststed m&aring; fylles ut");
        }
      else
        {
          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM klassenavn WHERE klassekode='$klassekode';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader!=0)  /* poststedet er registrert fra før */
            {
              print ("Poststedet er registrert fra f&oslashr");
            }
          else
            {
              $sqlSetning="INSERT INTO klassenavn VALUES('$klassekode','$klassenavn');";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
                /* SQL-setning sendt til database-serveren */

              print ("F&oslash;lgende poststed er n&aring; registrert: $klassekode $klassenavn");
                 }
        }
    }
?> 