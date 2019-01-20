
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REV="made" href="mailto:jameshood118@gmail.com">
<link rel="shortcut icon" href="favicon.ico">
<META NAME="description" CONTENT="PHP Web Developer, MySQL, HTML, CSS, Javascript">
<META NAME="author" CONTENT="James Hood">
<META NAME="ROBOTS" CONTENT="ALL">
<title>Admin at Jameshood118</title>

<link rel="stylesheet" type="text/css" href="../styles.php">
    <link type="text/css" href="../menu.css" rel="stylesheet" />
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>
    <style type="text/css">
* { margin:0;
    padding:0;
}
body { background:rgb(74,81,85); }
div#copyright {
    font:11px 'Trebuchet MS';
    color:#fff;
    text-indent:30px;
 }
</style>
</head>

<body>
<div id="wrap">

<?php include("../includes/menu.php"); ?>
<div id="main" class="clearfix">
<div class="blogbox">
   		   <?php include ("creds.php"); 
		   $first_view="1";
		   ?>

          <BR>
          <BR>
        <form name="form3" method="post" action="">
          <input type="submit" name="Add_Site" value="Add New Site">
          <input type="hidden" value="<?php echo $login?>" name="login">
          <input type="hidden" value="<?php echo $loginpass?>" name="password">
        </form>
        <form name="form4" method="post" action="admin_menu.php">
          <input type="submit" name="Submit3" value="Back to Admin Menu">
          <input type="hidden" value="<?php echo $login?>" name="login">
          <input type="hidden" value="<?php echo $loginpass?>" name="password">
        </form>
        
        
        
        	<?php 
				if (isset($_POST['Add_Site'])) { 
				unset ($first_view);
				?>
		 <center><FORM ENCTYPE="multipart/form-data" ACTION="" METHOD=POST>
    
  <table width="600" border="0" cellspacing="0" cellpadding="5">
  


<tr> 
      <td width="230"> <div align="right">Name:</div></td>
      <td width="230"><input name="name" type="text"></td>
</tr>
<tr> 
      <td width="230"> <div align="right">Address:</div></td>
      <td width="230"><input name="address" type="text"></td>
</tr>

<tr> 
      <td width="230"> <div align="right">Company:</div></td>
      <td width="230"><input name="company" type="text"></td>
</tr>

<tr> 
      <td width="230"> <div align="right">Role:</div></td>
      <td width="230"><textarea name="role" cols="" rows=""></textarea></td>
</tr>

<tr>
	  <td width="230"> <div align="right">Image Address:</div></td>
      <td width="230"><input name="image" type="text"></td>
</tr>

<tr>
	  <td width="230"> <div align="right">Description:</div></td>
      <td width="230"><input name="description" type="text"></td>
</tr>

    <tr> 
      <td colspan="2"> <div align="center"> 
          <input type="submit" name="Submit_Site" value="Submit New Site">
          <?php 
		  print ('<input type="hidden" value="'.$login.'" name="login">');
print ('<input type="hidden" value="'.$loginpass.'" name="password">');
		  ?>
        </div></td>
    </tr>
  </table>
  </form>
  <p> </p>
  
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr> 
    <td><div align="center"> 
        <form name="form2" method="post" action="">
          <?php 
		  print ('<input type="hidden" value="'.$login.'" name="login">');
print ('<input type="hidden" value="'.$loginpass.'" name="password">');
		  ?>
        <input type="submit" name="Abort_Site" value="Abort Addition">
        </form>
      </div></td>
  </tr>
</table></center>
		
	<?php } ?>
    
    
      <?php 
					if (isset($_POST['Submit_Site'])) { 
    // Database Insertion
$address=$_POST['address'];
$role=$_POST['role'];
$name=$_POST['name'];
$company=$_POST['company'];
$image=$_POST['image'];
$description=$_POST['description'];



$table = "sites" ;

$show_all = "SELECT * FROM $table ORDER BY Idnum";

mysql_connect ($host,$user,$pass) or die ( mysql_error ());
mysql_select_db ($db)or die ( mysql_error ());
$result = mysql_query ($show_all) or die ( mysql_error ());



while ($row = mysql_fetch_array ($result))

{

$Idnum = $row[ "Idnum" ]."";

}
$new_Idnum_number=$Idnum+1;



///update database

mysql_query("INSERT into $table (Idnum, Address, Name, Role, Company, Image, Description) Values ('$new_Idnum_number', '$address', '$name', '$role','$company', '$image', '$description')") or die(mysql_error());
					}
?>



    
    
        <?php 
					if (isset($_POST['Remove'])) { 
$Idnum=$_POST['Idnum'];				
    // Database Insertion
$table = "sites" ;

mysql_connect ($host,$user,$pass) or die ( mysql_error ());
mysql_select_db ($db)or die ( mysql_error ());

///update database

mysql_query("DELETE FROM $table WHERE Idnum='$Idnum'") or die(mysql_error());
					}
?>


	<?php 
				if (isset($_POST['Edit_Sites'])) { 
				unset ($first_view);
			

$site2edit=$_POST['Idnum'];
$table = "sites" ;

$show_all = "SELECT * FROM $table WHERE Idnum='$site2edit'";

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
$description = $row[ "Description" ]."";


print ('Editing Entry - '.$Idnum.' - '.$name.'');

}


				
				?>
	<FORM ENCTYPE="multipart/form-data" ACTION="" METHOD=POST>
    
<table width="600" border="0" cellspacing="0" cellpadding="5">
  


<tr> 
      <td width="230"> <div align="right">Name:</div></td>
      <td width="230"><input name="name" type="text" value="<?php echo $name?>"></td>
</tr>
<tr> 
      <td width="230"> <div align="right">Address:</div></td>
      <td width="230"><input name="address" type="text" value="<?php echo $address?>"></td>
</tr>

<tr> 
      <td width="230"> <div align="right">Company:</div></td>
      <td width="230"><input name="company" type="text" value="<?php echo $company?>"></td>
</tr>

<tr> 
      <td width="230"> <div align="right">Role:</div></td>
      <td width="230"><textarea name="role" cols="" rows=""><?php echo $role?></textarea></td>
</tr>

<tr> 
      <td width="230"> <div align="right">Image Address:</div></td>
      <td width="230"><input name="image" type="text" value="<?php echo $image?>"></td>
</tr>

<tr> 
      <td width="230"> <div align="right">Description:</div></td>
      <td width="230"><input name="description" type="text" value="<?php echo $description?>"></td>
</tr>
    <tr> 
      <td></td>
      <td> 
          <input type="submit" name="Remove" value="Remove">
          <?php 
		  print ('<input type="hidden" value="'.$Idnum.'" name="Idnum">');
		   print ('<input type="hidden" value="'.$login.'" name="login">');
		print ('<input type="hidden" value="'.$loginpass.'" name="password">');
		  ?>
        </td>
      <td> 
          <input type="submit" name="Submit_Edits" value="Submit Edits">
          <?php 
		   print ('<input type="hidden" value="'.$Idnum.'" name="Idnum">');
		  print ('<input type="hidden" value="'.$login.'" name="login">');
			print ('<input type="hidden" value="'.$loginpass.'" name="password">');
		  ?>
        </td>
    </tr>
  </table>
  </form>
  <p> </p>
  
<table border="0" cellspacing="0" cellpadding="5">
  <tr> 
    <td><div align="center"> 
        <form name="form2" method="post" action="">
          <?php 
		  print ('<input type="hidden" value="'.$login.'" name="login">');
print ('<input type="hidden" value="'.$loginpass.'" name="password">');
		  ?>
        <input type="submit" name="Abort_Edit" value="Abort Edit">
        </form>
      </div></td>
  </tr>
</table></center>
		
	<?php } ?>
    
    
     <?php 
					if (isset($_POST['Submit_Edits'])) { 
    // Database Insertion
$Idnum=$_POST['Idnum'];
$address=$_POST['address'];
$role=$_POST['role'];
$name=$_POST['name'];
$company=$_POST['company'];
$image=$_POST['image'];
$description=$_POST['description'];


$table = "sites" ;

mysql_connect ($host,$user,$pass) or die ( mysql_error ());
mysql_select_db ($db)or die ( mysql_error ());


///update database

mysql_query("UPDATE $table set Idnum='$Idnum',
Address='$address',
Name='$name',
Role='$role',
company='$company',
image='$image',
Description='$description'
WHERE Idnum = '$Idnum'") or die(mysql_error());
					}
?>
    

		<?php 				if (isset($first_view)) { 		  
$table = "sites" ;

$show_all = "SELECT * FROM $table ORDER BY Idnum DESC";

mysql_connect ($host,$user,$pass) or die ( mysql_error ());
mysql_select_db ($db)or die ( mysql_error ());
$result = mysql_query ($show_all) or die ( mysql_error ());

print ('<table width=600>');
print ('<th>Link</th><th>Category</th><th colspan="2">Controls</th><tr>');


while ($row = mysql_fetch_array ($result))

{

$Idnum = $row[ "Idnum" ]."";
$name = $row[ "Name" ]."";
$address = $row[ "Address" ]."";
$category = $row[ "Category" ]."";


print ('<td><a href="'.$address.'" target="_blank" class="menuLink">'.$name.'</a><BR></td>');
print ('<td>'.$category.'</td>');
print ('<td><form name="form1" id="form1" method="post" action="">');
print ('<input type="hidden" value='.$login.' name="login">');
print ('<input type="hidden" value='.$loginpass.' name="password">');
print ('<input type="hidden" value='.$Idnum.' name="Idnum">');
print ('<input type="submit" name="Edit_Sites" value="Edit" />');
print ('</form></td>');
print ('<td><form name="form1" id="form1" method="post" action="">');
print ('<input type="hidden" value='.$login.' name="login">');
print ('<input type="hidden" value='.$loginpass.' name="password">');
print ('<input type="hidden" value='.$Idnum.' name="Idnum">');
print ('<input type="submit" name="Remove" value="Delete" />');
print ('</form>');
print ('</td>');

$number=$number+1;

if ($number>0){
print ('</tr>');
$number=0;
}


}
print ('</table>');
///end show menu items
		}
		?>
        
        	        <?php 
if (isset($_POST['Abort_Site'])) {
unset ($_POST['Add_Site']);
}
?>	

	        <?php 
if (isset($_POST['Abort_Edit'])) {
unset ($_POST['Edit_Site']);
}
?>	
              </div>
<div id="footer"> 
<?php include("../includes/bottommenu.php"); ?>
<?php include("../includes/footer.php"); ?>

  </div></div>

</div>
 
</body>
</html>