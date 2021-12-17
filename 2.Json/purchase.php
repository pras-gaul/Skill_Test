<?php

$data = file_get_contents('Data.Json');
$data= json_decode($data, true);

echo "<pre>";

$a=count($data);
for ($i = 0;$i<$a; $i++) {
$array=$data[$i]["purchased_at"];
if ($array=="16 Januari 2020") {
$c=count($data[$i]["tags"]);
echo "inventory_id : ";
print_r($data[$i]["inventory_id"]);
echo "<br>";
for ($z = 0;$z<$c; $z++) {
print_r($data[$i]["tags"][$z]);
echo " = ";
}
print_r($data[$i]["name"]);
echo "<pre>";
}
else{
	$a=1;
}
}
if($a=1){
	echo "Tidak ada purchased_at 16 Januari 2020";
}
?>