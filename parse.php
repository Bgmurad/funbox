<?php
$countMap = [];
$handle = fopen("event.log", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
	if ( strpos($line," NOK\n") !== FALSE )
	{  
	    if (preg_match('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}/', $line, $matches))
	    {
		if (array_key_exists($matches[0], $countMap))
		    $countMap[$matches[0]] = $countMap[$matches[0]] + 1;
		else $countMap[$matches[0]] = 1;
	    }
	}
    }
    fclose($handle);
    foreach($countMap as $key=>$val)
    {
	echo "$key  - $val times 'NOK' \n ";
    }
} else {
    echo "Error: file can't be open";
}
?>