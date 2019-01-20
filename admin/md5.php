
<?php
$hashtofind=$_POST['hash'];
?>
<form action="" method="post" name="hash dicovery">
Input word to find the hash: <input name="hash" type="text" /><BR>



<input name="Submit" type="submit" value="Uncover" />
<input name="Reset" type="submit" value="Reset" />
</form>
<?php
if ($hashtofind==''){
print ('You Really need to input a value');
exit;
} else {
$hash = md5($hashtofind);
}



?>
<?php if (isset($_POST['Submit'])) { ?>
Hash Discovered! <BR><?php echo $hash ?>
<?php } ?>

<?php if (isset($_POST['Reset'])) { 
unset ($_POST['Submit']);
}?>

