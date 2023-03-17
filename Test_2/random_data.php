<?php 
ini_set('max_execution_time', -1); ini_set('memory_limit', -1);

$names = array("Liam llivia", "Olivia jiam", "Noah voah", "Emma ooah", "Oliver", "Charlotte", "Elijah", "Amelia", "James", "William", "Sophia",
				 "Benjamin", "Isabella Mia", "Mia", "Henry Evelyn", "Evelyn Benjamin", "Theodore", "Harper" ,"Hoffman", "Kassing");

$surnames = array("Smith" ,"Jones" ,"Williams" ,"Taylor","Brown","Davies","Evans","Thomas" ,"Wilson","Roberts",
				"Mills","Barnes","Knight","Butler","Russell","Stevens","Jenkins","Fisher","Pearson","Nicholls");

$rows = array();

$genratenoofdatas = isset($_POST['noofdata']) ? $_POST['noofdata'] : '';
$genratenoofdata = intval($genratenoofdatas);
$csvRows = [];
$nameOffirst = '';

if ($genratenoofdata) {

	//Generate Random Name && Surnames && Age && DOB && Initials
	for ($x = 1; $x <= $genratenoofdata; $x++) {

		$name = $names[array_rand($names)];
		$surname =$surnames[array_rand($surnames)];

		$min = strtotime("jan 1st -47 years");
		$max = strtotime("dec 31st -18 years");
		$time = rand($min,$max);
		$dob = date("d-M-Y",$time);

		$dateOfBirth = $dob;
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		if ($name) {
			$nameFirstLetter = explode(" ", $name);
			$nameOffirst = isset($nameFirstLetter[0]) && isset($nameFirstLetter[1])
			 ? substr($nameFirstLetter[0],0,1).substr($nameFirstLetter[1],0,1) 
			 : substr($nameFirstLetter[0],0,1);
		}

		$initials =strtoupper($nameOffirst);
		$csvRows[] = array($name, $surname, $initials ,$age,$dob);
	}

	/* Create Directory */
	$directory ='Output/';
	if (!is_dir($directory)) {
	    mkdir($directory, 0755,true);
	}else{
	    chmod($directory, 0755);
	}

	/* Generate CSV files */

	$csvArrayDivide = array_chunk($csvRows, 100000);
	$count = 0;

	//Generate File And Data Insert csv
	foreach ($csvArrayDivide as $csvDataKey => $csvDatavalue) {
		$count++;
		$uniueArr = array();
		$file_header = array('Name','Surname','Initials','age','dob');
		$genrate_data_file = fopen($directory."output_".$count.".csv", 'w');
		fputcsv($genrate_data_file, $file_header);

		$uniqueArray = checkDuplicateRows($csvDatavalue);

		foreach ($uniqueArray as $row) {
			fputcsv($genrate_data_file, $row);
		}

		fclose($genrate_data_file);

	}

	echo "Successfully generated csv file.File path is Output/output.csv";
}


/* Check Duplicate Rows */
function checkDuplicateRows($csvRows)
{
	$final = array();
	foreach ($csvRows as $array) {
	    if(!in_array($array, $final)){
	        $final[] = $array;
	    }
	}
	return $final;
}

?>