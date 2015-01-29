<?php
$uid = $_GET['uid'];
$filename = $uid . '.jpg';
$result = file_put_contents( '../images/'.$filename, file_get_contents('php://input') );
if (!$result) {
	print "ERROR: Failed to write data to $filename, check permissions\n";
	exit();
}

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/choujiang/images/' . $filename;
print "$url\n";




?>
