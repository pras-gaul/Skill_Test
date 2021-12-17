<form method="post">
	<input type="text" name="start-year">
	<input type="text" name="end-year">
	<input type="submit" name="submit">
</form>

<?php 

	if($_SERVER['REQUEST_METHOD'] === 'POST') 
	{
		$startYear = $_POST['start-year'];
		$endYear = $_POST['end-year'];

		$yearsToCheck = range($startYear, $endYear);

		if(!empty($startYear) && !empty($endYear))
		{
			foreach ($yearsToCheck as $year) {
			    $isLeapYear = (bool) date('L', strtotime("$year-01-01"));
			    if($isLeapYear === true) echo $year . ",";
			}
		}
	}
?>