<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
function getXml() {
	$fileName = "http://api.tweetmeme.com/stories/popular.xml?media=news";
	$xml = simplexml_load_file($fileName) or die ("Unable to load XML file!");
	return $xml;
}

function dumpXml() { 
	$xml = getXml();
	echo '<pre>';
	print_r($xml);
	echo '</pre>';
}

function dumpNums() { 
	$xml = getXml();
	echo "<ul>";
	foreach($xml as $title=>$url) {
		echo '<li>' . $title . "</li>\n";
	}
	echo "</ul>";
}

?>
<html>
<head>
	<title>XML Test</title>
</head>
<body>
	<h1>XML Test</h1>
	<? dumpNums(); dumpXml(); ?>
</body>
</html>



</body>
</html>