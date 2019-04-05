<?php
$filename = $_GET["filename"]; //get filename from index.html into variable
$filename = trim($filename,".xml"); //trim the .xml off the filename and set it to a different variable
$ext = ".xsd";
$filename = $filename . $ext; //put the variables together to create a new filename

$xml=simplexml_load_file("XML\\".$filename) or die("Error: Cannot create object"); //load the schema from the folder, if fails display error

$elementName = array_map('strval', $xml->xpath('//xs:element[not(node())]/@name')); //put the element names into a variable
$items = array(); //create array

foreach ($elementName as $value)
{
	$items[] = array ($value); //loop and fill the array with element names
}
echo json_encode($items); //output the json back to the index.html

?>