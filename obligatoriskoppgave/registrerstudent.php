<?php  /* registrer-student */
/*
/*  Programmet lager et html-skjema for å registrere et student 
/*  Programmet skal registrere data (brukernavn, fornavn, etternavn og klassekode) i databasen
*/
?> 

<h3>Registrer student </h3>

<form method="post" action="" id="registrerstudentSkjema" name="registrerstudentSkjema">
  brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
  fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
  etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/> 
   Klassekode: 
  <select id="klassekode" name="klassekode" required>
    <option value="">Velg klassekode</option>
    <?php
       include("dynamiske-funksjoner.php");
listeboksKlassekodestudent();
    ?>
    </select>
  <br/><br/>
  <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
if (isset($_POST["registrerStudentKnapp"]))
     {
    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode) {
        print ("Både brukernavn, fornavn, etternavn og klassekode må fylles ut");
    } else {
        include("db-tlkobling.php");

        $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig å hente data fra databasen");
        $antallRader = mysqli_num_rows($sqlResultat);

        if ($antallRader != 0) {
            print ("Student er registrert fra før");
        } else {
            $sqlSetning = "INSERT INTO student VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
            mysqli_query($db, $sqlSetning) or die("ikke mulig å registrere data i databasen");

            print ("Følgende student er nå registrert: $brukernavn $fornavn $etternavn $klassekode");
        }
    }
}
?>