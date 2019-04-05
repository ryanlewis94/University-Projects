<?php
$filename = $_GET["filename"]; //get filename from index.html into variable
$childname;
$headname = $_GET["headname"]; //get column to search from index.html into variable
$searchval = $_GET["searchval"]; //get what to search from index.html into variable
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

$xml=simplexml_load_file("XML\\".$filename) or die("Error: Cannot create object"); //load the xml file from the folder, if fails display error


foreach($xml->$childname as $child)
{
		$line = array();//create array
		foreach($child as $key => $value) //loop through all the child elements
		{
			$line[(string)$key]=(string)$value;		
		}
		$lines[] = $line; //insert into array
}

function search($array, $key, $value) //create function search and get variables
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }

    return $results;
}

echo json_encode(search($lines, $headname, $searchval)); //call function and send json back to index.html

?>