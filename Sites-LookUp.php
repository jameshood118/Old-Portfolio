<?php 

$Idnum = $_GET["Idnum"];

include("includes/db.php");
$table = "sites" ;

$show_all = "SELECT * FROM $table WHERE Idnum=$Idnum";

mysql_connect ($host,$user,$pass) or die ( mysql_error ());
mysql_select_db ($db)or die ( mysql_error ());
$result = mysql_query ($show_all) or die ( mysql_error ());


while ($row = mysql_fetch_array ($result))

{

$Idnum = $row[ "Idnum" ]."";
$name = $row[ "Name" ]."";
$address = $row[ "Address" ]."";
$role = $row[ "Role" ]."";
$company = $row[ "Company" ]."";
$image = $row[ "Image" ]."";
$category = $row[ "Category" ]."";
$description = $row[ "Description" ]."";

echo '<div style="float:left;"><img src="/images/sites/'.$image.'" style="max-width:500px"/></div><div style="float:right;"><strong>Name:</strong> '.$name.'<BR><strong>Address:</strong> <a class="menuLink" href="'.$address.'">'.$address.'</a><BR><strong>Role:</strong> '.$role.'<BR><strong>Company:</strong> '.$company.'<BR><strong>Description:</strong> '.$description.'</div>';



}

?>