<?php    
$handle = fopen('views.txt', 'r'); // opens file for reading
// fgets gets a line from the file as a string
// intval converts a value to an integer
$count = intval(fgets($handle));
$count++;
echo("$count");
fclose($handle);
$handle2 = fopen('views.txt', 'w');
fwrite($handle2, "$count"); // writes count to the the file
?>
