<?php
session_start();
if (isset($_POST['elkuldott'])) {

    if (isset($_SESSION['gszam'])) {
        logika($_POST["talalgatas"], $_SESSION['gszam']);

    } else {
        $_SESSION['gszam'] = rand(1, 10);
        logika($_POST["talalgatas"], $_SESSION['gszam']);
    }
}

function logika($szam, $gszam)
{
    if ($szam > $gszam) {
        echo "Kisebb kell legyen.";
    } elseif ($szam < $gszam) {
        echo "Nagyobb kell legyen.";
    } else {
        echo "Eltalaltad.";
        $_SESSION['gszam'] = rand(1, 10);
    }
}

?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="hidden" name="elkuldott" value="true">
    Melyik számra gondoltam 1 és 10 között?
    <input name="talalgatas" type="text">
    <br>
    <br>
    <input type="submit" value="Elküld">
</form>


