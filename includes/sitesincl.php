<?php 
$number=0;

mysql_connect ($host,$user,$pass) or die ( mysql_error ());
mysql_select_db ($db)or die ( mysql_error ());
$result = mysql_query ($show_all) or die ( mysql_error ());

print ('<table border="0" width="65%" align="center"><tr>');
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


print ('<td><div class="sitesbox">');
print ('<b>Company: </b>'.$company.'<BR />');
print ('<b>Category: </b>'.$category.'<BR />');
print ('<b>Site: </b> <a href="'.$address.'" class="menuLink" target="_blank">'.$name.'</a><BR />');
print ('<b>Role: </b>'.$role.'<BR />');
print ('<b>Description: </b>'.$description.'<BR />');
print ('<b>Image Link: </b><a href="images/sites/'.$image.'" class="menuLink" target="_blank">'.$image.'</a><BR />');
print ('</div></td>');

$number=$number+1;

if ($number>2){
print ('</tr>');
$number=0;
}

}
print ('</table>');
///end show menu items

?>	