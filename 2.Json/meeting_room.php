<?php

$data = file_get_contents('Data.Json');
$data= json_decode($data, true);

echo "<pre>";

$a=count($data);
for ($i = 0;$i<$a; $i++) {
$array=$data[$i]["placement"]["name"];
if ($array=="Meeting Room") {
$c=count($data[$i]["tags"]);
echo "inventory_id : ";
print_r($data[$i]["inventory_id"]);
echo "<br>";
for ($z = 0;$z<$c; $z++) {
print_r($data[$i]["tags"][$z]);
echo ",";
}
echo "<br>";
}
}
?>