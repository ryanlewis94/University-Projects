<?php
foreach ($_POST as $key => $value) { //loop through all values to find the file name
    if ($key == "tablename"){  //if found
		$filename = $value;  //put it into the variable
	}
}

$childname;
$lines = array(); //create array

$xsdname = trim($filename,".xml"); //trim the .xml off the filename and set it to a different variable
$ext = ".xsd"; 
$xsdname = $xsdname . $ext; //put the variables together to create a new filename

$xsd=simplexml_load_file("XML\\".$xsdname) or die("Error: Cannot create object"); //load the schema from the folder, if fails display error

$elementName = array_map('strval', $xsd->xpath('//xs:element/@name')); //put the element names into a variable
$items = array(); //create arry

foreach ($elementName as $value)
{
	$items[] = array ($value); //loop and fill the array with the element names
}
$childname = array_shift( $items ); //set variable to the first value of the array
$childname = serialize($childname); //serializes the array object to a string
$childname = substr($childname, 14); //truncates the first 14 characters from the variable
$childname = trim($childname,'";}[]'); //trims that part of the string to get the childname

$folder = "XML\\";
$filename = $folder . $filename; //put these variables together to create the file directory

$xml=simplexml_load_file($filename) or die("Error: Cannot create object");//load the xml file from the folder, if fails display error

$row = $xml->addChild($childname);
foreach ($_POST as $key => $value) { //loop through all the keys and values
    if ($key == "tablename"){ //if table name dont do anything
	}
	else{ //if anything else
		$row->addChild($key, $value); //insert key and value
	}
}
$xml->asXML($filename); //insert the values as XML into the xml file

?>