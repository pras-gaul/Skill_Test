<?php

$data = file_get_contents('Data.Json');
$data= json_decode($data, true);

echo "<pre>";

$a=count($data);
for ($i = 0;$i<$a; $i++) {
$c=count($data[$i]["tags"]);
for ($z = 0;$z<$c; $z++) {
$array=$data[$i]["tags"][$z];
if ($array=="brown") {

echo "inventory_id : ";
print_r($data[$i]["inventory_id"]);
echo "<br>";

echo "name = ";
print_r($data[$i]["name"]);
echo "<br>";

for ($z = 0;$z<$c; $z++) {
print_r($data[$i]["tags"][$z]);
echo " , ";
}
echo "<br>";
echo "<br>";

}
}
}

?>