
<?php
echo "<h2>1. feladat</h2>";
$nap = date("w");

switch($nap){
    case($nap==0);
        echo "Ma vasárnap van.";
        break;
    case($nap==1);
        echo "Ma hétfő van.";
        break;
    case($nap==2);
        echo "Ma kedd van.";
        break;
    case($nap==3);
        echo "Ma szerda van.";
        break;
    case($nap==4);
        echo "Ma csütörtök van.";
        break;
    case($nap==5);
        echo "Ma péntek van.";
        break;
    case($nap==6);
        echo "Ma szombat van.";
        break;
    default :
        echo "Hiba!";
        break;
}

?>

<?php
echo "<br><h2>2. feladat</h2>";
$eredmeny=0;
$szam1=0;
$szam2=0;

if(isset($_GET['kuldes'])) {
    $szam1= $_GET['szam1'];
    $szam2 = $_GET['szam2'];
    $muvelet = $_GET['muvelet'];
    if ($muvelet == "+")
        $eredmeny = $szam1 + $szam2;
    else if ($muvelet == "-")
        $eredmeny = $szam1 - $szam2;
    else if ($muvelet == "*")
        $eredmeny = $szam1 * $szam2;
    else if ($muvelet == "/")
        $eredmeny = $szam1 / $szam2;
    else echo "Hiba tortent!";
}

echo<<<szamologep

<form action="" method="get" >
    <input name='szam1' type='number' value=$szam1  style='border: black solid'>
    <select name="muvelet">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="/">/</option>
        <option value="*">*</option>
    </select>
    <input name='szam2' type='number' value=$szam2  style='border: black solid'>
    <input name="kuldes" type='submit' value='Szamolas' >
<br>Eredmény: <input value=$eredmeny>
</form>

szamologep;

?>

<?php
echo "<br><h2>3. feladat</h2>";


echo "<table style='border: 1px black solid'>";

for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 10; $j++) {
        echo "<td style='border: 1px black solid'>" . ($j * $i) . " : " . $j . " = "
            . $i . "<br>" . "</td>";
    }
    echo "</tr>";
}

echo "</table>";


?>

<?php
echo "<br><h2>4. feladat</h2>";
echo "<table>";

for ($i = 1; $i <= 8; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 8; $j++) {
        if ($i % 2 != 0) {
            if ($j % 2 == 0) {
                echo "<td style='background: black' width='50px' height='50px'></td> ";
            } else {
                echo "<td></td>";
            }
        } else {
            if ($j % 2 == 0) {
                echo "<td></td>";
            } else {
                echo "<td style='background: black' width='50px' height='50px' ></td>";
            }
        }
    }
    echo "<tr>";
}

echo "</table>";

?>



