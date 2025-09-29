<?php  /* registrer-klasse */
/*
/*  Programmet lager et html-skjema for å registrere et klasse
/*  Programmet skal registrere data (klassekode, klassenavn og studiumkode) i databasen
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
if (isset($_POST["registrerKlasseKnapp"]))
     {
    $klassekode= $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"];
    $studiumkode = $_POST["studiumkode"];

    if (!$klassekode || !$klassenavn || !$studiumkode) {
        print ("Både klassekode, klassenavn og studiumkode må fylles ut");
    } else {
        include("db-tlkobling.php");

        $sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig å hente data fra databasen");
        $antallRader = mysqli_num_rows($sqlResultat);

        if ($antallRader != 0) {
            print ("Klassen er registrert fra før");
        } else {
            $sqlSetning = "INSERT INTO klasse VALUES('$klassekode','$klassenavn','$studiumkode');";
            mysqli_query($db, $sqlSetning) or die("ikke mulig å registrere data i databasen");

            print ("Følgende klasse er nå registrert: $klassekode $klassenavn $studiumkode");
        }
    }
}
?>