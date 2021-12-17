
<html>
<form method="POST">
	<label>Masukan jumlah Deret FizzBuzz = </label><input type="text" name="masukan"/>
	<input type="submit" name="submit"/>
</form>
</html>
<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') 
	{

$masukan=$_POST["masukan"];
echo "Output : ";
 for ($i=1; $i <= $masukan; $i++) {
  if ($i % 3 == 0 && $i % 5 == 0) {
   echo "FizzBuzz , ";
  } elseif ($i % 3 == 0) {
   echo "Fizz , ";
  } elseif ($i % 5 == 0) {
   echo "Buzz , ";
  } else {
   echo $i . ", ";
  }
 }
}
?>
