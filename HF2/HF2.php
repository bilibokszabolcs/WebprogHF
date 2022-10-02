<?php
echo "<h2>1. feladat</h2>";
$tomb = ([5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200']);

foreach ($tomb as $item) {
    echo $item . " : " . gettype($item) . " : " . (is_numeric($item) ? "Igen<br>" : "Nem<br>");
}

?>

<?php
echo "<h2>2. feladat</h2>";

$orszagok = array(" Magyarország " => " Budapest", " Románia" => " Bukarest",
    "Belgium" => "Brussels", "Austria" => "Vienna", "Poland" => "Warsaw");

foreach ($orszagok as $kulcs => $ertek) {
    echo($kulcs . " fővárosa " . $ertek . "<br>");
}
?>

<?php
echo "<h2>3. feladat</h2>";

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

foreach ($napok as $kulcs => $ertek) {
    echo("<br>" . $kulcs . " : ");
    foreach ($ertek as $nap) {
        echo($nap . " , ");
    }
}
?>

<?php
echo "<h2>4. feladat</h2>";

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

function atalakit(&$tomb, $forma)
{
    if ($forma == "nagybetus") {
        foreach ($tomb as $kulcs => $ertek) {
            $tomb[$kulcs] = strtoupper($ertek);
        }
    } else if ($forma == "kisbetus") {
        foreach ($tomb as $kulcs => $ertek) {
            $tomb[$kulcs] = strtolower($ertek);
        }
    } else {
        echo "Hiba";
    }
}
echo "Eredeti:<br>";
print_r($szinek);
echo "<br>Nagybetűs:<br>";
atalakit($szinek, "nagybetus");
print_r($szinek);
echo "<br>Kisbetűs:<br>";
atalakit($szinek, "kisbetus");

print_r($szinek);

?>