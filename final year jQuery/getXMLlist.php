<?php
    $directory = 'XML'; //set the variable to be the name of the folder where the xml files are saved

    if (! is_dir($directory)) { //if this directory doesnt exist
        exit('Invalid diretory path');  //display error
    }

    $files = array(); //create array
	$i=0; //create i and set it to 0
    foreach (glob("XML\*.xml") as $file) { //for each .xml file found in the directory
			$file = trim($file,"XML\\"); //trim the directory XML\ from the file variable
			$i++; //add 1 to i
            $files[] = array (strval($i), $file); //add i and file name to the array
    }
	echo json_encode($files); //echo the array in a json format
?>