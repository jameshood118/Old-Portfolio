<?php include('../eignore.php'); ?>

		   <?php include ("creds.php"); ?>
		  <center><table><tr><td>
        <form name="form1" method="post" action="">
          <input type="hidden" value="<?php echo $login?>" name="login">
          <input type="hidden" value="<?php echo $loginpass?>" name="password">
          <input type="submit" name="add_justin" value="Add Images">
        </form></td>
		
		<td>		
		  <form name="form2" method="post" action="admin_menu.php">
          <?php 
		  print ('<input type="hidden" value="'.$login.'" name="login">');
print ('<input type="hidden" value="'.$loginpass.'" name="password">');
		  ?>
        <input type="submit" name="Admin_return" value="Back to Admin">
        </form></td><td><form><input type=button value="refresh" onClick="window.location.reload()"></form> </td>
		</tr>
		<tr>
        <td><form name="form1" method="post" action="">
          <input type="hidden" value="<?php echo $login?>" name="login">
          <input type="hidden" value="<?php echo $loginpass?>" name="password">
          <input type="hidden" value="terragen" name="pathname">
          <input type="submit" name="Show_Gallery" value="Show Terragen">
        </form></td>  
         <td><form name="form1" method="post" action="">
          <input type="hidden" value="<?php echo $login?>" name="login">
          <input type="hidden" value="<?php echo $loginpass?>" name="password">
          <input type="hidden" value="AniFractals" name="pathname">
          <input type="submit" name="Show_Gallery" value="Show AniFractals">
        </form></td>     

        <td><form name="form1" method="post" action="">
          <input type="hidden" value="<?php echo $login?>" name="login">
          <input type="hidden" value="<?php echo $loginpass?>" name="password">
          <input type="hidden" value="fractals" name="pathname">
          <input type="submit" name="Show_Gallery" value="Show Fractals">
        </form></td>  
        
                <td><form name="form1" method="post" action="">
          <input type="hidden" value="<?php echo $login?>" name="login">
          <input type="hidden" value="<?php echo $loginpass?>" name="password">
          <input type="hidden" value="misc" name="pathname">
          <input type="submit" name="Show_Gallery" value="Show Misc">
        </form></td>  
        
                <td><form name="form1" method="post" action="">
          <input type="hidden" value="<?php echo $login?>" name="login">
          <input type="hidden" value="<?php echo $loginpass?>" name="password">
          <input type="hidden" value="terrapinguitars" name="pathname">
          <input type="submit" name="Show_Gallery" value="Show Terrapin Guitars">
        </form></td>  
        
                <td><form name="form1" method="post" action="">
          <input type="hidden" value="<?php echo $login?>" name="login">
          <input type="hidden" value="<?php echo $loginpass?>" name="password">
          <input type="hidden" value="vectors" name="pathname">
          <input type="submit" name="Show_Gallery" value="Show Vectors">
        </form></td>  
        
        </tr>
		<tr><td colspan="3"><div align="center">
        <form name="form4" method="post" action="../index.php">
          <input type="submit" name="Submit4" value="Logout">
        </form></div></td></tr>
				</table></center>
								<?php
						if (isset($_POST['Delete'])) { 
		
		 ///Removal of Email is here
$file2remove=$_POST['file2remove'];

// set up basic connection
$ftp_server="jameshood118.99k.org";
$ftp_user_name="jameshood118.99k";
$ftp_user_pass="truehand1";
$conn_id = ftp_connect($ftp_server);

$delimage='../images/'.$path.'/'.$file2remove.'';
$delthumb='../images/'.$path.'/thumbs/'.$file2remove.'';


// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

if ($done=="1"){
exit;
///end Removal
} elseif ($done=="0") {
// check connection
if ((!$conn_id) || (!$login_result)) {
        echo "FTP connection has failed!";
        echo "Attempted to connect to $ftp_server for user <i>$ftp_user_name</i>";
        exit;
    } else {
        echo "<BR><strong>Connected:</strong> $ftp_server, for user <i>$ftp_user_name</i><BR>";
    }

} 
?>

<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr> 
    <td><div align="center"> 
        <form name="form2" method="post" action="">
          <?php 
		  print ('<input type="hidden" value="'.$login.'" name="login">');
print ('<input type="hidden" value="'.$loginpass.'" name="password">');
		  ?>
        <input type="submit" name="Finish_Delete" value="Finish Delete">
        </form>
      </div></td>
  </tr>
</table>

<?php
///upload script
ftp_delete($conn_id, $delimage);
ftp_delete($conn_id, $delthumb);

// close the FTP stream
ftp_close($conn_id);
///end upload image

}
$done=1;

?>
        <?php 
if (isset($done)) {
unset ($_POST['Remove']);
}
?>

	        <?php 
if (isset($_POST['Finish_Delete'])) {
unset ($_POST['Remove']);
}
?>	
				
				<?php 
				if (isset($_POST['add_justin'])) { ?>
		 <center><FORM ENCTYPE="multipart/form-data" ACTION="processFiles.php" METHOD=POST>
    
  <table width="600" border="0" cellspacing="0" cellpadding="5">
  
<tr> 
      <td width="230"> <div align="right">Path/Category:</div></td>
      <td width="230"><?php $table = "Galleries" ;

$show_all = "SELECT * FROM $table ORDER by Path";


mysql_connect ($host,$user,$pass) or die ( mysql_error ());
mysql_select_db ($db)or die ( mysql_error ());
$result = mysql_query ($show_all) or die ( mysql_error ());
	

print ('<BR><select name="pathname">');
print ('<option value="">Select a Path</option>');

while ($row = mysql_fetch_array ($result))

{

$path = $row[ "Path" ]."";

if ($old_path<>$path) {
print ('<option value="'.$path.'">'.$path.'</option>');
}
$old_path=$path;
}
print ('</select>');

?>
    
      
      </td>
</tr>

<tr> 
      <td width="230"> <div align="right">New Path/Category:</div></td>
      <td width="230"><input name="new_category" type="text"></td>
</tr>

    <tr> 
      <td width="230"> <div align="right">File:</div></td>
      <td width="230"><input name="file" type="file"></td>
          </tr>
    <tr> 
      <td colspan="2"> <div align="center"> 
          <input type="submit" name="Submit_Image" value="Submit New Image">
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
        <input type="submit" name="Abort_justin" value="Abort Addition">
        </form>
      </div></td>
  </tr>
</table></center>
		
	<?php } ?>
<?php
				if (isset($_POST['Show_Gallery'])) { 
				
				$path=$_POST['pathname'];

		     print('<center><table border="0">');
			 			 print ('<tr>');
			 
$dir = '../images/'.$path.'/';
if ($handle = opendir('../images/'.$path.'/')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != ".." && $file != "thumbs") {
			 print ('<td width="200" align="center" valign="top">');
             print ('<img src="../images/'.$path.'/'.$file.'" width="200">');
			 print ('<BR /><form name="form1" enctype="multipart/form-data" method="post" action="">');
			 print ('<input type="hidden" value="'.$file.'" name="file2remove">');
			 print ('<input type="hidden" value="'.$login.'" name="login">');
	         print ('<input type="hidden" value="'.$loginpass.'" name="password">');
			 print ('<input type="submit" name="Delete" value="Delete"></form>');
			 print ('</td>');
       		$number=$number+1;

if ($number>2){
print ('</tr>');
$number=0; 
}

}
    }
    closedir($handle);
}





print ('</table></center>');
				}
///end show menu items
?>
	        <?php 
if (isset($_POST['Abort_justin'])) {
unset ($_POST['add_justin']);
}
?>	

